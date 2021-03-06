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
        $mahasiswa = $this->ModelKrs->DataMhs();
        $tahun_akademik = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'KRS / Pemrograman KRS',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mahasiswa'   => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($tahun_akademik['id_tahun_akademik'], $mahasiswa['id_prodi']),
            'data_matkul'  => $this->ModelKrs->DataKrs($mahasiswa['id_mhs'], $tahun_akademik['id_tahun_akademik']),
            'isi'    => 'mahasiswa/krs/krs'
        ];
        return view('layout_dashboard/wrapper', $data);
    }
    public function tambah_matkul($id_jadwal_kuliah)
    {
        $mahasiswa = $this->ModelKrs->DataMhs();
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'id_jadwal_kuliah' => $id_jadwal_kuliah,
            'id_tahun_akademik' => $ta['id_tahun_akademik'],
            'id_mhs' => $mahasiswa['id_mhs']
        ];
        $this->ModelKrs->TambahMatkul($data);
        session()->setFlashdata('pesan', 'Mata Kuliah Berhasil di Tambahkan!');
        return redirect()->to(base_url('krs'));
    }

    public function delete($id_krs)
    {
        $data = [
            'id_krs' => $id_krs,
        ];
        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'KRS Berhasil di Hapus!');
        return redirect()->to(base_url('krs'));
    }

    public function print()
    {
        $mahasiswa = $this->ModelKrs->DataMhs();
        $tahun_akademik = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Cetak KRS',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mahasiswa'   => $this->ModelKrs->DataMhs(),
            'data_matkul'  => $this->ModelKrs->DataKrs($mahasiswa['id_mhs'], $tahun_akademik['id_tahun_akademik'])
        ];
        return view('mahasiswa/krs/print_krs', $data);
    }
}
