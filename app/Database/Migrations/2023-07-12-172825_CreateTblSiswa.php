<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblSiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_siswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nis' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'jk' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_siswa', true);
        $this->forge->createTable('tbl_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_siswa');
    }
}
