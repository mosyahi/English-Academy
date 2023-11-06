<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\MateriModel;
use App\Models\SoalUjianModel;

class UjianGuruController extends BaseController
{
    protected $soalUjianModel;

    public function __construct()
    {
        $this->soalUjianModel = new SoalUjianModel();
    }
    public function index()
    {
        $model = new SoalUjianModel();
        $soalUjianModel = $model->select('tbl_soal_ujian.*, tbl_materi.nama_materi')
        ->join('tbl_materi', 'tbl_materi.id_materi = tbl_soal_ujian.id_materi')
        ->findAll();

        $data = [
            'title'         => 'Soal Ujian',
            'activePageGuru'    => 'soal_ujian',
            'soalUjian'   => $soalUjianModel
        ];
        return view('guru/data_soal_ujian/index', $data);
    }


    public function new()
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();
        $data = [
            'title'         => 'Tambah Soal Ujian',
            'activePageGuru'    => 'tambah_soal_ujian',
            'materi'        => $dataMateri
        ];
        return view('guru/data_soal_ujian/tambah', $data);
    }

    public function add()
    {
        // Validasi input
        $validationRules = [
            'id_materi' => 'required',
            'nama_ujian' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            $validationErrors = $this->validator->getErrors();

            // Mengirimkan pesan error ke halaman sebelumnya
            return redirect()->back()->withInput()->with('gagal', $validationErrors);
        }

        // Ambil data dari input form
        $idMateri = $this->request->getPost('id_materi');
        $namaUjian = $this->request->getPost('nama_ujian');

        // Ambil data soal dalam bentuk array dari form
        $dataSoal = [];

        $jumlahSoal = $this->request->getPost('jumlah_soal');

        for ($i = 1; $i <= $jumlahSoal; $i++) {
            $soal = $this->request->getPost('soal_ujian' . $i);
            $jawabanA = $this->request->getPost('jawaban_a_' . $i);
            $jawabanB = $this->request->getPost('jawaban_b_' . $i);
            $jawabanC = $this->request->getPost('jawaban_c_' . $i);
            $jawabanD = $this->request->getPost('jawaban_d_' . $i);
            $kunciJawaban = $this->request->getPost('kunci_jawaban_' . $i);

            $dataSoal[] = [
                'soal_ujian' => $soal,
                'jawaban_a' => $jawabanA,
                'jawaban_b' => $jawabanB,
                'jawaban_c' => $jawabanC,
                'jawaban_d' => $jawabanD,
                'kunci_jawaban' => $kunciJawaban
            ];
        }

        // Simpan data ke database
        $soalUjianData = [
            'id_materi' => $idMateri,
            'nama_ujian' => $namaUjian,
            'soal_ujian' => json_encode($dataSoal), // Mengubah array soal menjadi JSON
        ];

        $this->soalUjianModel->insert($soalUjianData);

        // Mengirimkan pesan sukses ke halaman sebelumnya
        return redirect()->to('guru/ujian')->with('success', 'Data soal ujian berhasil disimpan.');
    }

    public function lihat($id)
    {
        $ujianModel = new SoalUjianModel();
        $ujian = $ujianModel->find($id);

        if ($ujian) {
            $materiModel = new MateriModel();
            $materi = $materiModel->find($ujian['id_materi']);
            $materiNama = $materi ? $materi['nama_materi'] : '';

            $data = [
                'title' => 'Detail Ujian',
                'activePageGuru' => 'detail_ujian',
                'ujian' => $ujian,
                'materi' => $materiNama
            ];

            return view('guru/data_soal_ujian/detail', $data);
        }
    }

    public function edit($id)
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();

        // Buat instance model SoalLatihanModel
        $soalUjianModel = new SoalUjianModel();

        // Dapatkan data soal latihan berdasarkan ID yang dikirimkan
        $soalUjian = $soalUjianModel->find($id);

        // Cek apakah data soal latihan ditemukan
        if ($soalUjian === null) {
            // Redirect ke halaman sebelumnya dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data soal ujian tidak ditemukan.');
        }

        // Ambil data soal dari JSON dan konversi menjadi array
        $soal = json_decode($soalUjian['soal_ujian'], true);

        $data = [
            'title'         => 'Edit Soal',
            'activePageGuru'    => 'soal_ujian',
            'materi'        => $dataMateri,
            'soalUjian'   => $soalUjian,
            'soal'          => $soal
        ];

        return view('guru/data_soal_ujian/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'id_materi' => 'required',
            'nama_ujian' => 'required',
        ];

        $messages = [
            'id_materi.required' => 'Pilih materi.',
            'nama_ujian.required' => 'Nama ujian harus diisi.',
        ];

        $this->validate($rules, $messages);

        // Ambil data dari input form
        $idMateri = $this->request->getPost('id_materi');
        $namaUjian = $this->request->getPost('nama_ujian');

        // Ambil data soal dalam bentuk array dari form
        $dataSoal = [];

        for ($i = 1; $this->request->getPost('soal_ujian' . $i) !== null; $i++) {
            $soal = $this->request->getPost('soal_ujian' . $i);
            $jawabanA = $this->request->getPost('jawaban_a_' . $i);
            $jawabanB = $this->request->getPost('jawaban_b_' . $i);
            $jawabanC = $this->request->getPost('jawaban_c_' . $i);
            $jawabanD = $this->request->getPost('jawaban_d_' . $i);
            $kunciJawaban = $this->request->getPost('kunci_jawaban_' . $i);

            $dataSoal[] = [
                'soal_ujian' => $soal,
                'jawaban_a' => $jawabanA,
                'jawaban_b' => $jawabanB,
                'jawaban_c' => $jawabanC,
                'jawaban_d' => $jawabanD,
                'kunci_jawaban' => $kunciJawaban
            ];
        }

        // Ambil data soal latihan yang sudah ada dari database
        $soalUjian = $this->soalUjianModel->find($id);

        // Periksa apakah data soal latihan ditemukan
        if ($soalUjian === null) {
            // Redirect kembali dengan pesan error jika data tidak ditemukan
            return redirect()->back()->with('error', 'Data soal ujian tidak ditemukan.');
        }

        // Periksa apakah ada perubahan dalam data soal latihan
        if ($idMateri === $soalUjian['id_materi'] && $namaUjian === $soalUjian['nama_ujian']
            && json_encode($dataSoal) === $soalUjian['soal_ujian']) {
            // Redirect kembali dengan pesan peringatan jika tidak ada perubahan
            return redirect()->back()->with('warning', 'Tidak ada perubahan yang dilakukan.');
    }

        // Update data soal latihan di database
    $updatedData = [
        'id_materi' => $idMateri,
        'nama_ujian' => $namaUjian,
        'soal_ujian' => json_encode($dataSoal),
    ];

    $this->soalUjianModel->update($id, $updatedData);

        // Redirect kembali ke halaman 'soal_latihan' dengan pesan sukses
    return redirect()->to('guru/ujian')->with('success', 'Data soal ujian berhasil diperbarui.');
}
}