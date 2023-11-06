<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table = 'tbl_guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = ['nama', 'nip', 'id_user'];
}
