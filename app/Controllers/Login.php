<?php

namespace App\Controllers;

class Login extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'login', 
			'isi' 	=> 'v_login'
		];

		return view('layout/wrapper', $data);
	}

} 
