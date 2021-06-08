<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelKrs;

class Krs extends BaseController
{

    public function __construct()
    {
        //helper('form');
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $data = [
            'title' => 'Kartu Rencana Studi(KRS)',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mahasiswa'   =>$this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' =>$this->ModelKrs->MatkulDitawarkan(),
            'isi'    => 'mhs/krs/v_krs'
        ];
        return view('layout_dashboard/wrapper', $data);
    }
}
