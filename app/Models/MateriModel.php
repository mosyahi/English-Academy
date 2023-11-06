<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table = 'tbl_materi';
    protected $primaryKey = 'id_materi';
    protected $allowedFields = ['nama_materi', 'deskripsi_materi', 'file_materi', 'video_materi', 'audio_materi'];
}