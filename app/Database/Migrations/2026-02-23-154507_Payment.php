<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Payment extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_payment' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_order' => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'metode_bayar' => [
                'type'       => 'ENUM',
                'constraint' => ['cash', 'debit', 'qris'],
            ],
            'total_bayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'jumlah_bayar' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'kembalian' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['unpaid', 'paid'],
                'default'    => 'unpaid',
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

        $this->forge->addKey('id_payment', true);
        $this->forge->addUniqueKey('id_order');
        $this->forge->addForeignKey('id_order', 'order', 'id_order', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payment');
    }

    public function down()
    {
        $this->forge->dropTable('payment');
    }
}