<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function login()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username dan password wajib diisi.');
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Username tidak ditemukan.');
        }

        if (!$user['is_active']) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Akun kamu dinonaktifkan. Hubungi admin.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Password salah.');
        }

        session()->set([
            'isLoggedIn'   => true,
            'id_user'      => $user['id_user'],
            'username'     => $user['username'],
            'nama_lengkap' => $user['nama_lengkap'],
            'role'         => $user['role'],
        ]);

        return redirect()->to('/dashboard')->with('success', 'Selamat datang, ' . $user['nama_lengkap'] . '!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Berhasil logout.');
    }
}