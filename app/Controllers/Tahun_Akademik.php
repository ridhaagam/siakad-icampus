<?php

namespace App\Controllers;

class Tahun_Akademik extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Tahun Akademik', 
			'isi' 	=> 'akademik'
		];

		return view('l_login/l_wrapper', $data);
	}

} 