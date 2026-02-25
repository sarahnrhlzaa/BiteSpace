<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_category' => 'Makanan Utama',
                'deskripsi'     => 'Hidangan nasi, mie, dan makanan berat lainnya',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_category' => 'Makanan Ringan',
                'deskripsi'     => 'Camilan, gorengan, dan makanan pendamping',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_category' => 'Minuman',
                'deskripsi'     => 'Aneka minuman dingin dan panas',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'nama_category' => 'Dessert',
                'deskripsi'     => 'Makanan penutup dan hidangan manis',
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('category')->insertBatch($data);
    }
}