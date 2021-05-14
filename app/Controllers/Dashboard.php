<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'Dashboard', 
			'isi' 	=> 'admin/l_dashboard'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
