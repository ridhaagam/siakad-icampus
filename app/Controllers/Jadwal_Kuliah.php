<?php

namespace App\Controllers;

class Jadwal_Kuliah extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Jadwal Kuliah', 
			'isi' 	=> 'l_jkuliah'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
