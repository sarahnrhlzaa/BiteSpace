<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TableModel;

class TableController extends BaseController
{
    protected TableModel $tableModel;

    public function __construct()
    {
        $this->tableModel = new TableModel();
    }

    /* ─────────────────────────────────────
       GET /table  →  daftar semua meja
    ───────────────────────────────────── */
    public function index()
    {
        return view('layouts/main', [
            'title'   => 'Manajemen Meja',
            'content' => 'table/index',
            'tables'  => $this->tableModel->orderBy('nomor_meja', 'ASC')->findAll(),
        ]);
    }

    /* ─────────────────────────────────────
       GET /table/edit/{id}  →  form edit meja
    ───────────────────────────────────── */
    public function edit(int $id)
    {
        $meja = $this->tableModel->find($id);
        if (! $meja) {
            session()->setFlashdata('error', 'Meja tidak ditemukan.');
            return redirect()->to(base_url('table'));
        }

        return view('layouts/main', [
            'title'   => 'Edit Meja ' . $meja['nomor_meja'],
            'content' => 'table/edit',
            'table'   => $meja,
        ]);
    }

    /* ─────────────────────────────────────
       POST /table/store  →  tambah meja
    ───────────────────────────────────── */
    public function store()
    {
        $rules = [
            'nomor_meja' => 'required|max_length[10]|is_unique[table.nomor_meja]',
            'kapasitas'  => 'required|integer|greater_than[0]',
            'status'     => 'required|in_list[available,occupied,reserved]',
        ];

        $messages = [
            'nomor_meja' => [
                'is_unique' => 'Nomor meja sudah digunakan.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $this->tableModel->insert([
            'nomor_meja' => strtoupper($this->request->getPost('nomor_meja')),
            'kapasitas'  => $this->request->getPost('kapasitas'),
            'status'     => $this->request->getPost('status'),
        ]);

        session()->setFlashdata('success', 'Meja berhasil ditambahkan.');
        return redirect()->to(base_url('table'));
    }

    /* ─────────────────────────────────────
       POST /table/update/{id}  →  edit meja
    ───────────────────────────────────── */
    public function update(int $id)
    {
        $meja = $this->tableModel->find($id);
        if (! $meja) {
            session()->setFlashdata('error', 'Meja tidak ditemukan.');
            return redirect()->to(base_url('table'));
        }

        $rules = [
            'nomor_meja' => "required|max_length[10]|is_unique[table.nomor_meja,id_table,{$id}]",
            'kapasitas'  => 'required|integer|greater_than[0]',
            'status'     => 'required|in_list[available,occupied,reserved]',
        ];

        $messages = [
            'nomor_meja' => [
                'is_unique' => 'Nomor meja sudah digunakan oleh meja lain.',
            ],
        ];

        if (! $this->validate($rules, $messages)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $this->tableModel->update($id, [
            'nomor_meja' => strtoupper($this->request->getPost('nomor_meja')),
            'kapasitas'  => $this->request->getPost('kapasitas'),
            'status'     => $this->request->getPost('status'),
        ]);

        session()->setFlashdata('success', "Meja berhasil diperbarui.");
        return redirect()->to(base_url('table'));
    }

    /* ─────────────────────────────────────
       POST /table/delete/{id}  →  hapus meja
    ───────────────────────────────────── */
    public function delete(int $id)
    {
        $meja = $this->tableModel->find($id);
        if (! $meja) {
            session()->setFlashdata('error', 'Meja tidak ditemukan.');
            return redirect()->to(base_url('table'));
        }

        // Jangan hapus kalau meja sedang occupied
        if ($meja['status'] === 'occupied') {
            session()->setFlashdata('error', "Meja {$meja['nomor_meja']} sedang terisi, tidak bisa dihapus.");
            return redirect()->to(base_url('table'));
        }

        $this->tableModel->delete($id);
        session()->setFlashdata('success', "Meja {$meja['nomor_meja']} berhasil dihapus.");
        return redirect()->to(base_url('table'));
    }

    /* ─────────────────────────────────────
       POST /table/update-status/{id}
       (AJAX: ubah status dari POS / transaksi)
    ───────────────────────────────────── */
    public function updateStatus(int $id)
    {
        $isAjax = $this->request->getHeaderLine('X-Requested-With') === 'XMLHttpRequest'
               || $this->request->isAJAX();

        if (! $isAjax) {
            return $this->response->setStatusCode(403);
        }

        $status = $this->request->getJSON(true)['status'] ?? null;

        if (! in_array($status, ['available', 'occupied', 'reserved'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'Status tidak valid.']);
        }

        $meja = $this->tableModel->find($id);
        if (! $meja) {
            return $this->response->setJSON(['success' => false, 'message' => 'Meja tidak ditemukan.']);
        }

        $this->tableModel->update($id, ['status' => $status]);

        return $this->response->setJSON([
            'success' => true,
            'message' => "Status meja {$meja['nomor_meja']} diperbarui ke {$status}.",
        ]);
    }
}