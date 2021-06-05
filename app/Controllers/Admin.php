<?php

namespace App\Controllers;
use App\Models\ModelAdmin;
class Admin extends BaseController
{
	public function __construct()
	{
		$this->ModelAdmin = new ModelAdmin();
	}

	public function index()
	{
	
		$data = [
			'title' => 'Admin',
			'jml_user'=> $this->ModelAdmin->jml_user(),
			'jml_dosen'=> $this->ModelAdmin->jml_dosen(),
			'jml_mahasiswa'=> $this->ModelAdmin->jml_mahasiswa(),
			'jml_prodi'=> $this->ModelAdmin->jml_prodi(),
			'jml_fakultas'=> $this->ModelAdmin->jml_fakultas(),
			'jml_matkul'=> $this->ModelAdmin->jml_matkul(),
			'jml_gedung'=> $this->ModelAdmin->jml_gedung(),
			'jml_ruangan'=> $this->ModelAdmin->jml_ruangan(),
			'isi' 	=> 'admin'
		];

		return view('layout_dashboard/wrapper', $data);
	}
}
