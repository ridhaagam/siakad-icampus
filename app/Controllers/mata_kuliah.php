<?php

namespace App\Controllers;

class Mata_Kuliah extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Mata Kuliah', 
			'isi' 	=> 'matkul'
		];

		return view('l_login/l_wrapper', $data);
	}

} 