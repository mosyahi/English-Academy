<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => password_hash('donodonoan', PASSWORD_DEFAULT),
                'role' => 'admin'
            ],
        ];

        $this->db->table('tbl_users')->insertBatch($data);
    }
}
