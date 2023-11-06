<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\HasilLatihanModel;
use App\Models\HasilUjianModel;

class NilaiGuruController extends BaseController
{
    public function index()
    {
        $hasilLatihanModel = new HasilLatihanModel();
        $hasilUjianModel = new HasilUjianModel();

        $data['title'] = 'Data Nilai';
        $data['dataNilai'] = [];
        $data['activePageGuru'] = 'nilai';

        // Mengambil data hasil latihan
        $hasilLatihan = $hasilLatihanModel
            ->select('tbl_soal_latihan.nama_latihan, tbl_hasil_latihan.nilai, tbl_hasil_latihan.presensi, tbl_hasil_latihan.nama_siswa, null as nama_ujian, null as nilai_ujian')
            // ->join('tbl_siswa', 'tbl_hasil_latihan.id_siswa = tbl_siswa.id_siswa')
            ->join('tbl_soal_latihan', 'tbl_hasil_latihan.id_soal_latihan = tbl_soal_latihan.id_soal_latihan')
            ->findAll();

        foreach ($hasilLatihan as $hasil) {
            $data['dataNilaiLatihan'][] = [
                'namaSiswa' => $hasil['nama_siswa'],
                'namaLatihan' => $hasil['nama_latihan'],
                'nilaiLatihan' => $hasil['nilai'],
                'presensi' => $hasil['presensi'],
            ];
        }

        // Mengambil data hasil ujian
        $hasilUjian = $hasilUjianModel
            ->select('tbl_soal_ujian.nama_ujian, null as nilai_latihan, tbl_hasil_ujian.nilai, tbl_hasil_ujian.nama_siswa, tbl_hasil_ujian.presensi')
            // ->join('tbl_siswa', 'tbl_hasil_ujian.id_siswa = tbl_siswa.id_siswa')
            ->join('tbl_soal_ujian', 'tbl_hasil_ujian.id_soal_ujian = tbl_soal_ujian.id_soal_ujian')
            ->findAll();

        foreach ($hasilUjian as $hasil) {
            $data['dataNilaiUjian'][] = [
                'namaSiswa' => $hasil['nama_siswa'],
                'namaUjian' => $hasil['nama_ujian'],
                'nilaiUjian' => $hasil['nilai'],
                'presensi' => $hasil['presensi'],
            ];
        }

        return view('guru/data_nilai/index', $data);
    }

    public function tambah()
    {
        $data['activePageGuru'] = 'tambah_nilai';
        return view('guru/data_nilai_latihan/tambah');
    }

    public function edit()
    {
        $data['activePageGuru'] = 'edit_nilai';
        return view('guru/data_nilai_latihan/edit');
    }
}