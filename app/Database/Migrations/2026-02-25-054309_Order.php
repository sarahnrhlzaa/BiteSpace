<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_order' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'id_table' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => FALSE
            ],
            'id_customer' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => TRUE
            ],
            'id_user' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => FALSE
            ],
            'id_promo' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => TRUE,    // nullable, tidak semua order pakai promo
                'default'  => NULL,
            ],
            'kode_order' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => FALSE
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'process', 'done', 'cancelled'],
                'null'       => FALSE,
                'default'    => 'pending'
            ],
            'diskon_nominal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => FALSE,
                'default'    => 0,      // 0 jika tidak pakai promo
            ],
            'total_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => FALSE,
                'default'    => 0       // total SETELAH diskon
            ],
            'catatan' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE
            ]
        ]);

        $this->forge->addKey('id_order', TRUE);
        $this->forge->addUniqueKey('kode_order');
        $this->forge->addForeignKey('id_user', 'user', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_table', 'table', 'id_table', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_customer', 'customer', 'id_customer', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('id_promo', 'promo', 'id_promo', 'SET NULL', 'CASCADE');
        $this->forge->createTable('order');
    }

    public function down()
    {
        $this->forge->dropTable('order');
    }
}