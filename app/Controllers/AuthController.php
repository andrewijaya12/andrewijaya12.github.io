<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $users;
    function __construct()
    {
        $this->users = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Login SIMPEG'
        ];
        return view('auth/login', $data);
    }
    public function regis()
    {
        $data = [
            'title' => 'Register SIMPEG',
            'valid' => \Config\Services::validation()
        ];
        return view('auth/registrasi', $data);
    }
    public function forgot()
    {
        $data = [
            'title' => 'Reset Password SIMPEG',
            'valid' => \Config\Services::validation()
        ];
        return view('auth/forgot-password', $data);
    }

    public function regis_proses(){
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[user.email]',
                'errors' => [
                    'required' => 'Field harus diisi',
                    'is_unique' => 'Email telah digunakan',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Field harus diisi',
                    'is_unique' => 'Username telah digunakan'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/regis'))->withInput();
        }
        $this->users->insert([
            'email' => $this->request->getPost('email'),
            'nama_user' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('jabatan'),
        ]);
        session()->setFlashdata('success', 'Registrasi Berhasil, silahkan login');
        return redirect()->to(base_url('/'));
    }

    public function login_proses(){
        $email = $this->request->getPost('email');
        $password = sha1($this->request->getPost('password'));
        $cek = $this->users->where(['email' => $email, 'password' => $password])->first();
        if ($cek == null) {
            session()->setFlashdata('gagal', 'Email atau Password salah');
            return redirect()->to(base_url('/'));
        }else{
            if($cek['level'] == 1){
                session()->set([
                    'email' => $email,
                    'nama_user' => $cek['nama_user'],
                    'level' => 1,
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('/info'));
            }else if($cek['level'] == 2){
                session()->set([
                    'email' => $email,
                    'nama_user' => $cek['nama_user'],
                    'level' => 2,
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('/dashboard'));
            }else{
                session()->set([
                    'email' => $email,
                    'nama_user' => $cek['nama_user'],
                    'level' => 3,
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('/info'));
            }
        }
    }

    public function forgot_proses(){
        if (!$this->validate([
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',
                ]
            ],            
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Field harus diisi',
                ]
            ],            
            'passwordconf' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Field harus diisi',
                    'matches' => 'Password konfirmasi tidak sesuai'
                ]
            ],            
        ])) {
            return redirect()->to(base_url('/forgot-password'))->withInput();
        }
        $email = $this->request->getPost('email');
        $cek = $this->users->where(['email' => $email])->first();
        if($cek == null){
            session()->setFlashdata('gagal', 'Email tidak tersedia');
            return redirect()->to(base_url('/forgot-password'));            
        }else{
            $id = $cek['id_user'];
            $this->users->update($id,[
                'password' => sha1($this->request->getPost('password'))
            ]);
            session()->setFlashdata('success', 'Password berhasil diperbaharui');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
