<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Mahasiswa', 
			'isi' 	=> 'admin/mahasiswa'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
