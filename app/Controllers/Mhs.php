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
            'title' => 'Mahasiswa',
            'mhs'   => $this->ModelKrs->DataMhs(),
            'mahasiswa'   => $this->ModelKrs->DataMahasiswa(),
            'ta' => $this->ModelTahunAkademik->ta_aktif(),
            'isi'    => 'mahasiswa'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function presensi()
    {
        $mhs =  $this->ModelKrs->DataMhs();
        $mahasiswa =  $this->ModelKrs->DataMahasiswa();
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Jadwal & Presensi Kuliah',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mhs'      => $this->ModelKrs->DataMhs(),
            'mahasiswa'      => $this->ModelKrs->DataMahasiswa(),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_tahun_akademik']),
            'isi'    => 'mahasiswa/presensi_kuliah'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function khs()
    {
        $mhs =  $this->ModelKrs->DataMhs();
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mhs'      => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($ta['id_tahun_akademik'], $mhs['id_prodi']),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_tahun_akademik'], $mhs['id_prodi']),
            'isi'    => 'mahasiswa/khs'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function print_khs()
    {
        $mhs =  $this->ModelKrs->DataMhs();
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Kartu Hasil Studi (KHS)',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mhs'      => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($ta['id_tahun_akademik'], $mhs['id_prodi']),
            'data_matkul'   => $this->ModelKrs->DataKrs($mhs['id_mhs'], $ta['id_tahun_akademik']),

        ];
        return view('mahasiswa/print_khs', $data);
    }

}
