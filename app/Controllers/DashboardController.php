<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\OrderModel;
use App\Models\MenuModel;
use App\Models\TableModel;
use App\Models\PaymentModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $orderModel   = new OrderModel();
        $menuModel    = new MenuModel();
        $tableModel   = new TableModel();
        $paymentModel = new PaymentModel();

        $role   = session()->get('role');
        $idUser = session()->get('id_user');
        $today  = date('Y-m-d');

        // ── Query berdasarkan role ──
        // Transaksi hari ini
        if ($role === 'admin') {
            $todayOrders = $orderModel
                ->where('DATE(created_at)', $today)
                ->where('status', 'done')
                ->findAll();
        } else {
            $todayOrders = $orderModel
                ->where('DATE(created_at)', $today)
                ->where('status', 'done')
                ->where('id_user', $idUser)
                ->findAll();
        }

        $totalTransaksiHariIni = count($todayOrders);
        $pemasukanHariIni      = array_sum(array_column($todayOrders, 'total_harga'));

        // Menu aktif
        $menuAktif = $menuModel->where('is_available', 1)->countAllResults();

        // Meja tersedia
        $mejaTersedia = $tableModel->where('status', 'available')->countAllResults();

        // ── Grafik pemasukan 30 hari terakhir ──
        $db = \Config\Database::connect();

        if ($role === 'admin') {
            $grafikQuery = $db->query("
                SELECT DATE(created_at) as tanggal, SUM(total_harga) as total
                FROM `order`
                WHERE status = 'done'
                AND created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                GROUP BY DATE(created_at)
                ORDER BY tanggal ASC
            ");
        } else {
            $grafikQuery = $db->query("
                SELECT DATE(created_at) as tanggal, SUM(total_harga) as total
                FROM `order`
                WHERE status = 'done'
                AND id_user = {$idUser}
                AND created_at >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                GROUP BY DATE(created_at)
                ORDER BY tanggal ASC
            ");
        }

        $grafikRaw  = $grafikQuery->getResultArray();
        $grafikLabel = array_column($grafikRaw, 'tanggal');
        $grafikData  = array_column($grafikRaw, 'total');

        // ── Income per bulan (tahun ini) ──
        if ($role === 'admin') {
            $incomeQuery = $db->query("
                SELECT MONTH(created_at) as bulan, SUM(total_harga) as total
                FROM `order`
                WHERE status = 'done'
                AND YEAR(created_at) = YEAR(NOW())
                GROUP BY MONTH(created_at)
                ORDER BY bulan ASC
            ");
        } else {
            $incomeQuery = $db->query("
                SELECT MONTH(created_at) as bulan, SUM(total_harga) as total
                FROM `order`
                WHERE status = 'done'
                AND id_user = {$idUser}
                AND YEAR(created_at) = YEAR(NOW())
                GROUP BY MONTH(created_at)
                ORDER BY bulan ASC
            ");
        }

        $incomeRaw = $incomeQuery->getResultArray();
        $bulanNames = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];
        $incomeLabel = [];
        $incomeData  = [];
        foreach ($incomeRaw as $row) {
            $incomeLabel[] = $bulanNames[$row['bulan'] - 1];
            $incomeData[]  = $row['total'];
        }

        // ── Transaksi terakhir ──
        if ($role === 'admin') {
            $transaksiTerakhir = $db->query("
                SELECT o.kode_order, o.created_at, o.total_harga, o.status,
                       u.nama_lengkap as kasir,
                       c.nama_customer as customer,
                       t.nomor_meja
                FROM `order` o
                LEFT JOIN user u ON o.id_user = u.id_user
                LEFT JOIN customer c ON o.id_customer = c.id_customer
                LEFT JOIN `table` t ON o.id_table = t.id_table
                ORDER BY o.created_at DESC
                LIMIT 8
            ")->getResultArray();
        } else {
            $transaksiTerakhir = $db->query("
                SELECT o.kode_order, o.created_at, o.total_harga, o.status,
                       u.nama_lengkap as kasir,
                       c.nama_customer as customer,
                       t.nomor_meja
                FROM `order` o
                LEFT JOIN user u ON o.id_user = u.id_user
                LEFT JOIN customer c ON o.id_customer = c.id_customer
                LEFT JOIN `table` t ON o.id_table = t.id_table
                WHERE o.id_user = {$idUser}
                ORDER BY o.created_at DESC
                LIMIT 8
            ")->getResultArray();
        }

        // ── Kalender: tanggal yang ada transaksi bulan ini ──
        if ($role === 'admin') {
            $kalenderQuery = $db->query("
                SELECT DISTINCT DAY(created_at) as hari
                FROM `order`
                WHERE status = 'done'
                AND YEAR(created_at) = YEAR(NOW())
                AND MONTH(created_at) = MONTH(NOW())
            ");
        } else {
            $kalenderQuery = $db->query("
                SELECT DISTINCT DAY(created_at) as hari
                FROM `order`
                WHERE status = 'done'
                AND id_user = {$idUser}
                AND YEAR(created_at) = YEAR(NOW())
                AND MONTH(created_at) = MONTH(NOW())
            ");
        }
        $hariAktif = array_column($kalenderQuery->getResultArray(), 'hari');

        $data = [
            'title'                 => 'Dashboard',
            'totalTransaksiHariIni' => $totalTransaksiHariIni,
            'pemasukanHariIni'      => $pemasukanHariIni,
            'menuAktif'             => $menuAktif,
            'mejaTersedia'          => $mejaTersedia,
            'grafikLabel'           => json_encode($grafikLabel),
            'grafikData'            => json_encode($grafikData),
            'incomeLabel'           => json_encode($incomeLabel),
            'incomeData'            => json_encode($incomeData),
            'transaksiTerakhir'     => $transaksiTerakhir,
            'hariAktif'             => $hariAktif,
        ];

        return view('layouts/main', $data + ['content' => 'dashboard/index']);
    }
}