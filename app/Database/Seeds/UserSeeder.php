<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'     => 'sarah',
                'email'        => 'sarah@gmail.com',
                'password'     => password_hash('sarah123', PASSWORD_DEFAULT),
                'role'         => 'admin',
                'nama_lengkap' => 'Sarah Nurhaliza',
                'is_active'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'username'     => 'neyza',
                'email'        => 'neyza@gmail.com',
                'password'     => password_hash('neyza123', PASSWORD_DEFAULT),
                'role'         => 'admin',
                'nama_lengkap' => 'Neyza Maylanie',
                'is_active'    => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('user')->insertBatch($data);
    }
}