<?php

namespace App\Controllers;

class Mata_Kuliah extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Mata Kuliah', 
			'isi' 	=> 'admin/matkul/matkul'
		];

		return view('layout_dashboard/wrapper', $data);
	}

} 
