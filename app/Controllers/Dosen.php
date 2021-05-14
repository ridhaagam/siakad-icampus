<?php

namespace App\Controllers;

class Dosen extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Dosen', 
			'isi' 	=> 'admin/dosen'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
