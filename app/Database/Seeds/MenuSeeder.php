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
                'gambar'       => '1772096044_bf0169984f22b3d26c99.jpg',
                'harga'        => 28000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Mie Goreng Jumbo',
                'deskripsi'    => 'Mie goreng ukuran jumbo dengan topping bakso, crabstick, telur, dan sayuran segar.',
                'gambar'       => '1772095868_63b5c545d454da59cbc4.jpg',
                'harga'        => 25000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Ayam Bakar Madu',
                'deskripsi'    => 'Ayam kampung bakar dengan bumbu madu dan rempah pilihan. Disajikan dengan nasi putih, lalapan, dan sambal terasi.',
                'gambar'       => '1772095676_d9d409ebf5271105c4d0.jpg',
                'harga'        => 35000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Soto Ayam Kampung',
                'deskripsi'    => 'Soto kuah bening dengan ayam kampung, telur rebus, kentang, dan tauge. Disajikan dengan nasi dan kerupuk.',
                'gambar'       => '1772096825_4dcc63251ac4c36f2c08.webp',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Steak',
                'deskripsi'    => 'Daging sapi lokal 150gr dengan saus lada hitam atau mushroom. Disajikan dengan kentang goreng dan salad.',
                'gambar'       => '1772096780_d01cb259940724ada1b0.jpg',
                'harga'        => 65000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 1,
                'nama_menu'    => 'Gado-Gado Jakarta',
                'deskripsi'    => 'Sayuran rebus segar dengan lontong, telur, tahu, tempe, dan siraman bumbu kacang khas Jakarta.',
                'gambar'       => '1772095749_7421cf8c151d82fb3f19.jpg',
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
                'gambar'       => '1772094166_9eb1e5b5ab3cb7d67f52.jpg',
                'harga'        => 18000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Tahu Crispy Pedas',
                'deskripsi'    => 'Tahu goreng crispy dengan balutan tepung rempah, disajikan dengan saus sambal kacang.',
                'gambar'       => '1772094210_030c165ddc8783520492.jpg',
                'harga'        => 15000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Onion Ring',
                'deskripsi'    => 'Cincin bawang bombay dibalut tepung renyah, disajikan dengan saus tomat dan mayonaise.',
                'gambar'       => '1772094194_3bbc9cf0adad748e1d69.jpg',
                'harga'        => 17000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 2,
                'nama_menu'    => 'Dimsum Ayam (5 pcs)',
                'deskripsi'    => 'Dimsum kukus isi ayam dan udang, disajikan dengan saus tiram dan cabai.',
                'gambar'       => '1772094145_e5c6be0460825a80c2da.jpg',
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
                'gambar'       => '1772096695_8f31ace2170deb407f21.jpeg',
                'harga'        => 8000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Jus Alpukat',
                'deskripsi'    => 'Jus alpukat segar dengan susu kental manis dan sedikit coklat di atasnya.',
                'gambar'       => '1772096621_2c2adba45c51c9108ba6.jpg',
                'harga'        => 18000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Es Kopi Susu',
                'deskripsi'    => 'Kopi robusta lokal dengan susu full cream dan gula aren, disajikan dingin dengan es batu.',
                'gambar'       => '1772096727_b84ec591d3bf03b05b66.jpg',
                'harga'        => 20000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Lemon Tea Sparkling',
                'deskripsi'    => 'Teh lemon dengan soda dan irisan lemon segar, sangat menyegarkan.',
                'gambar'       => '1772096573_0fb8a602fc5dbd30f2d3.webp',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 3,
                'nama_menu'    => 'Air Mineral',
                'deskripsi'    => 'Air mineral botol 600ml.',
                'gambar'       => '1772096760_ccb3cb04de542b9d9fdc.jpg',
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
                'gambar'       => '1772087218_e5a5fbc503fd9493e40a.jpg',
                'harga'        => 20000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 4,
                'nama_menu'    => 'Brownies Coklat',
                'deskripsi'    => 'Brownies lembut dengan topping coklat leleh dan taburan almond panggang.',
                'gambar'       => '1772087033_620957f0331bc57671d1.jpg',
                'harga'        => 22000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'id_category'  => 4,
                'nama_menu'    => 'Pudding Mangga',
                'deskripsi'    => 'Pudding mangga segar dengan saus susu dan potongan buah mangga asli di atasnya.',
                'gambar'       => '1772088171_e6f4d4225643dbc3567d.jpg',
                'harga'        => 15000,
                'is_available' => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('menu')->insertBatch($data);
    }
}