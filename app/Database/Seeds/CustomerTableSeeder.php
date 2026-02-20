<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_customer' => 'Budi Santoso',
                'telp'          => '081234567890',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_customer' => 'Rhydar Sugianto',
                'telp'          => '085712345678',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_customer' => 'Andi Wijaya',
                'telp'          => '089987654321',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_customer' => 'Dewi Lestari',
                'telp'          => '082155667788',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('customers')->insertBatch($data);
    }
}
