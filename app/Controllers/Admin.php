<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Admin',
			'isi' 	=> 'admin'
		];

		return view('layout_dashboard/wrapper', $data);
	}
}
