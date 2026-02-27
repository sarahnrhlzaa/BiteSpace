<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PromoModel;

class PromoController extends BaseController
{
    protected PromoModel $promoModel;

    public function __construct()
    {
        $this->promoModel = new PromoModel();
        helper(['form', 'url']);
    }

    // ── Helper role ────────────────────────────────────────
    private function getRole(): string
    {
        return strtolower((string) session()->get('role'));
    }

    private function isAdmin(): bool
    {
        return $this->getRole() === 'admin';
    }

    private function adminOnly()
    {
        return redirect()->to(base_url('promo'))
            ->with('error', 'Akses ditolak. Hanya Admin yang dapat melakukan tindakan ini.');
    }

    // ── INDEX ──────────────────────────────────────────────
    // Admin & kasir boleh lihat
    public function index()
    {
        $today  = date('Y-m-d');
        $promos = $this->promoModel->orderBy('is_active', 'DESC')
                                   ->orderBy('tanggal_selesai', 'ASC')
                                   ->findAll();

        // Tambahkan status computed: expired, active, upcoming
        foreach ($promos as &$p) {
            if (! $p['is_active']) {
                $p['status_display'] = 'nonaktif';
            } elseif ($p['tanggal_selesai'] < $today) {
                $p['status_display'] = 'expired';
            } elseif ($p['tanggal_mulai'] > $today) {
                $p['status_display'] = 'upcoming';
            } else {
                $p['status_display'] = 'aktif';
            }
        }
        unset($p);

        return view('layouts/main', [
            'title'   => 'Promo',
            'content' => 'promo/index',
            'promos'  => $promos,
            'isAdmin' => $this->isAdmin(),
        ]);
    }

    // ── CREATE (form) ──────────────────────────────────────
    public function create()
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        return view('layouts/main', [
            'title'   => 'Tambah Promo',
            'content' => 'promo/create',
        ]);
    }

    // ── STORE ──────────────────────────────────────────────
    public function store()
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        $rules = [
            'kode_promo'      => 'required|max_length[20]|is_unique[promo.kode_promo]',
            'nama_promo'      => 'required|max_length[100]',
            'deskripsi'       => 'permit_empty|max_length[500]',
            'tipe_diskon'     => 'required|in_list[percent,nominal]',
            'nilai_diskon'    => 'required|numeric|greater_than[0]',
            'maks_diskon'     => 'permit_empty|numeric|greater_than[0]',
            'min_transaksi'   => 'required|numeric|greater_than_equal_to[0]',
            'tanggal_mulai'   => 'required|valid_date[Y-m-d]',
            'tanggal_selesai' => 'required|valid_date[Y-m-d]',
        ];

        $messages = [
            'kode_promo' => ['is_unique' => 'Kode promo sudah digunakan.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Validasi tanggal selesai >= mulai
        if ($this->request->getPost('tanggal_selesai') < $this->request->getPost('tanggal_mulai')) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Tanggal selesai tidak boleh sebelum tanggal mulai.');
        }

        // Validasi nilai_diskon maks 100 kalau percent
        if ($this->request->getPost('tipe_diskon') === 'percent' && $this->request->getPost('nilai_diskon') > 100) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nilai diskon persen tidak boleh lebih dari 100%.');
        }

        $this->promoModel->insert([
            'kode_promo'      => strtoupper(trim($this->request->getPost('kode_promo'))),
            'nama_promo'      => $this->request->getPost('nama_promo'),
            'deskripsi'       => $this->request->getPost('deskripsi') ?: null,
            'tipe_diskon'     => $this->request->getPost('tipe_diskon'),
            'nilai_diskon'    => $this->request->getPost('nilai_diskon'),
            'maks_diskon'     => $this->request->getPost('maks_diskon') ?: null,
            'min_transaksi'   => $this->request->getPost('min_transaksi'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'is_active'       => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to(base_url('promo'))
            ->with('success', 'Promo berhasil ditambahkan!');
    }

    // ── EDIT (form) ────────────────────────────────────────
    public function edit(int $id)
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        $promo = $this->promoModel->find($id);
        if (! $promo) {
            return redirect()->to(base_url('promo'))->with('error', 'Promo tidak ditemukan.');
        }

        return view('layouts/main', [
            'title'   => 'Edit Promo',
            'content' => 'promo/edit',
            'promo'   => $promo,
        ]);
    }

    // ── UPDATE ─────────────────────────────────────────────
    public function update(int $id)
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        $promo = $this->promoModel->find($id);
        if (! $promo) {
            return redirect()->to(base_url('promo'))->with('error', 'Promo tidak ditemukan.');
        }

        $rules = [
            'kode_promo'      => "required|max_length[20]|is_unique[promo.kode_promo,id_promo,{$id}]",
            'nama_promo'      => 'required|max_length[100]',
            'deskripsi'       => 'permit_empty|max_length[500]',
            'tipe_diskon'     => 'required|in_list[percent,nominal]',
            'nilai_diskon'    => 'required|numeric|greater_than[0]',
            'maks_diskon'     => 'permit_empty|numeric|greater_than[0]',
            'min_transaksi'   => 'required|numeric|greater_than_equal_to[0]',
            'tanggal_mulai'   => 'required|valid_date[Y-m-d]',
            'tanggal_selesai' => 'required|valid_date[Y-m-d]',
        ];

        $messages = [
            'kode_promo' => ['is_unique' => 'Kode promo sudah digunakan oleh promo lain.'],
        ];

        if (! $this->validate($rules, $messages)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        if ($this->request->getPost('tanggal_selesai') < $this->request->getPost('tanggal_mulai')) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Tanggal selesai tidak boleh sebelum tanggal mulai.');
        }

        if ($this->request->getPost('tipe_diskon') === 'percent' && $this->request->getPost('nilai_diskon') > 100) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Nilai diskon persen tidak boleh lebih dari 100%.');
        }

        $this->promoModel->update($id, [
            'kode_promo'      => strtoupper(trim($this->request->getPost('kode_promo'))),
            'nama_promo'      => $this->request->getPost('nama_promo'),
            'deskripsi'       => $this->request->getPost('deskripsi') ?: null,
            'tipe_diskon'     => $this->request->getPost('tipe_diskon'),
            'nilai_diskon'    => $this->request->getPost('nilai_diskon'),
            'maks_diskon'     => $this->request->getPost('maks_diskon') ?: null,
            'min_transaksi'   => $this->request->getPost('min_transaksi'),
            'tanggal_mulai'   => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'is_active'       => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to(base_url('promo'))
            ->with('success', 'Promo berhasil diperbarui!');
    }

    // ── DELETE ─────────────────────────────────────────────
    public function delete(int $id)
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        $promo = $this->promoModel->find($id);
        if (! $promo) {
            return redirect()->to(base_url('promo'))->with('error', 'Promo tidak ditemukan.');
        }

        $this->promoModel->delete($id);

        return redirect()->to(base_url('promo'))
            ->with('success', 'Promo berhasil dihapus.');
    }

    // ── TOGGLE ACTIVE (AJAX) ───────────────────────────────
    // Hanya admin
    public function toggle(int $id)
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        if (! $this->isAdmin()) {
            return $this->response->setStatusCode(403)->setJSON([
                'success' => false, 'message' => 'Akses ditolak.',
            ]);
        }

        $promo = $this->promoModel->find($id);
        if (! $promo) {
            return $this->response->setJSON(['success' => false, 'message' => 'Promo tidak ditemukan']);
        }

        $body = $this->request->getJSON(true);
        $val  = isset($body['is_active']) ? (int) $body['is_active'] : 0;

        $this->promoModel->update($id, ['is_active' => $val]);

        return $this->response->setJSON([
            'success'   => true,
            'is_active' => $val,
            'message'   => $val ? 'Promo diaktifkan' : 'Promo dinonaktifkan',
        ]);
    }

    // ── VALIDATE KODE (AJAX, untuk dipakai di POS/transaksi) ──
    // Admin & kasir boleh
    public function validateKode()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $body      = $this->request->getJSON(true);
        $kode      = strtoupper(trim($body['kode_promo'] ?? ''));
        $subtotal  = (float) ($body['subtotal'] ?? 0);
        $today     = date('Y-m-d');

        if (! $kode) {
            return $this->response->setJSON(['success' => false, 'message' => 'Kode promo kosong.']);
        }

        $promo = $this->promoModel
            ->where('kode_promo', $kode)
            ->where('is_active', 1)
            ->where('tanggal_mulai <=', $today)
            ->where('tanggal_selesai >=', $today)
            ->first();

        if (! $promo) {
            return $this->response->setJSON(['success' => false, 'message' => 'Kode promo tidak valid atau sudah expired.']);
        }

        if ($subtotal < $promo['min_transaksi']) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Minimum transaksi Rp ' . number_format($promo['min_transaksi'], 0, ',', '.') . ' untuk menggunakan promo ini.',
            ]);
        }

        // Hitung diskon
        if ($promo['tipe_diskon'] === 'percent') {
            $diskon = $subtotal * ($promo['nilai_diskon'] / 100);
            if ($promo['maks_diskon'] && $diskon > $promo['maks_diskon']) {
                $diskon = (float) $promo['maks_diskon'];
            }
        } else {
            $diskon = (float) $promo['nilai_diskon'];
        }

        $diskon = min($diskon, $subtotal); // diskon tidak melebihi subtotal

        return $this->response->setJSON([
            'success'    => true,
            'id_promo'   => $promo['id_promo'],
            'nama_promo' => $promo['nama_promo'],
            'tipe'       => $promo['tipe_diskon'],
            'nilai'      => $promo['nilai_diskon'],
            'diskon'     => $diskon,
            'message'    => 'Promo berhasil diterapkan!',
        ]);
    }
}