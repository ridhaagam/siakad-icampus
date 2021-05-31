<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
class Mahasiswa extends BaseController
{
	public function __construct()
	{
		$this->ModelMahasiswa = new ModelMahasiswa();
	}
	public function index()
	{
		$data= [
			'title' => 'Mahasiswa', 
			'mhs' => $this->ModelMahasiswa->allData(),
			'isi' 	=> 'admin/mahasiswa/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}
 
} 
