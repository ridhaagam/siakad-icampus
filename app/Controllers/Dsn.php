<?php

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTahunAkademik;

class Dsn extends BaseController
{

    public function __construct()
    {
        $this->ModelDsn = new ModelDsn();
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'dosen' => $this->ModelDsn->DataDosen(),
            'ta' => $this->ModelTahunAkademik->ta_aktif(),
            'isi'    => 'dosen'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function jadwal()
    {
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'jadwal' => $this->ModelDsn->JadwalDosen($dosen['id_dosen']),
            'isi'    => 'dosen/jadwal'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    
}
