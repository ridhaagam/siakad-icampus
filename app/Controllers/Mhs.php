<?php

namespace App\Controllers;

class Mhs extends BaseController

{
    public function index()
    {
        $data = [
            'title'    => 'Mahasiswa',
            'isi'      => 'mahasiswa/index'
        ];
        return view('layout_dashboard/wrapper', $data);
    }
}
