<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\SoalLatihanModel;
use App\Models\SoalUjianModel;
use App\Models\MateriModel;
use App\Models\HasilLatihanModel;
use App\Models\HasilUjianModel;
use App\Models\SiswaModel;
use CodeIgniter\Services;

class SoalSiswaController extends BaseController
{
    public function index()
    {
        $model = new SoalLatihanModel();
        $soalLatihanModel = $model->select('tbl_soal_latihan.*, tbl_materi.nama_materi')
        ->join('tbl_materi', 'tbl_materi.id_materi = tbl_soal_latihan.id_materi')
        ->findAll();

        $modelUjian = new SoalUjianModel();
        $soalUjianModel = $modelUjian->select('tbl_soal_ujian.*, tbl_materi.nama_materi')
        ->join('tbl_materi', 'tbl_materi.id_materi = tbl_soal_ujian.id_materi')
        ->findAll();

        $data = [
            'title'         => 'Soal Siswa',
            'activePageSiswa'    => 'soal_siswa',
            'soalLatihan'   => $soalLatihanModel,
            'soalUjian'   => $soalUjianModel,
        ];
        return view('siswa/data_soal/index', $data);
    }

    public function mulaiLatihan($id)
    {
        $latihanModel = new SoalLatihanModel();
        $latihan = $latihanModel->find($id);

        $siswaModel = new SiswaModel();
        $listSiswa = $siswaModel->findAll();

        if ($latihan) {
            $materiModel = new MateriModel();
            $materi = $materiModel->find($latihan['id_materi']);
            $materiNama = $materi ? $materi['nama_materi'] : '';

            $data = [
                'title' => 'Soal Latihan',
                'activePageSiswa' => 'soal_latihan',
                'latihan' => $latihan,
                'materi' => $materiNama,
                'listSiswa' => $listSiswa
            ];

            return view('siswa/data_soal/latihan', $data);
        }
    }

    public function mulaiUjian($id)
    {
        $ujianModel = new SoalUjianModel();
        $ujian = $ujianModel->find($id);

        $siswaModel = new SiswaModel();
        $listSiswa = $siswaModel->findAll();

        if ($ujian) {
            $materiModel = new MateriModel();
            $materi = $materiModel->find($ujian['id_materi']);
            $materiNama = $materi ? $materi['nama_materi'] : '';

            $data = [
                'title' => 'Soal Ujian',
                'activePageSiswa' => 'soal_ujian',
                'ujian' => $ujian,
                'materi' => $materiNama,
                'listSiswa' => $listSiswa
            ];

            return view('siswa/data_soal/ujian', $data);
        }
    }

    public function evaluasiLatihan($id)
    {
        $latihanModel = new SoalLatihanModel();
        $latihan = $latihanModel->find($id);

        if (!$latihan) {
        // Tampilkan halaman not found jika data latihan tidak ditemukan
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        // Mengubah JSON soal menjadi array
        $dataSoal = json_decode($latihan['soal'], true);

        $totalSoal = count($dataSoal);
        $totalBenar = 0;

        // Looping untuk menghitung jumlah jawaban benar
        for ($i = 1; $i <= $totalSoal; $i++) {
            $jawabanUser = $this->request->getPost('jawaban_' . $i);
            $kunciJawaban = $dataSoal[$i - 1]['kunci_jawaban'];

            if ($jawabanUser == $kunciJawaban) {
                $totalBenar++;
            }
        }

        // Hitung nilai berdasarkan jawaban benar
        $nilai = ($totalBenar / $totalSoal) * 100;

        $hasilLatihanModel = new HasilLatihanModel();
        $jawaban = $this->request->getPost();

    // Ambil id siswa dari session
        $idSiswa = session()->get('id_siswa');

    // Simpan hasil evaluasi latihan ke dalam database
        $hasilLatihanData = [
            'nama' => $idSiswa,
            'id_soal_latihan' => $id,
            'nilai' => $nilai,
            'presensi' => 'hadir',
            'jawaban' => json_encode($jawaban)
        ];
        $hasilLatihanModel->insert($hasilLatihanData);

    // Mengambil data hasil evaluasi latihan yang baru ditambahkan
        $hasilEvaluasi = $hasilLatihanModel->where('id_hasil_latihan', $hasilLatihanModel->insertID())
        ->first();

    // Jika data hasil evaluasi tidak ditemukan, set $hasilEvaluasi ke null
        if (!$hasilEvaluasi) {
            $hasilEvaluasi = null;
        } else {
        // Mendekode jawaban menjadi array
            $hasilEvaluasi['jawaban'] = json_decode($hasilEvaluasi['jawaban'], true);

            // Mendapatkan data siswa berdasarkan id_siswa dari tabel tbl_siswa
            $siswaModel = new SiswaModel();
            $siswa = $siswaModel->find($idSiswa);
            $namaSiswa = $siswa ? $siswa['nama'] : 'Tidak ditemukan';
        }

        $data = [
            'title' => 'Evaluasi Latihan',
            'activePageSiswa' => 'evaluasi_latihan',
            'latihan' => $latihan,
            'nilai' => $nilai,
            'hasilEvaluasi' => $hasilEvaluasi,
            'namaSiswa' => isset($namaSiswa) ? $namaSiswa : null
        ];

        return view('siswa/data_soal/evaluasi_latihan', $data);
    }


    public function evaluasiUjian($id)
    {
        $ujianModel = new SoalUjianModel();
        $ujian = $ujianModel->find($id);

        if (!$ujian) {
        // Tampilkan halaman not found jika data latihan tidak ditemukan
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }

        // Mengubah JSON soal menjadi array
        $dataSoal = json_decode($ujian['soal_ujian'], true);

        $totalSoal = count($dataSoal);
        $totalBenar = 0;

        // Looping untuk menghitung jumlah jawaban benar
        for ($i = 1; $i <= $totalSoal; $i++) {
            $jawabanUser = $this->request->getPost('jawaban_' . $i);
            $kunciJawaban = $dataSoal[$i - 1]['kunci_jawaban'];

            if ($jawabanUser == $kunciJawaban) {
                $totalBenar++;
            }
        }

    // Hitung nilai berdasarkan jawaban benar
        $nilai = ($totalBenar / $totalSoal) * 100;

        $hasilUjianModel = new HasilUjianModel();
        $jawaban = $this->request->getPost();

    // Ambil id siswa dari session
        $idSiswa = session()->get('id_siswa');

    // Simpan hasil evaluasi latihan ke dalam database
        $hasilUjianData = [
            'id_siswa' => $idSiswa,
            'id_soal_ujian' => $id,
            'nilai' => $nilai,
            'presensi' => 'hadir',
            'jawaban' => json_encode($jawaban)
        ];
        $hasilUjianModel->insert($hasilUjianData);

    // Mengambil data hasil evaluasi latihan yang baru ditambahkan
        $hasilEvaluasi = $hasilUjianModel->where('id_hasil_ujian', $hasilUjianModel->insertID())
        ->first();

    // Jika data hasil evaluasi tidak ditemukan, set $hasilEvaluasi ke null
        if (!$hasilEvaluasi) {
            $hasilEvaluasi = null;
        } else {
        // Mendekode jawaban menjadi array
            $hasilEvaluasi['jawaban'] = json_decode($hasilEvaluasi['jawaban'], true);

        // Mendapatkan data siswa berdasarkan id_siswa dari tabel tbl_siswa
            $siswaModel = new SiswaModel();
            $siswa = $siswaModel->find($idSiswa);
            $namaSiswa = $siswa ? $siswa['nama'] : 'Tidak ditemukan';
        }

        $data = [
            'title' => 'Evaluasi Ujian',
            'activePageSiswa' => 'evaluasi_ujian',
            'ujian' => $ujian,
            'nilai' => $nilai,
            'hasilEvaluasi' => $hasilEvaluasi,
            'namaSiswa' => isset($namaSiswa) ? $namaSiswa : null
        ];

        return view('siswa/data_soal/evaluasi_ujian', $data);
    }

}