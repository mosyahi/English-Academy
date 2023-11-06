<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'tbl_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nama', 'nis', 'jk', 'tgl_lahir', 'alamat', 'id_user']; 
}
