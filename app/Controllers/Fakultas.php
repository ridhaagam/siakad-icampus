<?php

namespace App\Controllers;

class Fakultas extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Fakultas', 
			'isi' 	=> 'admin/fakultas'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
