<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\MenuModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class MenuController extends BaseController
{
    protected $menuModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->menuModel     = new MenuModel();
        $this->categoryModel = new CategoryModel();
    }

    // ── INDEX ──────────────────────────────────────────────
    public function index()
    {
        $data = [
            'title'      => 'Daftar Menu',
            'menus'      => $this->menuModel->getMenuWithCategory(),
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('menu/index', $data);
    }

    // ── CREATE (form) ──────────────────────────────────────
    public function create()
    {
        $data = [
            'title'      => 'Tambah Menu',
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('menu/create', $data);
    }

    // ── STORE (proses simpan) ──────────────────────────────
    public function store()
    {
        $rules = [
            'nama_menu'   => 'required|max_length[150]',
            'harga'       => 'required|numeric|greater_than_equal_to[0]',
            'id_category' => 'required|integer',
            'deskripsi'   => 'permit_empty|max_length[500]',
            'gambar'      => 'permit_empty|uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Upload gambar
        $namaFile = null;
        $gambar   = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && ! $gambar->hasMoved()) {
            $namaFile = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/menu', $namaFile);
        }

        $this->menuModel->insert([
            'id_category'  => $this->request->getPost('id_category'),
            'nama_menu'    => $this->request->getPost('nama_menu'),
            'gambar'       => $namaFile,
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ]);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Menu berhasil ditambahkan!');
    }

    // ── EDIT (form) ────────────────────────────────────────
    public function edit($id)
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->to(base_url('menu'))
                ->with('error', 'Menu tidak ditemukan.');
        }

        $data = [
            'title'      => 'Edit Menu',
            'menu'       => $menu,
            'categories' => $this->categoryModel->findAll(),
        ];

        return view('menu/edit', $data);
    }

    // ── UPDATE (proses edit) ───────────────────────────────
    public function update($id)
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->to(base_url('menu'))
                ->with('error', 'Menu tidak ditemukan.');
        }

        $rules = [
            'nama_menu'   => 'required|max_length[150]',
            'harga'       => 'required|numeric|greater_than_equal_to[0]',
            'id_category' => 'required|integer',
            'deskripsi'   => 'permit_empty|max_length[500]',
        ];

        // Validasi gambar hanya kalau ada file baru
        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid()) {
            $rules['gambar'] = 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $namaFile = $menu['gambar']; // default pakai foto lama

        // Hapus gambar lama kalau dicentang
        if ($this->request->getPost('hapus_gambar') && $menu['gambar']) {
            $pathLama = ROOTPATH . 'public/uploads/menu/' . $menu['gambar'];
            if (file_exists($pathLama)) unlink($pathLama);
            $namaFile = null;
        }

        // Upload gambar baru kalau ada
        if ($gambar && $gambar->isValid() && ! $gambar->hasMoved()) {
            // Hapus foto lama dulu
            if ($menu['gambar']) {
                $pathLama = ROOTPATH . 'public/uploads/menu/' . $menu['gambar'];
                if (file_exists($pathLama)) unlink($pathLama);
            }
            $namaFile = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/uploads/menu', $namaFile);
        }

        $this->menuModel->update($id, [
            'id_category'  => $this->request->getPost('id_category'),
            'nama_menu'    => $this->request->getPost('nama_menu'),
            'gambar'       => $namaFile,
            'deskripsi'    => $this->request->getPost('deskripsi'),
            'harga'        => $this->request->getPost('harga'),
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ]);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Menu berhasil diperbarui!');
    }

    // ── DELETE ─────────────────────────────────────────────
    public function delete($id)
    {
        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->to(base_url('menu'))
                ->with('error', 'Menu tidak ditemukan.');
        }

        // Hapus file gambar
        if ($menu['gambar']) {
            $path = ROOTPATH . 'public/uploads/menu/' . $menu['gambar'];
            if (file_exists($path)) unlink($path);
        }

        $this->menuModel->delete($id);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Menu berhasil dihapus.');
    }

    // ── TOGGLE AVAILABLE (AJAX) ────────────────────────────
    public function toggle($id)
    {
        // Harus AJAX
        if (! $this->request->isAJAX()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request']);
        }

        $menu = $this->menuModel->find($id);
        if (! $menu) {
            return $this->response->setJSON(['success' => false, 'message' => 'Menu tidak ditemukan']);
        }

        $body = $this->request->getJSON(true);
        $val  = isset($body['is_available']) ? (int) $body['is_available'] : 0;

        $this->menuModel->update($id, ['is_available' => $val]);

        return $this->response->setJSON([
            'success'      => true,
            'is_available' => $val,
            'message'      => $val ? 'Menu diaktifkan' : 'Menu dinonaktifkan',
        ]);
    }
}