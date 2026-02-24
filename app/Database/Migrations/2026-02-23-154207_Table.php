<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Table extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_table' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomor_meja' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'null'           => false,
            ],
            'kapasitas' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['available', 'occupied', 'reserved'],
                'default'    => 'available',
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

        $this->forge->addKey('id_table', true);
        $this->forge->createTable('table');
    }

    public function down()
    {
        $this->forge->dropTable('table');
    }
}