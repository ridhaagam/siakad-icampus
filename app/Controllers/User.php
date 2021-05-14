<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data= [
			'title' => 'User', 
			'isi' 	=> 'admin/user'
		];

		return view('l_login/l_wrapper', $data);
	}

} 
