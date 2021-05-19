<?php

namespace App\Controllers;

class Tahun_Akademik extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Tahun Akademik', 
			'isi' 	=> 'admin/akademik'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
