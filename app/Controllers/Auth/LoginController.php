<?php

namespace App\Controllers\Auth;

use App\Models\UserModel;
use App\Models\SiswaModel;
use App\Models\GuruModel;
use App\Controllers\BaseController;
use CodeIgniter\Session\Session;

class LoginController extends BaseController
{
    public function index()
    {
        return view('template/login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $session = \Config\Services::session();
            $session->set('auth', true);
            $session->set('username', $username);
            $session->set('role', $user['role']);

            if ($user['role'] === 'admin') {
                return redirect()->to('admin/dashboard');

            } elseif ($user['role'] === 'guru') {
                $guruModel = new GuruModel();
                $guru = $guruModel->where('id_user', $user['id'])->first();
                
                if ($guru) {
                    $session->set('id_guru', $guru['id_guru']);
                }
                return redirect()->to('guru/dashboard');

            } elseif ($user['role'] === 'siswa') {
                $siswaModel = new SiswaModel();
                $siswa = $siswaModel->where('id_user', $user['id'])->first();

                if ($siswa) {
                    $session->set('id_siswa', $siswa['id_siswa']);
                }

                return redirect()->to('siswa/dashboard');
            }
        }

        $data['error'] = 'Username atau Password Anda Salah';
        return view('template/login', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        // Perform dashboard actions
        return view('admin/index');
    }
}
