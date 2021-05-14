<?php

namespace App\Controllers;

class Program_Studi extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Program Studi', 
			'isi' 	=> 'admin/prodi'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
