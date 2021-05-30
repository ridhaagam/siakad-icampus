<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->ModelKelas = new ModelKelas();
		$this->ModelDosen = new ModelDosen();
		$this->ModelProdi = new ModelProdi();
	}

	public function index()
	{
		$data= [
			'title' => 'Kelas', 
			'kelas' => $this->ModelKelas->allData(),
			'dosen' => $this->ModelDosen->allData(),
			'prodi' => $this->ModelProdi->allData(),
			'isi' 	=> 'admin/kelas/kelas'
		];

		return view('layout_dashboard/wrapper', $data);
	}

    public function rincian_kelas($id_kelas)
    {
        $data= [
			'title' => 'Kelas ', 
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'mhs'   => $this->ModelKelas->mahasiswa($id_kelas),
            'jml'   => $this->ModelKelas->jumlah($id_kelas),
            'non'   => $this->ModelKelas->nonkelas(),
			'isi' 	=> 'admin/kelas/rincian_kelas'
            
		];

		return view('layout_dashboard/wrapper', $data);
    }

    public function add_anggota_kelas($id_mhs, $id_kelas)
    {
        $data= [
			'id_mhs' => $id_mhs,  
            'id_kelas' => $id_kelas
		];
        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan', 'Mahasiswa berhasil ditambah ke Kelas!');
        return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
    }

    public function remove_anggota_kelas($id_mhs, $id_kelas)
    {
        $data= [
			'id_mhs' => $id_mhs,  
            'id_kelas' => null
		];
        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan', 'Mahasiswa berhasil dihapus dari kelas!');
        return redirect()->to(base_url('kelas/rincian_kelas/'. $id_kelas));
    }


	public function add()
    {
        if ($this->validate([
            'kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'id_prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'id_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'angkatan' => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //jika valid
            $data = [
                'kelas' => $this->request->getPost('kelas'),
                'id_prodi' => $this->request->getPost('id_prodi'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'angkatan' => $this->request->getPost('angkatan'),
            ];
            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
            return redirect()->to(base_url('kelas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

	public function delete($id_kelas)
	{
		$data = [
			'id_kelas' => $id_kelas,
		];
		$this->ModelKelas->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
		return redirect()->to(base_url('kelas'));
	}

} 
