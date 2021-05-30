<?php

namespace App\Controllers;
use App\Models\ModelDosen;
class Dosen extends BaseController

{
 public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title'    => 'Dosen',
            'dosen' => $this->ModelDosen->allData(),
            'isi'      => 'admin/dosen/index'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'    => 'Dosen',
            'dosen' => $this->ModelDosen->allData(),
            'isi'      => 'admin/dosen/add'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'jenkel' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
			'password' => [
                'label' => 'Passoword',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'no_hp' => [
                'label' => 'No. Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'pendidikan' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
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
                'nidn' => $this->request->getPost('nidn'),
                'kode_dosen' => $this->request->getPost('kode_dosen'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'jenkel' => $this->request->getPost('jenkel'),
                'password' => $this->request->getPost('password'),
                'email' => $this->request->getPost('email'),
                'no_hp' => $this->request->getPost('no_hp'),
                'pendidikan' => $this->request->getPost('pendidikan'),
                'foto' => $nama_file,
            );
            //memindahkan file foto dari form input ke folder foto di directory
            $foto->move('img-dosen', $nama_file);
            $this->ModelDosen->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
            return redirect()->to(base_url('dosen'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/add'));
        }
    }

    public function edit($id_dosen)
    {
        $data = [
            'title'    => 'Dosen',
            'dosen' => $this->ModelDosen->detailData($id_dosen),
            'isi'      => 'admin/dosen/edit'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function update($id_dosen)
    {
        if ($this->validate([
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!',
                ]
            ],
            'jenkel' => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
			'password' => [
                'label' => 'Passoword',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'email' => [
                'label' => 'Email',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'no_hp' => [
                'label' => 'No. Hp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
                ]
            ],
            'pendidikan' => [
                'label' => 'Pendidikan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi!'
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
            if($foto->getError() == 4){
                //jika foto tdk d ganti
                $data = array(
                    'id_dosen' => $id_dosen,
                    'nidn' => $this->request->getPost('nidn'),
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'jenkel' => $this->request->getPost('jenkel'),
                    'password' => $this->request->getPost('password'),
                    'email' => $this->request->getPost('email'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                );
                $this->ModelDosen->edit($data);
            }else{
                //delete foto lama
                $dosen = $this->ModelDosen->detailData($id_dosen);
                if ($dosen['foto'] != "") {
                    unlink('img-dosen/'. $dosen['foto']);
                }
                //merename nama file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_dosen' => $id_dosen,
                    'nidn' => $this->request->getPost('nidn'),
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'jenkel' => $this->request->getPost('jenkel'),
                    'password' => $this->request->getPost('password'),
                    'email' => $this->request->getPost('email'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'foto' => $nama_file,
                );
                //memindahkan file foto dari form input ke folder foto di directory
                $foto->move('img-dosen', $nama_file);
                $this->ModelDosen->edit($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
            return redirect()->to(base_url('dosen'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit' . $id_dosen));
        }
    }
	
    public function delete($id_dosen)
    {
        //menghapus foto lama
        $dosen = $this->ModelDosen->detailData($id_dosen);
        if ($dosen['foto'] != "") {
            unlink('img-dosen/' . $dosen['foto']);
        }
        $data = [
            'id_dosen' => $id_dosen,
        ];
        $this->ModelDosen->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
        return redirect()->to(base_url('dosen'));
    }
}