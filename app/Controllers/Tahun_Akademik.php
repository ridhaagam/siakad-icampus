<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;

class Tahun_Akademik extends BaseController
{

	public function __construct()
    {
        helper('form');
        $this->ModelTahunAkademik = new ModelTahunAkademik();
    }

	public function index()
	{
		$data= [
			'title' => 'Tahun Akademik', 
			'ta' => $this->ModelTahunAkademik->allData(),
			'isi' 	=> 'admin/tahun_akademik'
		];

		return view('layout_dashboard/wrapper', $data);
	}

	public function add()
    {
        $data = [
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTahunAkademik->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
        return redirect()->to(base_url('tahun_akademik'));
    }

    public function edit($id_tahun_akademik)
    {
        $data = [
            'id_tahun_akademik' => $id_tahun_akademik,
            'ta' => $this->request->getPost('ta'),
            'semester' => $this->request->getPost('semester'),
        ];
        $this->ModelTahunAkademik->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
        return redirect()->to(base_url('tahun_akademik'));
    }

    public function delete($id_tahun_akademik)
    {
        $data = [
            'id_tahun_akademik' => $id_tahun_akademik,
        ];
        $this->ModelTahunAkademik->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
        return redirect()->to(base_url('tahun_akademik'));
    }

    public function setting()
	{
		$data= [
			'title' => 'Setting Tahun Akademik', 
			'ta' => $this->ModelTahunAkademik->allData(),
			'isi' 	=> 'admin/set_ta'
		];

		return view('layout_dashboard/wrapper', $data);
	}
    public function set($id_tahun_akademik)
    {
        $this->ModelTahunAkademik->reset_status_ta();
         $data = [
             'id_tahun_akademik' => $id_tahun_akademik,
             'status' =>1
         ];
         $this->ModelTahunAkademik->edit($data);
         session()->setFlashdata('pesan', 'Tahun Akademik Berhasil di Setting!');
        return redirect()->to(base_url('tahun_akademik/setting'));
    }

}