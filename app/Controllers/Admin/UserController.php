<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $dataUser = $model->findAll();
        $data = [
            'title' => 'Data User',
            'dataUser' => $dataUser
        ];
        $data['activePage'] = 'users';
        return view('admin/data_users/index', $data);
    }

    public function tambah()
    {
        $model = new UserModel();
        $dataUser = $model->findAll();
        $data = [
            'title' => 'Form Tambah User',
            'dataUser' => $dataUser
        ];
        $data['activePage'] = 'tambah_users';
        return view('admin/data_users/tambah', $data);
    }

    public function addUsers()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Buat instance model
        $userModel = new UserModel();

        // Siapkan data untuk disimpan
        $userData = [
            'username' => $username,
            'password' => $hashedPassword,
            'role' => $role
        ];

        // Simpan data user
        $userModel->insert($userData);
        session()->setFlashdata('success', 'Pengguna berhasil ditambahkan.');
        return redirect()->to('admin/users');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            $data['user'] = $user;
            $data['title'] = 'Edit User';
            $data['activePage'] = 'edit_users';
            return view('admin/data_users/edit', $data);
        } else {
            return redirect()->to('admin/users');
        }
    }

    public function update($id)
    {
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');

        // Buat instance model
        $userModel = new UserModel();

        // Siapkan data untuk disimpan
        $userData = [
            'username' => $username,
            'role' => $role
        ];

        // Simpan data user
        $userModel->update($id, $userData);
        session()->setFlashdata('success', 'Pengguna berhasil diperbaharui.');
        return redirect()->to('admin/users');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user) {
            // Hapus data pengguna berdasarkan ID
            $userModel->delete($id);

            // Tampilkan pesan sukses
            session()->setFlashdata('success', 'Pengguna berhasil dihapus.');
        }

        return redirect()->back();
    }
}
