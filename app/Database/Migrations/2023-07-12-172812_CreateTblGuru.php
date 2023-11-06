<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);

        $this->forge->addKey('id_guru', true);
        $this->forge->createTable('tbl_guru');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_guru');
    }
}
