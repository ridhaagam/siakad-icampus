<?php

namespace App\Controllers;

use App\Models\ModelFakultas;

class Fakultas extends BaseController
{

	public function __construct()
    {
        helper('form');
        $this->ModelFakultas = new ModelFakultas();
    }

	public function index()
	{
		$data= [
			'title' => 'Fakultas', 
			'fakultas' => $this->ModelFakultas->allData(),
			'isi' 	=> 'admin/fakultas'
		];

		return view('layout_dashboard/wrapper', $data);
	}

	public function add()
    {
        $data = [
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Tambahkan!');
        return redirect()->to(base_url('fakultas'));
    }

    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
            'fakultas' => $this->request->getPost('fakultas'),
        ];
        $this->ModelFakultas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
        return redirect()->to(base_url('fakultas'));
    }

    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas' => $id_fakultas,
        ];
        $this->ModelFakultas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus!');
        return redirect()->to(base_url('fakultas'));
    }

} 
