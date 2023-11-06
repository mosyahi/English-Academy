<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblUjian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_soal_ujian' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_materi' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'nama_ujian' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'soal_ujian' => [
                'type' => 'JSON',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_soal_ujian');
        $this->forge->addForeignKey('id_materi', 'tbl_materi', 'id_materi', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_soal_ujian');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_soal_ujian');
    }
}