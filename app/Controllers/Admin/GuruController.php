<?php

namespace App\Controllers\Admin;

use App\Models\GuruModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class GuruController extends BaseController
{
    protected $guruModel;

    public function __construct()
    {
        $this->guruModel = new GuruModel();
    }

    public function index()
    {
        $model = new GuruModel();
        $dataGuru = $model->findAll();
        $data = [
            'title' => 'Data Guru',
            'dataGuru' => $dataGuru
        ];
        $data['activePage'] = 'guru';
        return view('admin/data_guru/index', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Form Tambah Guru';
        $data['activePage'] = 'tambah_guru';
        return view('admin/data_guru/tambah', $data);
    }

    public function prosesTambah()
    {
        $model = new GuruModel();
        $userModel = new UserModel();

        $validationRules = [
            'nama' => 'required',
            'nip' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
        ];

        // Simpan data guru
        $model->insert($data);

        // Buat data login guru
        $username = str_replace(' ', '_', $this->request->getPost('nama')); 
        $password = $this->request->getPost('nip'); 
        $password = password_hash($password, PASSWORD_DEFAULT); 

        $userData = [
            'username' => $username,
            'password' => $password,
            'role' => 'guru',
        ];

        $userModel->insert($userData);

        $id_user = $userModel->getInsertID();

        $model->where('nip', $this->request->getPost('nip'))->set(['id_user' => $id_user])->update();

        return redirect()->to('admin/guru')->with('success', 'Data Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new GuruModel();
        $data['guru'] = $model->find($id);

        $data['title'] = 'Edit Guru';
        $data['activePage'] = 'edit_guru';
        return view('admin/data_guru/edit', $data);
    }


    public function update($id)
    {
        $model = new GuruModel();
        $userModel = new UserModel();

    // Ambil data guru sebelumnya
        $existingData = $model->find($id);

    // Validasi perubahan data
        if (!$existingData || !$this->isDataChanged($this->request->getPost(), $existingData)) {
            return redirect()->to('admin/guru')->withInput()->with('NoEdit', 'Tidak ada perubahan data guru.');
        }

        $validationRules = [
            'nama' => 'required',
            'nip' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'nip' => $this->request->getPost('nip'),
        ];

        $model->update($id, $data);

    // Ambil ID pengguna (user) yang terkait dengan guru saat ini
        $id_user = $existingData['id_user'];

    // Perbarui data login guru
        if ($id_user) {
        $username = str_replace(' ', '', $this->request->getPost('nama')) . '123'; // Nama tanpa spasi dengan 123 di akhir
        $password = $this->request->getPost('nip'); // Password pake nip guru
        $password = password_hash($password, PASSWORD_DEFAULT); // Hash password

        $userData = [
            'username' => $username,
            'password' => $password,
        ];

        // Simpan data user
        $userModel->update($id_user, $userData);
    }

    return redirect()->to('admin/guru')->with('success', 'Data guru berhasil diupdate.');
}

    // Fungsi untuk memeriksa perubahan data
private function isDataChanged($newData, $existingData)
{
        // Bandingkan nilai-nilai dari data baru dengan data yang ada sebelumnya
    return $newData['nama'] !== $existingData['nama'] ||
    $newData['nip'] !== $existingData['nip'];
}

public function delete($id)
{
    $guruModel = new GuruModel();
    $guru = $guruModel->find($id);

    if ($guru) {
        // Ambil id_user dari data guru
        $id_user = $guru['id_user'];

        // Hapus data guru berdasarkan ID
        $guruModel->delete($id);

        // Jika id_user tidak kosong, hapus juga data pengguna (user)
        if (!empty($id_user)) {
            $userModel = new UserModel();
            $userModel->delete($id_user);
        }

        // Tampilkan pesan sukses
        session()->setFlashdata('success', 'Data Guru berhasil dihapus.');
    }
    return redirect()->back();
}
}
