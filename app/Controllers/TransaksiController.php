<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use App\Models\CategoryModel;
use App\Models\TableModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\CustomerModel;
use App\Models\PaymentModel;
use App\Models\PromoModel;

class TransaksiController extends BaseController
{
    protected MenuModel        $menuModel;
    protected CategoryModel    $categoryModel;
    protected TableModel       $tableModel;
    protected OrderModel       $orderModel;
    protected OrderDetailModel $orderDetailModel;
    protected CustomerModel    $customerModel;
    protected PaymentModel     $paymentModel;
    protected PromoModel       $promoModel;

    public function __construct()
    {
        $this->menuModel        = new MenuModel();
        $this->categoryModel    = new CategoryModel();
        $this->tableModel       = new TableModel();
        $this->orderModel       = new OrderModel();
        $this->orderDetailModel = new OrderDetailModel();
        $this->customerModel    = new CustomerModel();
        $this->paymentModel     = new PaymentModel();
        $this->promoModel       = new PromoModel();
        helper(['form', 'url']);
    }

    /* ════════════════════════════════════════════════════
       GET /transaksi  →  Halaman POS utama
    ════════════════════════════════════════════════════ */
    public function index()
    {
        $menus      = $this->menuModel->getMenuAvailable();
        $categories = $this->categoryModel->findAll();
        $tables     = $this->tableModel->where('status', 'available')->orderBy('nomor_meja', 'ASC')->findAll();

        $today = date('Y-m-d');
        $promosAktif = (new \App\Models\PromoModel())
            ->where('is_active', 1)
            ->where('tanggal_mulai <=', $today)
            ->where('tanggal_selesai >=', $today)
            ->findAll();

        // Kelompokkan menu per kategori
        $menuGrouped = [];
        foreach ($menus as $menu) {
            $menuGrouped[$menu['id_category']][] = $menu;
        }

        return view('layouts/main', [
            'title'       => 'Transaksi POS',
            'content'     => 'transaksi/index',
            'menus'       => $menus,
            'menuGrouped' => $menuGrouped,
            'categories'  => $categories,
            'tables'      => $tables,
            'promosAktif' => $promosAktif,
            'csrf_hash'  => csrf_hash()
        ]);
    }

    /* ════════════════════════════════════════════════════
       POST /transaksi/cek-promo  (AJAX)
       Body JSON: { kode_promo, subtotal }
    ════════════════════════════════════════════════════ */
    public function cekPromo()
    {
        if (! $this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        $body     = $this->request->getJSON(true);
        $kode     = strtoupper(trim($body['kode_promo'] ?? ''));
        $subtotal = (float) ($body['subtotal'] ?? 0);
        $today    = date('Y-m-d');

        $promo = $this->promoModel
            ->where('kode_promo', $kode)
            ->where('is_active', 1)
            ->where('tanggal_mulai <=', $today)
            ->where('tanggal_selesai >=', $today)
            ->first();

        if (! $promo) {
            return $this->response->setJSON(['valid' => false, 'message' => 'Kode promo tidak valid atau sudah kadaluarsa.']);
        }

        if ($subtotal < $promo['min_transaksi']) {
            return $this->response->setJSON([
                'valid'   => false,
                'message' => 'Minimum transaksi Rp ' . number_format($promo['min_transaksi'], 0, ',', '.') . ' untuk promo ini.',
            ]);
        }

        // Hitung diskon
        $diskon = 0;
        if ($promo['tipe_diskon'] === 'percent') {
            $diskon = $subtotal * ($promo['nilai_diskon'] / 100);
            if ($promo['maks_diskon'] && $diskon > $promo['maks_diskon']) {
                $diskon = $promo['maks_diskon'];
            }
        } else {
            $diskon = $promo['nilai_diskon'];
        }

        return $this->response->setJSON([
            'valid'        => true,
            'id_promo'     => $promo['id_promo'],
            'nama_promo'   => $promo['nama_promo'],
            'diskon'       => $diskon,
            'message'      => 'Promo berhasil diterapkan!',
        ]);
    }

    /* ════════════════════════════════════════════════════
       POST /transaksi/checkout
       Simpan order, order_detail, customer, payment
       Lalu redirect ke struk
    ════════════════════════════════════════════════════ */
    public function checkout()
    {
        $post = $this->request->getPost();

        // ── Validasi dasar ──
        $items = json_decode($post['items'] ?? '[]', true);
        if (empty($items)) {
            session()->setFlashdata('error', 'Keranjang kosong, tidak bisa checkout.');
            return redirect()->to(base_url('transaksi'));
        }

        // ── Simpan/cari customer ──
        $namaCustomer = trim($post['nama_customer'] ?? 'Guest');
        $telpCustomer = trim($post['telp_customer'] ?? '-');

        // Cek kalau customer sama sudah ada berdasarkan nomor telp
        $customer = $this->customerModel->where('telp', $telpCustomer)->first();
        if (! $customer) {
            $idCustomer = $this->customerModel->insert([
                'nama_customer' => $namaCustomer,
                'telp'          => $telpCustomer,
            ]);
        } else {
            $idCustomer = $customer['id_customer'];
        }

        // ── Hitung total ──
        $subtotal       = 0;
        foreach ($items as $item) {
            $subtotal += (float)$item['harga'] * (int)$item['qty'];
        }

        $diskonNominal = (float)($post['diskon_nominal'] ?? 0);
        $totalHarga    = max(0, $subtotal - $diskonNominal);

        // ── Kode order unik ──
        $kodeOrder = 'ORD-' . strtoupper(uniqid());

        // ── Simpan Order ──
        $idOrder = $this->orderModel->insert([
            'id_table'       => $post['id_table'] ?: null,
            'id_customer'    => $idCustomer,
            'id_user'        => session()->get('id_user'),
            'id_promo'       => $post['id_promo'] ?: null,
            'kode_order'     => $kodeOrder,
            'status'         => 'done',
            'diskon_nominal' => $diskonNominal,
            'total_harga'    => $totalHarga,
            'catatan'        => $post['catatan'] ?? null,
        ]);

        // ── Simpan Order Detail ──
        foreach ($items as $item) {
            $subtotalItem = (float)$item['harga'] * (int)$item['qty'];
            $this->orderDetailModel->insert([
                'id_order'     => $idOrder,
                'id_menu'      => $item['id_menu'],
                'qty'          => $item['qty'],
                'harga_satuan' => $item['harga'],
                'subtotal'     => $subtotalItem,
                'catatan'      => $item['catatan'] ?? null,
            ]);
        }

        // ── Simpan Payment ──
        $metodeBayar = $post['metode_bayar'];
        $jumlahBayar = (float)($post['jumlah_bayar'] ?? $totalHarga);
        $kembalian   = $metodeBayar === 'cash' ? max(0, $jumlahBayar - $totalHarga) : 0;

        $this->paymentModel->insert([
            'id_order'    => $idOrder,
            'metode_bayar'=> $metodeBayar,
            'total_bayar' => $totalHarga,
            'jumlah_bayar'=> $jumlahBayar,
            'kembalian'   => $kembalian,
            'status'      => 'paid',
        ]);

        // ── Update status meja → available ──
        if (! empty($post['id_table'])) {
            $this->tableModel->update($post['id_table'], ['status' => 'available']);
        }

        return redirect()->to(base_url('transaksi/struk/' . $idOrder));
    }

    /* ════════════════════════════════════════════════════
       GET /transaksi/struk/{id_order}  →  Halaman struk
    ════════════════════════════════════════════════════ */
    public function struk(int $idOrder)
    {
        $db = \Config\Database::connect();

        $order = $db->query("
            SELECT o.*,
                   c.nama_customer, c.telp,
                   u.nama_lengkap AS kasir,
                   t.nomor_meja,
                   p.nama_promo, p.tipe_diskon, p.nilai_diskon
            FROM `order` o
            LEFT JOIN customer c ON c.id_customer = o.id_customer
            LEFT JOIN user u     ON u.id_user = o.id_user
            LEFT JOIN `table` t  ON t.id_table = o.id_table
            LEFT JOIN promo p    ON p.id_promo = o.id_promo
            WHERE o.id_order = ?
        ", [$idOrder])->getRowArray();

        if (! $order) {
            session()->setFlashdata('error', 'Order tidak ditemukan.');
            return redirect()->to(base_url('transaksi'));
        }

        $details = $db->query("
            SELECT od.*, m.nama_menu, m.gambar
            FROM order_detail od
            JOIN menu m ON m.id_menu = od.id_menu
            WHERE od.id_order = ?
        ", [$idOrder])->getResultArray();

        $payment = $this->paymentModel->where('id_order', $idOrder)->first();

        return view('layouts/main', [
            'title'   => 'Struk Pembayaran',
            'content' => 'transaksi/struk',
            'order'   => $order,
            'details' => $details,
            'payment' => $payment,
        ]);
    }
}