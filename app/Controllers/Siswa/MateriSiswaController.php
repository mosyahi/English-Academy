<?php

namespace App\Controllers\siswa;

use App\Models\MateriModel;
use App\Controllers\BaseController;

class MateriSiswaController extends BaseController
{
    public function index()
    {
        $model = new MateriModel();
        $dataMateri = $model->findAll();
        $data = [
            'title' => 'Data Materi',
            'materi' => $dataMateri
        ];
        $data['activePageSiswa'] = 'materi';
        return view('siswa/data_materi/index', $data);
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
            return view('siswa/data_materi/video_view', ['videoPath' => $path]);
        } elseif (strpos($contentType, 'audio') === 0) {
        // Jika itu audio, tampilkan preview menggunakan tag <audio>
            return view('siswa/data_materi/audio_view', ['audioPath' => $path]);
        } else {
        // Jika itu bukan video atau audio, tampilkan view dengan data file
            return view('siswa/data_materi/materi_view', ['fileContent' => $fileContent, 'filename' => $filename]);
        }
    }

    public function viewVideo($filename)
    {
        $videoPath = base_url('uploads/video_materi/' . $filename);
        $data['title'] = 'Video Materi';
        $data['videoPath'] = $videoPath;
        $data['activePageSiswa'] = 'materi';
        return view('siswa/data_materi/video_view', $data);
    }

    public function viewAudio($filename)
    {
        $audioPath = base_url('uploads/audio_materi/' . $filename);
        $data['title'] = 'Audio Materi';
        $data['audioPath'] = $audioPath;
        $data['activePageSiswa'] = 'materi';
        return view('siswa/data_materi/audio_view', $data);
    }
}






