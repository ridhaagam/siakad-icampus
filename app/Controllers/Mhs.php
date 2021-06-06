<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelKrs;

class Mhs extends BaseController
{

    public function __construct()
    {
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mhs'   => $this->ModelKrs->DataMhs(),
            'ta' => $this->ModelTahunAkademik->ta_aktif(),
            'isi'    => 'mahasiswa'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function presensi_kuliah()
    {
        $mhs =  $this->ModelKrs->DataMhs();
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Presensi',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mhs'      => $this->ModelKrs->DataMhs(),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_tahun_akademik']),
            'isi'    => 'mhs/v_absensi'
        ];
        return view('layout/v_wrapper', $data);
    }

}
