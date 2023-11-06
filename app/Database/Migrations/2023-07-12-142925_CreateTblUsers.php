<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTblUsers extends Migration
{
    public function up()
    {
        $this->forge->addField('id');
        $this->forge->addField([
            'username'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'password'  => ['type' => 'VARCHAR', 'constraint' => 100],
            'role'      => ['type' => 'ENUM', 'constraint' => ['admin', 'guru', 'siswa']],
        ]);
        $this->forge->createTable('tbl_users');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_users');
    }
}
