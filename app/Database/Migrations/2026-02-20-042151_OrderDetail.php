<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderDetail extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_order' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'id_menu' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'qty' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'harga_satuan' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'subtotal' => [
                'type'           => 'DECIMAL',
                'constraint'     => '10,2',
            ],
            'catatan' => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'created_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
            'updated_at' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ],
        ]);

        $this->forge->addKey('id_detail', true);
        $this->forge->addForeignKey('id_order', 'order', 'id_order', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_menu', 'menu', 'id_menu', 'CASCADE', 'NO ACTION');
        $this->forge->createTable('order_detail');
    }

    public function down()
    {
        $this->forge->dropTable('order_detail');
    }
}