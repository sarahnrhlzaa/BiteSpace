<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PromoSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_promo'      => 'HUT5',
                'nama_promo'      => 'HUT Restoran ke-5',
                'deskripsi'       => 'Rayakan ulang tahun restoran kami yang ke-5! Diskon 20% untuk semua menu, maksimal potongan Rp 50.000.',
                'tipe_diskon'     => 'percent',
                'nilai_diskon'    => 20.00,
                'maks_diskon'     => 30000.00,
                'min_transaksi'   => 70000.00,      
                'tanggal_mulai'   => '2026-03-15',
                'tanggal_selesai' => '2026-03-15',
                'is_active'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'kode_promo'      => 'VALENTINE',
                'nama_promo'      => 'Valentine Special',
                'deskripsi'       => 'Promo spesial Hari Valentine! Potongan Rp 25.000 untuk transaksi minimum Rp 100.000.',
                'tipe_diskon'     => 'nominal',
                'nilai_diskon'    => 25000.00,
                'maks_diskon'     => null,
                'min_transaksi'   => 100000.00, // minimum belanja Rp 100.000
                'tanggal_mulai'   => '2026-02-14',
                'tanggal_selesai' => '2026-02-14',
                'is_active'       => 0,         // sudah expired
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'kode_promo'      => 'LEBARAN26',
                'nama_promo'      => 'Promo Lebaran 2026',
                'deskripsi'       => 'Selamat Hari Raya Idul Fitri! Diskon 15% untuk transaksi minimum Rp 75.000, maksimal potongan Rp 75.000.',
                'tipe_diskon'     => 'percent',
                'nilai_diskon'    => 15.00,
                'maks_diskon'     => 75000.00,
                'min_transaksi'   => 75000.00,
                'tanggal_mulai'   => '2026-03-30',
                'tanggal_selesai' => '2026-04-05',
                'is_active'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'kode_promo'      => 'WEEKEND',
                'nama_promo'      => 'Weekend Hemat',
                'deskripsi'       => 'Hemat Rp 10.000 setiap akhir pekan untuk transaksi di atas Rp 50.000.',
                'tipe_diskon'     => 'nominal',
                'nilai_diskon'    => 10000.00,
                'maks_diskon'     => null,
                'min_transaksi'   => 50000.00,
                'tanggal_mulai'   => '2026-03-01',
                'tanggal_selesai' => '2026-03-31',
                'is_active'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
            [
                'kode_promo'      => 'NEWMEMBER',
                'nama_promo'      => 'New Member Discount',
                'deskripsi'       => 'Diskon spesial 10% untuk pelanggan baru, tidak ada minimum transaksi.',
                'tipe_diskon'     => 'percent',
                'nilai_diskon'    => 10.00,
                'maks_diskon'     => 30000.00,
                'min_transaksi'   => 0.00,
                'tanggal_mulai'   => '2026-01-01',
                'tanggal_selesai' => '2026-12-31', // berlaku sepanjang tahun
                'is_active'       => 1,
                'created_at'      => date('Y-m-d H:i:s'),
                'updated_at'      => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('promo')->insertBatch($data);
    }
}