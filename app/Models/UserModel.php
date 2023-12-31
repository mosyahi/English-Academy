<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'role'];

    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
