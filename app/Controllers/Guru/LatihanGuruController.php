<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\SoalLatihanModel;

class LatihanGuruController extends BaseController
{
    protected $soalLatihanModel;

    public function __construct()
    {
        $this->soalLatihanModel = new SoalLatihanModel();
    }
    public function index()
    {
        $model = new SoalLatihanModel();
        $soalLatihanModel = $model->select('tbl_soal_latihan.*, tbl_materi.nama_materi')
        ->join('tbl_materi', 'tbl_materi.id_materi = tbl_soal_latihan.id_materi')
        ->findAll();

        $data = [
            'title'         => 'Soal Latihan',
            'activePageGuru'    => 'soal_latihan',
            'soalLatihan'   => $soalLatihanModel
        ];
        return view('guru/data_soal_latihan/index', $data);
    }


    public function new()
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();
        $data = [
            'title'         => 'Tambah Soal Latihan',
            'activePageGuru'    => 'tambah_soal_latihan',
            'materi'        => $dataMateri
        ];
        return view('guru/data_soal_latihan/tambah', $data);
    }

    public function add()
    {
        // Validasi input
        $validationRules = [
            'id_materi' => 'required',
            'nama_latihan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            $validationErrors = $this->validator->getErrors();

            // Mengirimkan pesan error ke halaman sebelumnya
            return redirect()->back()->withInput()->with('gagal', $validationErrors);
        }

        // Ambil data dari input form
        $idMateri = $this->request->getPost('id_materi');
        $namaLatihan = $this->request->getPost('nama_latihan');

        // Ambil data soal dalam bentuk array dari form
        $dataSoal = [];

        $jumlahSoal = $this->request->getPost('jumlah_soal');

        for ($i = 1; $i <= $jumlahSoal; $i++) {
            $soal = $this->request->getPost('soal_' . $i);
            $jawabanA = $this->request->getPost('jawaban_a_' . $i);
            $jawabanB = $this->request->getPost('jawaban_b_' . $i);
            $jawabanC = $this->request->getPost('jawaban_c_' . $i);
            $jawabanD = $this->request->getPost('jawaban_d_' . $i);
            $kunciJawaban = $this->request->getPost('kunci_jawaban_' . $i);

            $dataSoal[] = [
                'soal' => $soal,
                'jawaban_a' => $jawabanA,
                'jawaban_b' => $jawabanB,
                'jawaban_c' => $jawabanC,
                'jawaban_d' => $jawabanD,
                'kunci_jawaban' => $kunciJawaban
            ];
        }

        // Simpan data ke database
        $soalLatihanData = [
            'id_materi' => $idMateri,
            'nama_latihan' => $namaLatihan,
            'soal' => json_encode($dataSoal), // Mengubah array soal menjadi JSON
        ];

        $this->soalLatihanModel->insert($soalLatihanData);

        // Mengirimkan pesan sukses ke halaman sebelumnya
        return redirect()->to('guru/latihan')->with('success', 'Data soal latihan berhasil disimpan.');
    }

    public function lihat($id)
    {
        $latihanModel = new SoalLatihanModel();
        $latihan = $latihanModel->find($id);

        if ($latihan) {
            $materiModel = new MateriModel();
            $materi = $materiModel->find($latihan['id_materi']);
            $materiNama = $materi ? $materi['nama_materi'] : '';

            $data = [
                'title' => 'Detail Latihan',
                'activePageGuru' => 'detail_latihan',
                'latihan' => $latihan,
                'materi' => $materiNama
            ];

            return view('guru/data_soal_latihan/detail', $data);
        }
    }

    public function edit($id)
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();

        // Buat instance model SoalLatihanModel
        $soalLatihanModel = new SoalLatihanModel();

        // Dapatkan data soal latihan berdasarkan ID yang dikirimkan
        $soalLatihan = $soalLatihanModel->find($id);

        // Cek apakah data soal latihan ditemukan
        if ($soalLatihan === null) {
            // Redirect ke halaman sebelumnya dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data soal latihan tidak ditemukan.');
        }

        // Ambil data soal dari JSON dan konversi menjadi array
        $soal = json_decode($soalLatihan['soal'], true);

        $data = [
            'title'         => 'Edit Soal',
            'activePageGuru'    => 'soal_latihan',
            'materi'        => $dataMateri,
            'soalLatihan'   => $soalLatihan,
            'soal'          => $soal
        ];

        return view('guru/data_soal_latihan/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'id_materi' => 'required',
            'nama_latihan' => 'required',
        ];

        $messages = [
            'id_materi.required' => 'Pilih materi.',
            'nama_latihan.required' => 'Nama latihan harus diisi.',
        ];

        $this->validate($rules, $messages);

        // Ambil data dari input form
        $idMateri = $this->request->getPost('id_materi');
        $namaLatihan = $this->request->getPost('nama_latihan');

        // Ambil data soal dalam bentuk array dari form
        $dataSoal = [];

        for ($i = 1; $this->request->getPost('soal_' . $i) !== null; $i++) {
            $soal = $this->request->getPost('soal_' . $i);
            $jawabanA = $this->request->getPost('jawaban_a_' . $i);
            $jawabanB = $this->request->getPost('jawaban_b_' . $i);
            $jawabanC = $this->request->getPost('jawaban_c_' . $i);
            $jawabanD = $this->request->getPost('jawaban_d_' . $i);
            $kunciJawaban = $this->request->getPost('kunci_jawaban_' . $i);

            $dataSoal[] = [
                'soal' => $soal,
                'jawaban_a' => $jawabanA,
                'jawaban_b' => $jawabanB,
                'jawaban_c' => $jawabanC,
                'jawaban_d' => $jawabanD,
                'kunci_jawaban' => $kunciJawaban
            ];
        }

        // Ambil data soal latihan yang sudah ada dari database
        $soalLatihan = $this->soalLatihanModel->find($id);

        // Periksa apakah data soal latihan ditemukan
        if ($soalLatihan === null) {
            // Redirect kembali dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data soal latihan tidak ditemukan.');
        }

        // Periksa apakah ada perubahan dalam data soal latihan
        if ($idMateri === $soalLatihan['id_materi'] && $namaLatihan === $soalLatihan['nama_latihan']
            && json_encode($dataSoal) === $soalLatihan['soal']) {
            // Redirect kembali dengan pesan peringatan jika tidak ada perubahan
            return redirect()->back()->with('warning', 'Tidak ada perubahan yang dilakukan.');
        }

        // Update data soal latihan di database
        $updatedData = [
            'id_materi' => $idMateri,
            'nama_latihan' => $namaLatihan,
            'soal' => json_encode($dataSoal),
        ];

        $this->soalLatihanModel->update($id, $updatedData);

        // Redirect kembali ke halaman 'soal_latihan' dengan pesan sukses
        return redirect()->to('guru/latihan')->with('success', 'Data soal latihan berhasil diperbarui.');
    }
}