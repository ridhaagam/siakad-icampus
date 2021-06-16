<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelKrs;
use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mhs extends BaseController
{

    public function __construct()
    {
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelKrs = new ModelKrs();
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelProdi = new ModelProdi();
        helper('form');
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

    public function edit_profil($id_mhs)
    {
        $data = [
            'title'    => 'Edit Profil',
            'mahasiswa' => $this->ModelMahasiswa->detailData($id_mhs),
            'isi'      => 'mahasiswa/dashboard/edit_profil'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function setting_password($id_mhs)
    {
        $data = [
            'title'    => 'Setting Password',
            'mahasiswa' => $this->ModelMahasiswa->detailData($id_mhs),
            'isi'      => 'mahasiswa/dashboard/setting_password'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function update($id_mhs)
    {
        if ($this->validate([
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'integer|min_length[10]|max_length[13]',
                'errors' => [
                    'min_length' => 'No Handphone terlalu pendek, minimal 10 digit.',
                    'max_length' => 'No Handphone terlalu panjang, maksimal 12 digit.',
                    'integer' => 'No Handphone harus angka.'
                ]
            ],
        ])) {

            $data = array(
                'id_mhs' => $id_mhs,
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );
            $this->ModelMahasiswa->edit_profil($data);

            //jika valid
            $data = array(
                'id_mhs' => $id_mhs,
                'no_hp' => $this->request->getPost('no_hp'),
                'email' => $this->request->getPost('email'),
                'alamat' => $this->request->getPost('alamat'),
            );

            $this->ModelMahasiswa->edit_profil($data);

            session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
            return redirect()->to(base_url('mhs/edit_profil/' . $id_mhs));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mhs/edit_profil/' . $id_mhs));
        }
    }

    public function update_password($id_mhs)
    {
        if ($this->validate([
            'password' => [
                'label' => 'Password',
                'rules' => 'required|trim|min_length[6]|max_length[12]|integer|matches[confirm_password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'matches' => 'Password tidak cocok.',
                    'min_length' => 'Password terlalu pendek, minimal 6 digit.',
                    'max_length' => 'Password terlalu panjang, maksimal 12 digit.',
                    'integer' => 'Password harus angka.'
                ]
            ],
            'confirm_password' => [
                'label' => 'Password',
                'rules' => 'required|trim|matches[password]',
                'errors' => [
                    'required' => ' Ulangi Password tidak boleh kosong.',
                ]
            ],
        ])) {

            $data = array(
                'id_mhs' => $id_mhs,
                'password' => $this->request->getPost('password'),
            );
            $this->ModelMahasiswa->setting_password($data);

            //jika valid
            $data = array(
                'id_mhs' => $id_mhs,
                'password' => $this->request->getPost('password'),
            );

            $this->ModelMahasiswa->setting_password($data);

            session()->setFlashdata('pesan', 'Password Berhasil di ubah!');
            return redirect()->to(base_url('mhs/setting_password/' . $id_mhs));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('mhs/setting_password/' . $id_mhs));
        }
    }

    public function presensi()
    {
        $mhs =  $this->ModelKrs->DataMhs();
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
    public function transkrip()
    {
        $mahasiswa = $this->ModelKrs->DataMhs();
        $tahun_akademik = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Transkrip Nilai',
            'ta_aktif' => $this->ModelTahunAkademik->ta_aktif(),
            'mahasiswa'   => $this->ModelKrs->DataMhs(),
            'matkul_ditawarkan' => $this->ModelKrs->MatkulDitawarkan($tahun_akademik['id_tahun_akademik'], $mahasiswa['id_prodi']),
            'data_matkul'  => $this->ModelKrs->DataKrs($mahasiswa['id_mhs'], $tahun_akademik['id_tahun_akademik']),
            'isi'    => 'mahasiswa/transkrip'
        ];
        return view('layout_dashboard/wrapper', $data);
    }
}
