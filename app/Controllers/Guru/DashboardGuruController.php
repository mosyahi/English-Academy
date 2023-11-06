<?php

namespace App\Controllers\Guru;


use App\Models\MateriModel;
use App\Models\SoalLatihanModel;
use App\Models\SoalUjianModel;
use App\Models\HasilLatihanModel;
use App\Models\HasilUjianModel;
use App\Controllers\BaseController;

class DashboardGuruController extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        // $username = $session->get('username'); 
        $namaGuru = $session->get('nama');

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
            'latihan' => $latihan,
            'ujian' => $ujian,
            'materi' => $materiModel,
            'cLatihan' => $cLatihan,
            'cUjian' => $cUjian,
            'title' => 'Dashboard',
            'activePageGuru' => 'dashboard',
            'namaGuru' => $namaGuru
        ];
        
        return view('guru/index', $data);
    }
}
