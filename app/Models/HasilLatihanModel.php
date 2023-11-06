<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilLatihanModel extends Model
{
    protected $table = 'tbl_hasil_latihan';
    protected $primaryKey = 'id_hasil_latihan';
    protected $allowedFields = ['id_siswa', 'id_soal_latihan', 'nilai', 'presensi', 'jawaban'];

    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getLatihan($hasilLatihanId)
    {
        $latihanModel = new SoalLatihanModel();
        return $latihanModel->find($this->find($hasilLatihanId)['id_soal_latihan']);
    }
}