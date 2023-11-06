<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblHasilUjian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_hasil_ujian' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_soal_ujian' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nilai' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'presensi' => [
                'type' => 'ENUM',
                'constraint' => ['hadir', 'tidak_hadir'],
                'default' => 'tidak_hadir'
            ],
            'jawaban' => [
                'type' => 'JSON',
                'null' => true,
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

        $this->forge->addKey('id_hasil_ujian', true);
        // $this->forge->addForeignKey('id_siswa', 'tbl_siswa', 'id_siswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tbl_hasil_ujian');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_hasil_ujian');
    }
}