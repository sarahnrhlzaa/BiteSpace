<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Promo extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_promo' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_promo' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => false,
                'comment'    => 'Kode unik yang diinput kasir saat checkout, contoh: LEBARAN25',
            ],
            'nama_promo' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tipe_diskon' => [
                'type'       => 'ENUM',
                'constraint' => ['percent', 'nominal'],
                'null'       => false,
                'comment'    => 'percent = diskon %, nominal = potongan langsung Rp',
            ],
            'nilai_diskon' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'comment'    => 'Angka persen (maks 100) atau nominal rupiah',
            ],
            'maks_diskon' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
                'default'    => null,
                'comment'    => 'Batas maksimal potongan, hanya untuk tipe percent. NULL = tidak ada batas',
            ],
            'min_transaksi' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => false,
                'default'    => 0,
                'comment'    => 'Minimum total order sebelum diskon dihitung. 0 = tidak ada minimum',
            ],
            'tanggal_mulai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_selesai' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'is_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => false,
                'default'    => 1,
                'comment'    => '1 = aktif, 0 = nonaktif (toggle manual oleh admin)',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_promo', true);
        $this->forge->addUniqueKey('kode_promo'); 
        $this->forge->createTable('promo');
    }

    public function down()
    {
        $this->forge->dropTable('promo');
    }
}