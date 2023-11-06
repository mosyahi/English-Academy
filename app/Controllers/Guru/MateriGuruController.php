<?php

namespace App\Controllers\Guru;

use App\Models\MateriModel;
use App\Controllers\BaseController;

class MateriGuruController extends BaseController
{
    public function index()
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();
        $data = [
            'title' => 'Data Materi',
            'materi' => $dataMateri
        ];
        $data['activePageGuru'] = 'materi';
        return view('guru/data_materi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Materi',
        ];
        $data['activePageGuru'] = 'tambah_materi';
        return view('guru/data_materi/tambah', $data);
    }

    public function store()
    {
        $model = new MateriModel();

        $fileMateri = $this->request->getFile('file_materi');
        $videoMateri = $this->request->getFile('video_materi');
        $audioMateri = $this->request->getFile('audio_materi');

    // Pindahkan file ke direktori yang diinginkan jika ada
        $allowedFileTypes = [
            'application/pdf',
            'image/jpeg',
            'image/png'
        ];

        if ($fileMateri && $fileMateri->isValid() && !in_array($fileMateri->getClientMimeType(), $allowedFileTypes)) {
            return redirect()->to('guru/materi')->withInput()->with('gagal', 'File Materi harus berupa PDF, JPG, atau PNG');
        }

        $data = [
            'nama_materi' => $this->request->getPost('nama_materi'),
            'deskripsi_materi' => $this->request->getPost('deskripsi_materi'),
            'file_materi' => null,
            'video_materi' => null,
            'audio_materi' => null
        ];

    // Validasi minimal salah satu file diisi
        if (!$fileMateri && (!$videoMateri || !$videoMateri->isValid()) && (!$audioMateri || !$audioMateri->isValid())) {
            return redirect()->to('guru/materi')->withInput()->with('gagal', 'Minimal salah satu dari file materi, video, atau audio harus diisi.');
        }

    // Pindahkan file materi ke direktori yang diinginkan jika ada
        if ($fileMateri && $fileMateri->isValid()) {
            $newFileName = $fileMateri->getRandomName();
            $fileMateri->move(ROOTPATH . 'public/uploads/file_materi', $newFileName);
            $data['file_materi'] = $newFileName;
        }

    // Pindahkan file video ke direktori yang diinginkan jika ada
        if ($videoMateri && $videoMateri->isValid()) {
        // Validasi tipe file video_materi
            $allowedVideoTypes = ['video/mp4', 'video/quicktime'];
            if (!in_array($videoMateri->getClientMimeType(), $allowedVideoTypes)) {
                return redirect()->to('guru/materi')->withInput()->with('gagal', 'File Video harus berupa MP4 atau MOV.');
            }

            $videoMateri->move(ROOTPATH . 'public/uploads/video_materi');
            $data['video_materi'] = $videoMateri->getName();
        }

    // Pindahkan file audio ke direktori yang diinginkan jika ada
        if ($audioMateri && $audioMateri->isValid()) {
        // Validasi tipe file audio_materi
            $allowedAudioTypes = ['audio/mpeg', 'audio/wav'];
            if (!in_array($audioMateri->getClientMimeType(), $allowedAudioTypes)) {
                return redirect()->back()->withInput()->with('gagal', 'File Audio harus berupa MP3 atau WAV.');
            }

            $audioMateri->move(ROOTPATH . 'public/uploads/audio_materi');
            $data['audio_materi'] = $audioMateri->getName();
        }

        $model->insert($data);

        return redirect()->to('guru/materi')->with('success', 'Data Materi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new MateriModel();
        $materi = $model->find($id);

        $data = [
            'title' => 'Form Edit Materi',
            'materi' => $materi,
        ];
        $data['activePageGuru'] = 'edit_materi';
        return view('guru/data_materi/edit', $data);
    }


    public function update($id)
    {
        $model = new MateriModel();

        $fileMateri = $this->request->getFile('file_materi');
        $videoMateri = $this->request->getFile('video_materi');
        $audioMateri = $this->request->getFile('audio_materi');

        // Pindahkan file ke direktori yang diinginkan jika ada
        $fileMateriName = null;
        if ($fileMateri && $fileMateri->isValid()) {
            // Validasi tipe file file_materi
            $allowedFileTypes = [
                'application/pdf',
                'image/jpeg',
                'image/png',
            ];
            if (!in_array($fileMateri->getClientMimeType(), $allowedFileTypes)) {
                return redirect()->to('guru/materi')->withInput()->with('gagal', 'File Materi harus berupa PDF, JPG dan PNG');
            }

            $fileMateri->move(ROOTPATH . 'public/uploads/file_materi');
            $fileMateriName = $fileMateri->getName();

            // Hapus file lama jika ada
            $materi = $model->find($id);
            $oldFileMateri = ROOTPATH . 'public/uploads/file_materi/' . $materi['file_materi'];
            if ($materi['file_materi'] && file_exists($oldFileMateri)) {
                unlink($oldFileMateri);
            }
        } else {
            // Jika tidak ada perubahan pada file, tetap gunakan file lama
            $materi = $model->find($id);
            $fileMateriName = $materi['file_materi'];
        }

        $data = [
            'nama_materi' => $this->request->getPost('nama_materi'),
            'deskripsi_materi' => $this->request->getPost('deskripsi_materi'),
            'file_materi' => $fileMateriName,
            'video_materi' => null,
            'audio_materi' => null
        ];

        // Validasi minimal salah satu file diisi
        if (!$fileMateriName && (!$videoMateri || !$videoMateri->isValid()) && (!$audioMateri || !$audioMateri->isValid())) {
            return redirect()->to('guru/materi')->withInput()->with('gagal', 'Minimal salah satu dari file materi, video, atau audio harus diisi.');
        }

        // Pindahkan file video ke direktori yang diinginkan jika ada
        $videoMateriName = null;
        if ($videoMateri && $videoMateri->isValid()) {
            // Validasi tipe file video_materi
            $allowedVideoTypes = ['video/mp4', 'video/quicktime'];
            if (!in_array($videoMateri->getClientMimeType(), $allowedVideoTypes)) {
                return redirect()->to('guru/materi')->withInput()->with('gagal', 'File Video harus berupa MP4 atau MOV.');
            }

            $videoMateri->move(ROOTPATH . 'public/uploads/video_materi');
            $videoMateriName = $videoMateri->getName();

            // Hapus file lama jika ada
            $materi = $model->find($id);
            $oldVideoMateri = ROOTPATH . 'public/uploads/video_materi/' . $materi['video_materi'];
            if ($materi['video_materi'] && file_exists($oldVideoMateri)) {
                unlink($oldVideoMateri);
            }
        } else {
            // Jika tidak ada perubahan pada file, tetap gunakan file lama
            $materi = $model->find($id);
            $videoMateriName = $materi['video_materi'];
        }

        // Pindahkan file audio ke direktori yang diinginkan jika ada
        $audioMateriName = null;
        if ($audioMateri && $audioMateri->isValid()) {
            // Validasi tipe file audio_materi
            $allowedAudioTypes = ['audio/mpeg', 'audio/wav'];
            if (!in_array($audioMateri->getClientMimeType(), $allowedAudioTypes)) {
                return redirect()->back()->withInput()->with('gagal', 'File Audio harus berupa MP3 atau WAV.');
            }

            $audioMateri->move(ROOTPATH . 'public/uploads/audio_materi');
            $audioMateriName = $audioMateri->getName();

            // Hapus file lama jika ada
            $materi = $model->find($id);
            $oldAudioMateri = ROOTPATH . 'public/uploads/audio_materi/' . $materi['audio_materi'];
            if ($materi['audio_materi'] && file_exists($oldAudioMateri)) {
                unlink($oldAudioMateri);
            }
        } else {
            // Jika tidak ada perubahan pada file, tetap gunakan file lama
            $materi = $model->find($id);
            $audioMateriName = $materi['audio_materi'];
        }

        $data['video_materi'] = $videoMateriName;
        $data['audio_materi'] = $audioMateriName;

        $model->update($id, $data);

        return redirect()->to('guru/materi')->with('success', 'Data Materi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new MateriModel();

        // Dapatkan data materi dari database berdasarkan ID
        $materi = $model->find($id);

        if (!$materi) {
            return redirect()->to('guru/materi')->with('gagal', 'Data Materi tidak ditemukan.');
        }

        // Hapus file-file terkait jika ada
        if ($materi['file_materi']) {
            $fileMateriPath = ROOTPATH . 'public/uploads/file_materi/' . $materi['file_materi'];
            if (file_exists($fileMateriPath)) {
                unlink($fileMateriPath);
            }
        }

        if ($materi['video_materi']) {
            $videoMateriPath = ROOTPATH . 'public/uploads/video_materi/' . $materi['video_materi'];
            if (file_exists($videoMateriPath)) {
                unlink($videoMateriPath);
            }
        }

        if ($materi['audio_materi']) {
            $audioMateriPath = ROOTPATH . 'public/uploads/audio_materi/' . $materi['audio_materi'];
            if (file_exists($audioMateriPath)) {
                unlink($audioMateriPath);
            }
        }

        // Hapus data materi dari database
        $model->delete($id);

        return redirect()->to('guru/materi')->with('success', 'Data Materi berhasil dihapus.');
    }

    public function downloadFile($idMateri, $jenisFile)
    {
        // Dapatkan data materi dari database berdasarkan $idMateri
        $model = new MateriModel();
        $materi = $model->find($idMateri);

        if ($materi) {
            // Tentukan direktori tempat file disimpan sesuai dengan $jenisFile
            $direktori = '';
            if ($jenisFile === 'file_materi') {
                $direktori = 'public/uploads/file_materi/';
            } elseif ($jenisFile === 'video_materi') {
                $direktori = 'public/uploads/video_materi/';
            } elseif ($jenisFile === 'audio_materi') {
                $direktori = 'public/uploads/audio_materi/';
            }

            // Dapatkan nama file dari data materi
            $namaFile = $materi[$jenisFile];

            // Lakukan proses unduh file
            $file = ROOTPATH . $direktori . $namaFile;
            if (file_exists($file)) {
                return $this->response->download($file, null);
            }
        }
    }

    public function viewFile($filename)
    {
        $path = FCPATH . 'uploads/file_materi/' . $filename;
        $fileContent = file_get_contents($path);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // Tentukan tipe konten berdasarkan ekstensi file
        $contentType = mime_content_type($path);

    // Set header Content-Type sesuai dengan tipe konten
        header('Content-Type: ' . $contentType);

    // Cek tipe konten untuk menentukan apakah itu video, audio, atau file lainnya
        if (strpos($contentType, 'video') === 0) {
        // Jika itu video, tampilkan preview menggunakan tag <video>
            return view('guru/data_materi/video_view', ['videoPath' => $path]);
        } elseif (strpos($contentType, 'audio') === 0) {
        // Jika itu audio, tampilkan preview menggunakan tag <audio>
            return view('guru/data_materi/audio_view', ['audioPath' => $path]);
        } else {
        // Jika itu bukan video atau audio, tampilkan view dengan data file
            return view('guru/data_materi/materi_view', ['fileContent' => $fileContent, 'filename' => $filename]);
        }
    }

    public function viewVideo($filename)
    {
        $videoPath = base_url('uploads/video_materi/' . $filename);
        $data['title'] = 'Video Materi';
        $data['videoPath'] = $videoPath;
        $data['activePageGuru'] = 'materi';
        return view('guru/data_materi/video_view', $data);
    }

    public function viewAudio($filename)
    {
        $audioPath = base_url('uploads/audio_materi/' . $filename);
        $data['title'] = 'Audio Materi';
        $data['audioPath'] = $audioPath;
        $data['activePageGuru'] = 'materi';
        return view('guru/data_materi/audio_view', $data);
    }
}
