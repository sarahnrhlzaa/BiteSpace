<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    // ── Halaman profil ──
    public function index()
    {
        $idUser = session()->get('id_user');
        $user   = $this->userModel->find($idUser);

        if (!$user) {
            return redirect()->to('/dashboard')->with('error', 'User tidak ditemukan.');
        }

        return view('layouts/main', [
            'title'   => 'Profil Saya',
            'content' => 'profile/index',
            'user'    => $user,
        ]);
    }

    // ── Halaman edit profil ──
    public function edit()
    {
        $idUser = session()->get('id_user');
        $user   = $this->userModel->find($idUser);

        if (!$user) {
            return redirect()->to('/dashboard')->with('error', 'User tidak ditemukan.');
        }

        return view('layouts/main', [
            'title'   => 'Edit Profil',
            'content' => 'profile/edit',
            'user'    => $user,
        ]);
    }

    // ── Update nama & email ──
    public function update()
    {
        $idUser = session()->get('id_user');

        $rules = [
            'nama_lengkap' => 'required|min_length[2]|max_length[100]',
            'email'        => "permit_empty|valid_email|max_length[100]|is_unique[user.email,id_user,{$idUser}]",
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $this->userModel->update($idUser, [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email'        => $this->request->getPost('email') ?: null,
        ]);

        // Update session nama_lengkap biar langsung keupdate di sidebar
        session()->set('nama_lengkap', $this->request->getPost('nama_lengkap'));

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui!');
    }

    // ── Ganti password ──
    public function changePassword()
    {
        $idUser = session()->get('id_user');
        $user   = $this->userModel->find($idUser);

        $passwordLama = $this->request->getPost('password_lama');
        $passwordBaru = $this->request->getPost('password_baru');
        $passwordConf = $this->request->getPost('password_konfirmasi');

        // Validasi password lama
        if (!password_verify($passwordLama, $user['password'])) {
            return redirect()->back()
                ->with('error_pass', 'Password lama salah.');
        }

        // Validasi panjang password baru
        if (strlen($passwordBaru) < 6) {
            return redirect()->back()
                ->with('error_pass', 'Password baru minimal 6 karakter.');
        }

        // Validasi konfirmasi
        if ($passwordBaru !== $passwordConf) {
            return redirect()->back()
                ->with('error_pass', 'Konfirmasi password tidak cocok.');
        }

        // Pastikan password baru beda dari yang lama
        if (password_verify($passwordBaru, $user['password'])) {
            return redirect()->back()
                ->with('error_pass', 'Password baru tidak boleh sama dengan password lama.');
        }

        $this->userModel->update($idUser, [
            'password' => password_hash($passwordBaru, PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/profile')->with('success', '🔒 Password berhasil diubah! Silakan login ulang untuk keamanan.');
    }
}