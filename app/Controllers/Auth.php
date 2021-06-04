<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Log in',
            'isi'   => 'login',
            'validation' =>  \Config\Services::validation(),
        ];

        return view('layout/wrapper', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->ModelAuth->login_admin($username, $password);
            $cek2 = $this->ModelAuth->login_dosen($username, $password);
            $cek3 = $this->ModelAuth->login_mahasiswa($username, $password);

            if ($cek) {
                //jika data cocok
                session()->set('log', 1);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['password']);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('foto', $cek['foto']);
                //login
                return redirect()->to(base_url('admin'));
            
            } elseif($cek2) {
                
                session()->set('log', 2);
                session()->set('username', $cek2['nidn']);
                session()->set('nama_dosen', $cek2['nama_dosen']);
                session()->set('foto', $cek2['foto']);
                //login
                return redirect()->to(base_url('dsn'));

            } elseif($cek3) {

                session()->set('log', 3);
                session()->set('username', $cek3['nim']);
                session()->set('nama_mahasiswa', $cek3['nama_mahasiswa']);
                session()->set('foto', $cek3['foto']);
                //login
                return redirect()->to(base_url('mhs'));

            } else {
                //jika data tidak cocok
                session()->setFlashdata('pesan', 'Login Gagal!, Username Atau Password Salah !!');
                return redirect()->to(base_url('auth'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('auth'));
        }
    }


    public function logout(){
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('foto');

        session()->setFlashdata('sukses', 'Anda Berhasil Log out!');
        return redirect()->to(base_url('auth'));
    }
}
