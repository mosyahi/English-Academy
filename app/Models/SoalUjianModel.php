<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalUjianModel extends Model
{
    protected $table = 'tbl_soal_ujian';
    protected $primaryKey = 'id_soal_ujian';
    protected $allowedFields = [
        'id_materi',
        'nama_ujian',
        'soal_ujian'
    ];
}