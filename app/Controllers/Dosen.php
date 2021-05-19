<?php

namespace App\Controllers;

class Dosen extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Dosen', 
			'isi' 	=> 'admin/dosen/index'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
