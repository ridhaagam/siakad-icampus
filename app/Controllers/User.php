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

		return view('layout_dashboard/wrapper', $data);
	}

} 
