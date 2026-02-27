<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LaporanController extends BaseController
{
    public function index()
    {
        $role   = session()->get('role');
        $idUser = session()->get('id_user');
        $db     = \Config\Database::connect();

        // ── Filter params ──
        $tglMulai   = $this->request->getGet('tgl_mulai')   ?? date('Y-m-01');
        $tglSelesai = $this->request->getGet('tgl_selesai') ?? date('Y-m-d');
        $idKasir    = $this->request->getGet('id_kasir')    ?? '';

        // ── Query transaksi ──
        $builder = $db->table('`order` o')
            ->select('
                o.id_order, o.kode_order, o.created_at, o.total_harga,
                o.diskon_nominal, o.catatan, o.status,
                c.nama_customer, c.telp,
                u.nama_lengkap AS kasir,
                t.nomor_meja,
                p.metode_bayar, p.jumlah_bayar, p.kembalian,
                pr.nama_promo
            ')
            ->join('customer c',  'c.id_customer = o.id_customer', 'left')
            ->join('user u',      'u.id_user = o.id_user',         'left')
            ->join('`table` t',   't.id_table = o.id_table',       'left')
            ->join('payment p',   'p.id_order = o.id_order',       'left')
            ->join('promo pr',    'pr.id_promo = o.id_promo',      'left')
            ->where('o.status', 'done')
            ->where('DATE(o.created_at) >=', $tglMulai)
            ->where('DATE(o.created_at) <=', $tglSelesai)
            ->orderBy('o.created_at', 'DESC');

        if ($role === 'kasir') {
            $builder->where('o.id_user', $idUser);
        } elseif ($role === 'admin' && $idKasir !== '') {
            $builder->where('o.id_user', $idKasir);
        }

        $transaksi = $builder->get()->getResultArray();

        // ── Summary cards ──
        $totalPemasukan = array_sum(array_column($transaksi, 'total_harga'));
        $totalTransaksi = count($transaksi);
        $totalDiskon    = array_sum(array_column($transaksi, 'diskon_nominal'));

        $metodeSummary = ['cash' => 0, 'debit' => 0, 'qris' => 0];
        foreach ($transaksi as $t) {
            $m = $t['metode_bayar'] ?? 'cash';
            if (isset($metodeSummary[$m])) $metodeSummary[$m] += $t['total_harga'];
        }

        // ── Income per bulan (tabel, bukan grafik) ──
        $tahun = date('Y', strtotime($tglMulai));
        $sql   = "
            SELECT MONTH(o.created_at) as bulan,
                   COUNT(*) as jml_transaksi,
                   SUM(o.total_harga) as total_income,
                   SUM(o.diskon_nominal) as total_diskon
            FROM `order` o
            WHERE o.status = 'done'
            AND YEAR(o.created_at) = ?
        ";
        $params = [$tahun];

        if ($role === 'kasir') {
            $sql .= " AND o.id_user = ?";
            $params[] = $idUser;
        } elseif ($role === 'admin' && $idKasir !== '') {
            $sql .= " AND o.id_user = ?";
            $params[] = $idKasir;
        }

        $sql .= " GROUP BY MONTH(o.created_at) ORDER BY bulan ASC";
        $incomePerBulan = $db->query($sql, $params)->getResultArray();

        // ── List kasir untuk filter admin ──
        $kasirList = [];
        if ($role === 'admin') {
            $kasirList = (new UserModel())->where('is_active', 1)->findAll();
        }

        return view('layouts/main', [
            'title'          => 'Laporan Keuangan',
            'content'        => 'laporan/index',
            'transaksi'      => $transaksi,
            'totalPemasukan' => $totalPemasukan,
            'totalTransaksi' => $totalTransaksi,
            'totalDiskon'    => $totalDiskon,
            'metodeSummary'  => $metodeSummary,
            'incomePerBulan' => $incomePerBulan,
            'tahun'          => $tahun,
            'kasirList'      => $kasirList,
            'tglMulai'       => $tglMulai,
            'tglSelesai'     => $tglSelesai,
            'idKasir'        => $idKasir,
        ]);
    }

    /* ─── AJAX: detail satu order ─── */
    public function detail(int $idOrder)
    {
        if (! $this->request->isAJAX()) return $this->response->setStatusCode(403);

        $role   = session()->get('role');
        $idUser = session()->get('id_user');
        $db     = \Config\Database::connect();

        $order = $db->query("
            SELECT o.*, c.nama_customer, c.telp,
                   u.nama_lengkap AS kasir, t.nomor_meja,
                   p.metode_bayar, p.jumlah_bayar, p.kembalian,
                   pr.nama_promo
            FROM `order` o
            LEFT JOIN customer c ON c.id_customer = o.id_customer
            LEFT JOIN user u     ON u.id_user = o.id_user
            LEFT JOIN `table` t  ON t.id_table = o.id_table
            LEFT JOIN payment p  ON p.id_order = o.id_order
            LEFT JOIN promo pr   ON pr.id_promo = o.id_promo
            WHERE o.id_order = ?
        ", [$idOrder])->getRowArray();

        if (! $order || ($role === 'kasir' && $order['id_user'] != $idUser)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Tidak ditemukan.']);
        }

        $details = $db->query("
            SELECT od.*, m.nama_menu, m.gambar
            FROM order_detail od
            JOIN menu m ON m.id_menu = od.id_menu
            WHERE od.id_order = ?
        ", [$idOrder])->getResultArray();

        return $this->response->setJSON([
            'success' => true,
            'order'   => $order,
            'details' => $details,
        ]);
    }
}