<?php

namespace App\Controllers;

class Kelas extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Kelas', 
			'isi' 	=> 'admin/v_kelas'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
