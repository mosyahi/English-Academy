<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;
use App\Controllers\BaseController;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function register()
    {
        // Ambil data yang dikirim melalui form registrasi
        $fullName = $this->request->getPost('full_name');
        $password = $this->request->getPost('password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validasi data
        $validationRules = [
            'full_name' => 'required',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan error
            return redirect()->route('register')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data pengguna ke database
        $userModel = new UserModel();
        $userData = [
            'full_name' => $fullName,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ];
        $userModel->insert($userData);

        // Redirect ke halaman login atau halaman lainnya
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
