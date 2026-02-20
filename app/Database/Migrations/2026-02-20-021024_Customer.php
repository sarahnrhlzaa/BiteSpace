<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_customer' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_customer' => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => false,
            ],
            'telp' => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
                'null'           => false,
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

        $this->forge->addKey('id_customer', true); // Primary Key
        $this->forge->createTable('customer');     // Nama Tabel
    }

    public function down()
    {
        $this->forge->dropTable('customer');
    }
}
