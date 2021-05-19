<?php

namespace App\Controllers;

class Jadwal_Kuliah extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Jadwal Kuliah', 
			'isi' 	=> 'admin/jadwal_kuliah/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
