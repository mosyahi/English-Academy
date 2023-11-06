<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createtabelsoallatihan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_soal_latihan' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_materi' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_latihan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'soal' => [
                'type' => 'JSON',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_soal_latihan');
        $this->forge->addForeignKey('id_materi', 'tbl_materi', 'id_materi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_soal_latihan');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_soal_latihan');
    }
}