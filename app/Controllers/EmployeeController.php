<?php

namespace App\Controllers;

use App\Models\UserModel;

class EmployeeController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    /* ─────────────────────────────────────
       GET /employee  →  daftar semua employee
    ───────────────────────────────────── */
    public function index()
    {
        return view('layouts/main', [
            'title'     => 'Manajemen Employee',
            'content'   => 'employee/index',
            'employees' => $this->userModel->orderBy('role', 'ASC')->orderBy('nama_lengkap', 'ASC')->findAll(),
        ]);
    }

    /* ─────────────────────────────────────
       GET /employee/create  →  form tambah
    ───────────────────────────────────── */
    public function create()
    {
        return view('layouts/main', [
            'title'   => 'Tambah Employee',
            'content' => 'employee/create',
        ]);
    }

    /* ─────────────────────────────────────
       GET /employee/edit/{id}  →  form edit
    ───────────────────────────────────── */
    public function edit(int $id)
    {
        $emp = $this->userModel->find($id);
        if (! $emp) {
            session()->setFlashdata('error', 'Employee tidak ditemukan.');
            return redirect()->to(base_url('employee'));
        }

        return view('layouts/main', [
            'title'    => 'Edit Employee — ' . $emp['nama_lengkap'],
            'content'  => 'employee/edit',
            'employee' => $emp,
        ]);
    }

    /* ─────────────────────────────────────
       POST /employee/store  →  tambah employee
    ───────────────────────────────────── */
    public function store()
    {
        $rules = [
            'nama_lengkap' => 'required|min_length[2]|max_length[100]',
            'username'     => 'required|min_length[3]|max_length[50]|is_unique[user.username]',
            'email'        => 'permit_empty|valid_email|max_length[100]|is_unique[user.email]',
            'password'     => 'required|min_length[6]',
            'role'         => 'required|in_list[admin,kasir]',
            'is_active'    => 'required|in_list[0,1]',
        ];

        $messages = [
            'username' => ['is_unique' => 'Username sudah digunakan.'],
            'email'    => ['is_unique' => 'Email sudah digunakan.'],
        ];

        if (! $this->validate($rules, $messages)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back();
        }

        $this->userModel->skipValidation(true)->insert([
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username'     => strtolower(trim($this->request->getPost('username'))),
            'email'        => $this->request->getPost('email') ?: null,
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'         => $this->request->getPost('role'),
            'is_active'    => $this->request->getPost('is_active'),
        ]);

        session()->setFlashdata('success', 'Employee berhasil ditambahkan.');
        return redirect()->to(base_url('employee'));
    }

    /* ─────────────────────────────────────
       POST /employee/update/{id}  →  update data
    ───────────────────────────────────── */
    public function update(int $id)
    {
        $emp = $this->userModel->find($id);
        if (! $emp) {
            session()->setFlashdata('error', 'Employee tidak ditemukan.');
            return redirect()->to(base_url('employee'));
        }

        $rules = [
            'nama_lengkap' => 'required|min_length[2]|max_length[100]',
            'email'        => "permit_empty|valid_email|max_length[100]|is_unique[user.email,id_user,{$id}]",
            'role'         => 'required|in_list[admin,kasir]',
            'is_active'    => 'required|in_list[0,1]',
        ];

        $messages = [
            'email' => ['is_unique' => 'Email sudah digunakan oleh akun lain.'],
        ];

        if (! $this->validate($rules, $messages)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        $this->userModel->skipValidation(true)->update($id, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email'        => $this->request->getPost('email') ?: null,
            'role'         => $this->request->getPost('role'),
            'is_active'    => $this->request->getPost('is_active'),
        ]);

        // Update session kalau yang diedit adalah diri sendiri
        if ($id === (int) session()->get('id_user')) {
            session()->set('nama_lengkap', $this->request->getPost('nama_lengkap'));
        }

        session()->setFlashdata('success', 'Data employee berhasil diperbarui.');
        return redirect()->to(base_url('employee'));
    }

    /* ─────────────────────────────────────
       POST /employee/delete/{id}  →  hapus
    ───────────────────────────────────── */
    public function delete(int $id)
    {
        $emp = $this->userModel->find($id);
        if (! $emp) {
            session()->setFlashdata('error', 'Employee tidak ditemukan.');
            return redirect()->to(base_url('employee'));
        }

        // Tidak bisa hapus diri sendiri
        if ($id === (int) session()->get('id_user')) {
            session()->setFlashdata('error', 'Tidak bisa menghapus akun yang sedang digunakan.');
            return redirect()->to(base_url('employee'));
        }

        $this->userModel->delete($id);
        session()->setFlashdata('success', "Akun {$emp['nama_lengkap']} berhasil dihapus.");
        return redirect()->to(base_url('employee'));
    }

    /* ─────────────────────────────────────
       POST /employee/toggle/{id}  →  aktif/nonaktif
    ───────────────────────────────────── */
    public function toggle(int $id)
    {
        $emp = $this->userModel->find($id);
        if (! $emp) {
            session()->setFlashdata('error', 'Employee tidak ditemukan.');
            return redirect()->to(base_url('employee'));
        }

        if ($id === (int) session()->get('id_user')) {
            session()->setFlashdata('error', 'Tidak bisa mengubah status akun sendiri.');
            return redirect()->to(base_url('employee'));
        }

        $newStatus = $emp['is_active'] ? 0 : 1;
        $this->userModel->skipValidation(true)->update($id, ['is_active' => $newStatus]);

        $label = $newStatus ? 'diaktifkan' : 'dinonaktifkan';
        session()->setFlashdata('success', "Akun {$emp['nama_lengkap']} berhasil {$label}.");
        return redirect()->to(base_url('employee'));
    }

    /* ─────────────────────────────────────
       POST /employee/reset-password/{id}
    ───────────────────────────────────── */
    public function resetPassword(int $id)
    {
        $emp = $this->userModel->find($id);
        if (! $emp) {
            session()->setFlashdata('error', 'Employee tidak ditemukan.');
            return redirect()->to(base_url('employee'));
        }

        if ($id === (int) session()->get('id_user')) {
            session()->setFlashdata('error', 'Gunakan halaman Profil untuk ganti password sendiri.');
            return redirect()->to(base_url('employee/edit/' . $id));
        }

        $pass = $this->request->getPost('password_baru');
        if (strlen($pass) < 6) {
            session()->setFlashdata('error', 'Password minimal 6 karakter.');
            return redirect()->to(base_url('employee/edit/' . $id));
        }

        $this->userModel->skipValidation(true)->update($id, [
            'password' => password_hash($pass, PASSWORD_DEFAULT),
        ]);

        session()->setFlashdata('success', "Password {$emp['nama_lengkap']} berhasil direset.");
        return redirect()->to(base_url('employee/edit/' . $id));
    }
}