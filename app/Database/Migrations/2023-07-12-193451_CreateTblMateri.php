<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblMateri extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_materi' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_materi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'deskripsi_materi' => [
                'type' => 'TEXT',
            ],
            'file_materi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'video_materi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'audio_materi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_materi');
        $this->forge->createTable('tbl_materi');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_materi');
    }
}
