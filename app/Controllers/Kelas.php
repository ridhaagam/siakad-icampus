<?php

namespace App\Controllers;

class Kelas extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Kelas', 
			'isi' 	=> 'admin/kelas/kelas'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
