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

    // ── Helper: cek role (case-insensitive) ───────────────
    private function getRole(): string
    {
        return strtolower((string) session()->get('role'));
    }

    private function isAdmin(): bool
    {
        return $this->getRole() === 'admin';
    }

    // ── Helper: tolak akses bukan admin ───────────────────
    private function adminOnly()
    {
        return redirect()->to(base_url('menu'))
            ->with('error', 'Akses ditolak. Hanya admin yang dapat melakukan tindakan ini.');
    }

    // ── INDEX ──────────────────────────────────────────────
    public function index()
    {
        return view('layouts/main', [
            'title'      => 'Daftar Menu',
            'content'    => 'menu/index',
            'menus'      => $this->menuModel->getMenuWithCategory(),
            'categories' => $this->categoryModel->findAll(),
            'isAdmin'    => $this->isAdmin(),   // <-- dikirim ke view
        ]);
    }

    // ── CREATE (form) ──────────────────────────────────────
    public function create()
    {
        if (! $this->isAdmin()) return $this->adminOnly();

        return view('layouts/main', [
            'title'      => 'Tambah Menu',
            'content'    => 'menu/create',
            'categories' => $this->categoryModel->findAll(),
        ]);
    }

    // ── STORE (proses simpan) ──────────────────────────────
    public function store()
    {
        if (! $this->isAdmin()) return $this->adminOnly();

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
        if (! $this->isAdmin()) return $this->adminOnly();

        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->to(base_url('menu'))
                ->with('error', 'Menu tidak ditemukan.');
        }

        return view('layouts/main', [
            'title'      => 'Edit Menu',
            'content'    => 'menu/edit',
            'menu'       => $menu,
            'categories' => $this->categoryModel->findAll(),
        ]);
    }

    // ── UPDATE (proses edit) ───────────────────────────────
    public function update($id)
    {
        if (! $this->isAdmin()) return $this->adminOnly();

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

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid()) {
            $rules['gambar'] = 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $namaFile = $menu['gambar'];

        // Hapus gambar lama kalau dicentang
        if ($this->request->getPost('hapus_gambar') && $menu['gambar']) {
            $pathLama = ROOTPATH . 'public/uploads/menu/' . $menu['gambar'];
            if (file_exists($pathLama)) unlink($pathLama);
            $namaFile = null;
        }

        // Upload gambar baru kalau ada
        if ($gambar && $gambar->isValid() && ! $gambar->hasMoved()) {
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
        if (! $this->isAdmin()) return $this->adminOnly();

        $menu = $this->menuModel->find($id);

        if (! $menu) {
            return redirect()->to(base_url('menu'))
                ->with('error', 'Menu tidak ditemukan.');
        }

        if ($menu['gambar']) {
            $path = ROOTPATH . 'public/uploads/menu/' . $menu['gambar'];
            if (file_exists($path)) unlink($path);
        }

        $this->menuModel->delete($id);

        return redirect()->to(base_url('menu'))
            ->with('success', 'Menu berhasil dihapus.');
    }

    // ── TOGGLE AVAILABLE (AJAX) — admin & kasir boleh ─────
    public function toggle($id)
    {
        // Cek role: hanya admin dan kasir yang boleh toggle
        $role = $this->getRole();
        if (! in_array($role, ['admin', 'kasir'])) {
            return $this->response->setStatusCode(403)
                ->setJSON(['success' => false, 'message' => 'Akses ditolak']);
        }

        $menu = $this->menuModel->find($id);
        if (! $menu) {
            return $this->response->setJSON(['success' => false, 'message' => 'Menu tidak ditemukan']);
        }

        // Baca nilai dari JSON body atau POST biasa
        $body = $this->request->getJSON(true);
        if ($body && isset($body['is_available'])) {
            $val = (int) $body['is_available'];
        } else {
            $val = (int) $this->request->getPost('is_available');
        }

        $this->menuModel->update($id, ['is_available' => $val]);

        return $this->response->setJSON([
            'success'      => true,
            'is_available' => $val,
            'message'      => $val ? 'Menu diaktifkan' : 'Menu dinonaktifkan',
        ]);
    }
}