<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilUjianModel extends Model
{
    protected $table = 'tbl_hasil_ujian';
    protected $primaryKey = 'id_hasil_ujian';
    protected $allowedFields = ['id_siswa', 'id_soal_ujian', 'nilai', 'presensi', 'jawaban'];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getUjian($hasilUjianId)
    {
        $ujianModel = new SoalUjianModel();
        return $ujianModel->find($this->find($hasilUjianId)['id_soal_ujian']);
    }
}