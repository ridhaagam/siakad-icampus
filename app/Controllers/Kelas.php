<?php

namespace App\Controllers;

class Kelas extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Kelas', 
			'isi' 	=> 'v_kelas'
		];

		return view('layout/wrapper', $data);
	}

} 
