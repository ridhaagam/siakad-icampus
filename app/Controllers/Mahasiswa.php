<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Mahasiswa', 
			'isi' 	=> 'admin/mahasiswa/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
