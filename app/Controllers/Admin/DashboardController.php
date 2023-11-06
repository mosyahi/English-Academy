<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\MateriModel;
use App\Models\SoalLatihanModel;
use App\Models\SoalUjianModel;
use App\Models\HasilLatihanModel;
use App\Models\HasilUjianModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $userModel = $model->findAll();

        $modelGuru = new GuruModel();
        $guruModel = $modelGuru->findAll();

        $modelSiswa = new SiswaModel();
        $siswaModel = $modelSiswa->findAll();

        $modelMateri = new MateriModel();
        $materiModel = $modelMateri->findAll();

        $modelLatihan = new SoalLatihanModel();
        $latihan = $modelLatihan->findAll();

        $modelUjian = new SoalUjianModel();
        $ujian = $modelUjian->findAll();

        $hasilLatihanModel = new HasilLatihanModel();
        $cLatihan = $hasilLatihanModel->findAll();
        
        $hasilUjianModel = new HasilUjianModel();
        $cUjian = $hasilUjianModel->findAll();


        $data = [
            'dataUser' => $userModel,
            'guru' => $guruModel,
            'siswa' => $siswaModel,
            'materi' => $materiModel,
            'latihan' => $latihan,
            'cLatihan' => $cLatihan,
            'cUjian' => $cUjian,
            'ujian' => $ujian,
            'title' => 'Dashboard'
        ];
        $data['activePage'] = 'dashboard';
        $data['title'] = 'Dashboard';
        return view('admin/index', $data);
    }
}
