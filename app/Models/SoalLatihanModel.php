<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalLatihanModel extends Model
{
    protected $table = 'tbl_soal_latihan';
    protected $primaryKey = 'id_soal_latihan';
    protected $allowedFields = [
        'id_materi',
        'nama_latihan',
        'soal'
    ];
}