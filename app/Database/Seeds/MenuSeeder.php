<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // ── MAKANAN UTAMA ──────────────────────────────────────────
            [
                'id_category'  => 1,
                'nama_menu'    => 'Nasi Goreng Spesial',
                'deskripsi'    => 'Nasi goreng dengan telur mata sapi, ayam suwir, udang, dan acar. Disajikan dengan kerupuk dan sambal.',
                'gambar'       => 'nasi_goreng_spesial.jpg',
                'harga'        => 28000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Mie Goreng Jumbo',
                'deskripsi'    => 'Mie goreng ukuran jumbo dengan topping bakso, crabstick, telur, dan sayuran segar.',
                'gambar'       => 'mie_goreng_jumbo.jpg',
                'harga'        => 25000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Ayam Bakar Madu',
                'deskripsi'    => 'Ayam kampung bakar dengan bumbu madu dan rempah pilihan. Disajikan dengan nasi putih, lalapan, dan sambal terasi.',
                'gambar'       => 'ayam_bakar_madu.jpg',
                'harga'        => 35000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Soto Ayam Kampung',
                'deskripsi'    => 'Soto kuah bening dengan ayam kampung, telur rebus, kentang, dan tauge. Disajikan dengan nasi dan kerupuk.',
                'gambar'       => 'soto_ayam.jpg',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Steak',
                'deskripsi'    => 'Daging sapi lokal 150gr dengan saus lada hitam atau mushroom. Disajikan dengan kentang goreng dan salad.',
                'gambar'       => 'steak_daging.jpg',
                'harga'        => 65000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Gado-Gado Jakarta',
                'deskripsi'    => 'Sayuran rebus segar dengan lontong, telur, tahu, tempe, dan siraman bumbu kacang khas Jakarta.',
                'gambar'       => 'gado_gado.jpg',
                'harga'        => 20000,
                'is_available' => 0, // contoh menu sedang tidak tersedia
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // ── MAKANAN RINGAN ─────────────────────────────────────────
            [
                'id_category'  => 2,
                'nama_menu'    => 'French Fries Crispy',
                'deskripsi'    => 'Kentang goreng renyah dengan pilihan saus: BBQ, keju, atau sambal. Porsi medium.',
                'gambar'       => 'french_fries.jpg',
                'harga'        => 18000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Tahu Crispy Pedas',
                'deskripsi'    => 'Tahu goreng crispy dengan balutan tepung rempah, disajikan dengan saus sambal kacang.',
                'gambar'       => 'tahu_crispy.jpg',
                'harga'        => 15000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Onion Ring',
                'deskripsi'    => 'Cincin bawang bombay dibalut tepung renyah, disajikan dengan saus tomat dan mayonaise.',
                'gambar'       => 'onion_ring.jpg',
                'harga'        => 17000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Dimsum Ayam (5 pcs)',
                'deskripsi'    => 'Dimsum kukus isi ayam dan udang, disajikan dengan saus tiram dan cabai.',
                'gambar'       => 'dimsum_ayam.jpg',
                'harga'        => 20000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // ── MINUMAN ────────────────────────────────────────────────
            [
                'id_category'  => 3,
                'nama_menu'    => 'Es Teh Manis',
                'deskripsi'    => 'Teh manis dingin dengan es batu, segar dan menyegarkan.',
                'gambar'       => 'es_teh_manis.jpg',
                'harga'        => 8000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Jus Alpukat',
                'deskripsi'    => 'Jus alpukat segar dengan susu kental manis dan sedikit coklat di atasnya.',
                'gambar'       => 'jus_alpukat.jpg',
                'harga'        => 18000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Es Kopi Susu',
                'deskripsi'    => 'Kopi robusta lokal dengan susu full cream dan gula aren, disajikan dingin dengan es batu.',
                'gambar'       => 'es_kopi_susu.jpg',
                'harga'        => 20000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Lemon Tea Sparkling',
                'deskripsi'    => 'Teh lemon dengan soda dan irisan lemon segar, sangat menyegarkan.',
                'gambar'       => 'lemon_tea_sparkling.jpg',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Air Mineral',
                'deskripsi'    => 'Air mineral botol 600ml.',
                'gambar'       => 'air_mineral.jpg',
                'harga'        => 5000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],

            // ── DESSERT ────────────────────────────────────────────────
            [
                'id_category'  => 4,
                'nama_menu'    => 'Es Krim 2 Scoop',
                'deskripsi'    => 'Pilihan 2 rasa: coklat, vanilla, atau stroberi. Disajikan dengan cone atau cup.',
                'gambar'       => 'es_krim.jpg',
                'harga'        => 20000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 4,
                'nama_menu'    => 'Brownies Coklat',
                'deskripsi'    => 'Brownies lembut dengan topping coklat leleh dan taburan almond panggang.',
                'gambar'       => 'brownies_coklat.jpg',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 4,
                'nama_menu'    => 'Pudding Mangga',
                'deskripsi'    => 'Pudding mangga segar dengan saus susu dan potongan buah mangga asli di atasnya.',
                'gambar'       => 'pudding_mangga.jpg',
                'harga'        => 15000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('menu')->insertBatch($data);
    }
}