<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        // Area Dalam (A1–A8): kapasitas 4 orang — 8 meja
        for ($i = 1; $i <= 8; $i++) {
            $data[] = [
                'nomor_meja' => 'A' . $i,
                'kapasitas'  => 4,
                'status'     => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Area VIP (B1–B6): kapasitas 6 orang — 6 meja
        for ($i = 1; $i <= 6; $i++) {
            $data[] = [
                'nomor_meja' => 'B' . $i,
                'kapasitas'  => 6,
                'status'     => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Area Outdoor (C1–C6): kapasitas 2 orang — 6 meja
        for ($i = 1; $i <= 6; $i++) {
            $data[] = [
                'nomor_meja' => 'C' . $i,
                'kapasitas'  => 2,
                'status'     => 'available',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        // Total: 8 + 6 + 6 = 20 meja
        $this->db->table('table')->insertBatch($data);
    }
}