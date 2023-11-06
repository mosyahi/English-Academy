<?php

namespace App\Controllers\Siswa;
use App\Models\MateriModel;
use App\Controllers\BaseController;

class DashboardSiswaController extends BaseController
{
   public function index()
   {
    $modelMateri = new MateriModel();
    $materiModel = $modelMateri->findAll();

        // $data['activePageSiswa'] = 'dashboard';
    $data = [
        'materi' => $materiModel,
        'title' => 'Dashboard',
        // 'username' => $username, 
        'activePageSiswa' => 'dashboard',
        // 'namaSiswa' => $idSiswa
    ];

    return view('siswa/index', $data);
}

}
