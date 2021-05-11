<?php

namespace App\Controllers;

class Fakultas extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Fakultas', 
			'isi' 	=> 'fakultas'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
