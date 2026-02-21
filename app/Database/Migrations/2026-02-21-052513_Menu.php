<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Menu extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_menu' => [
                'type'           => 'INT',
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'id_category' => [
                'type'     => 'INT',
                'unsigned' => TRUE,
                'null'     => FALSE
            ],
            'nama_menu' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => FALSE
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => FALSE
            ],
            'is_available' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'null'       => FALSE,
                'default'    => 1
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

        $this->forge->addKey('id_menu', TRUE);
        $this->forge->addForeignKey('id_category', 'category', 'id_category', 'CASCADE', 'CASCADE');
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}