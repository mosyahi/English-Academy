<?php

namespace App\Controllers\Admin;

use App\Models\SiswaModel;
use App\Controllers\BaseController;
use App\Models\UserModel;

class SiswaController extends BaseController
{
    protected $siswaModel;

    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
    }

    public function index()
    {
        $model = new SiswaModel();
        $dataSiswa = $model->findAll();
        $data = [
            'title' => 'Data Siswa',
            'dataSiswa' => $dataSiswa
        ];
        $data['activePage'] = 'siswa';
        return view('admin/data_siswa/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah Siswa';
        $data['activePage'] = 'tambah_siswa';
        return view('admin/data_siswa/tambah', $data);
    }

    public function prosesTambah()
    {
        $model = new SiswaModel();
        $userModel = new UserModel();

        $validationRules = [
            'nama' => 'required',
            'nis' => 'required',
            'jk' => 'required|in_list[L,P]',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nis' => $this->request->getPost('nis'),
            'jk' => $this->request->getPost('jk'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        // Simpan data siswa
        $model->insert($data);

        // Buat data login siswa
        $username = str_replace(' ', '_', $this->request->getPost('nama'));
        $password = $this->request->getPost('nis');
        $password = password_hash($password, PASSWORD_DEFAULT);

        $userData = [
            'username' => $username,
            'password' => $password,
            'role' => 'siswa',
        ];

        // Simpan data user
        $userModel->insert($userData);

        // Ambil ID pengguna (user) yang baru saja dibuat
        $id_user = $userModel->getInsertID();

        // Update kolom id_user pada tabel siswa dengan ID pengguna (user) yang baru
        $model->where('nis', $this->request->getPost('nis'))->set(['id_user' => $id_user])->update();

        return redirect()->to('admin/siswa')->with('success', 'Data Siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new SiswaModel();
        $data['siswa'] = $model->find($id);

        $data['title'] = 'Edit Siswa';
        $data['activePage'] = 'edit_siswa';
        return view('admin/data_siswa/edit', $data);
    }


    public function update($id)
    {
        $model = new SiswaModel();
        $userModel = new UserModel();

    // Ambil data siswa sebelumnya
        $existingData = $model->find($id);

    // Validasi perubahan data
        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/siswa')->withInput()->with('NoEdit', 'Tidak ada perubahan data siswa.');
        }

        $validationRules = [
            'nama' => 'required',
            'nis' => 'required',
            'jk' => 'required|in_list[L,P]',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nis' => $this->request->getPost('nis'),
            'jk' => $this->request->getPost('jk'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $model->update($id, $data);

    // Ambil ID pengguna (user) yang terkait dengan siswa saat ini
        $id_user = $existingData['id_user'];

    // Perbarui data login siswa
        if ($id_user) {
        $username = str_replace(' ', '', $this->request->getPost('nama')) . '123'; // Nama tanpa spasi dengan 123 di akhir
        $password = $this->request->getPost('nis'); // Password menggunakan nis siswa
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash password

        $userData = [
            'username' => $username,
            'password' => $password,
        ];

        // Simpan data user
        $userModel->update($id_user, $userData);
    }

    return redirect()->to('admin/siswa')->with('success', 'Data siswa berhasil diupdate.');
}



    // Fungsi untuk memeriksa perubahan data
private function isDataChanged($newData, $existingData)
{
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
    return $newData['nama'] !== $existingData['nama'] ||
    $newData['nis'] !== $existingData['nis'] ||
    $newData['jk'] !== $existingData['jk'] ||
    $newData['tgl_lahir'] !== $existingData['tgl_lahir'] ||
    $newData['alamat'] !== $existingData['alamat'];
}

public function delete($id)
{
    $siswaModel = new SiswaModel();
    $siswa = $siswaModel->find($id);

    if ($siswa) {
        // Ambil id_user dari data siswa
        $id_user = $siswa['id_user'];

        // Hapus data siswa berdasarkan ID
        $siswaModel->delete($id);

        // Jika id_user tidak kosong, hapus juga data pengguna (user)
        if (!empty($id_user)) {
            $userModel = new UserModel();
            $userModel->delete($id_user);
        }

        // Tampilkan pesan sukses
        session()->setFlashdata('success', 'Data Siswa berhasil dihapus.');
    }

    return redirect()->back();
}

}
