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
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'ta' => $ta,
            'jadwal' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_tahun_akademik']),
            'isi'    => 'dosen/jadwal'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function presensi_kuliah()
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Presensi Kuliah',
            'ta'    => $ta,
            'absen' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_tahun_akademik']),
            'isi'    => 'dosen/presensi_kuliah/presensi_kuliah'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function presensi($id_jadwal)
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Presensi Mengajar',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),
            'isi'    => 'dosen/presensi_kuliah/presensi'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function simpan_presensi($id_jadwal)
    {
        $mhs   = $this->ModelDsn->mhs($id_jadwal);
        foreach ($mhs as $key => $value) {
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'p1' => $this->request->getPost($value['id_krs'] . 'p1'),
                'p2' => $this->request->getPost($value['id_krs'] . 'p2'),
                'p3' => $this->request->getPost($value['id_krs'] . 'p3'),
                'p4' => $this->request->getPost($value['id_krs'] . 'p4'),
                'p5' => $this->request->getPost($value['id_krs'] . 'p5'),
                'p6' => $this->request->getPost($value['id_krs'] . 'p6'),
                'p7' => $this->request->getPost($value['id_krs'] . 'p7'),
                'p8' => $this->request->getPost($value['id_krs'] . 'p8'),
                'p9' => $this->request->getPost($value['id_krs'] . 'p9'),
                'p10' => $this->request->getPost($value['id_krs'] . 'p10'),
                'p11' => $this->request->getPost($value['id_krs'] . 'p11'),
                'p12' => $this->request->getPost($value['id_krs'] . 'p12'),
                'p13' => $this->request->getPost($value['id_krs'] . 'p13'),
                'p14' => $this->request->getPost($value['id_krs'] . 'p14'),
                'p15' => $this->request->getPost($value['id_krs'] . 'p15'),
                'p16' => $this->request->getPost($value['id_krs'] . 'p16'),
            ];
            $this->ModelDsn->simpan_presensi($data);
        }
        session()->setFlashdata('pesan', 'Presensi Berhasil di Perbarui!');
        return redirect()->to(base_url('dsn/presensi/' . $id_jadwal));
    }

    public function print_presensi($id_jadwal)
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Print Presensi',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),

        ];
        return view('dosen/presensi_kuliah/print_presensi', $data);
    }

}
