<?php

namespace App\Controllers;

use App\Models\ModelUser;

class user extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->ModelUser->allData(),
            'isi'     => 'admin/user'
        ];

        return view('layout_dashboard/wrapper', $data);
    }

    public function add()
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                    'is_unique' => 'Username sudah pernah di inputkan!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]|max_length[12]|integer|matches[confirm_password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password tidak cocok.',
                    'min_length' => 'Password terlalu pendek, minimal 6 digit.',
                    'max_length' => 'Password terlalu panjang, maksimal 12 digit.',
                    'integer' => 'Password harus angka.'
                ]
            ],
            'confirm_password' => [
                'label' => 'Password',
                'rules' => 'required|trim|matches[password]',
                'errors' => [
                    'required' => ' Ulangi Password tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'uploaded' => '{field} Wajib diisi!',
                    'max_size' => '{field} Max 1024 KB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            //merename nama file foto
            $nama_file = $foto->getRandomName();
            //jika valid
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nama_file,
            );
            //memindahkan file foto dari form input ke folder foto di directory
            $foto->move('img-user', $nama_file);
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user)
    {
        if ($this->validate([
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'trim|min_length[6]|max_length[12]|integer|required|matches[confirm_password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password tidak cocok.',
                    'min_length' => 'Password terlalu pendek, minimal 6 digit.',
                    'max_length' => 'Password terlalu panjang, maksimal 12 digit.',
                    'integer' => 'Password harus angka.'
                ]
            ],
            'confirm_password' => [
                'label' => 'Password',
                'rules' => 'trim|required|matches[password]',
                'errors' => [
                    'required' => ' Ulangi Password tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                );
                $this->ModelUser->edit($data);
            } else {
                //delete foto lama
                $user = $this->ModelUser->detail_data($id_user);
                if ($user['foto'] != "") {
                    unlink('img-user/' . $user['foto']);
                }
                //merename nama file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nama_file,
                );
                //memindahkan file foto dari form input ke folder foto di directory
                $foto->move('img-user', $nama_file);
                $this->ModelUser->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function update_password($id_user)
    {
        if ($this->validate([])) {

            $data = array(
                'id_user' => $id_user,
                'password' => $this->request->getPost('password'),
            );
            $this->ModelUser->detail_data($data);

            //jika valid
            $data = array(
                'id_user' => $id_user,
                'password' => $this->request->getPost('password'),
            );

            $this->ModelUser->detail_data($data);

            session()->setFlashdata('pesan', 'Password Berhasil di ubah!');
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->ModelUser->detail_data($id_user);
        if ($user['foto'] != "") {
            unlink('img-user/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
        return redirect()->to(base_url('user'));
    }
}
