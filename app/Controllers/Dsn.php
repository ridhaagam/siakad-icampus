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

    public function edit_profil($id_dosen)
    {
        $data = [
            'title'    => 'Edit Profil',
            'dosen' => $this->ModelDsn->detailData($id_dosen),
            'isi'      => 'dosen/dashboard/edit_profil'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function setting_password($id_dosen)
    {
        $data = [
            'title'    => 'Setting Password',
            'dosen' => $this->ModelDsn->detailData($id_dosen),
            'isi'      => 'dosen/dashboard/setting_password'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function update($id_dosen)
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpeg,image/jpg,image/gif,image/ico]',
                'errors' => [
                    'max_size' => 'Maksimal ukuran Foto 1024kb',
                    'mime_in' => 'Format {field} Wajib PNG, JPG, JPEG, GIF, ICO'
                ]
            ],
            'no_hp' => [
                'label' => 'No Handphone',
                'rules' => 'integer|min_length[10]|max_length[13]|',
                'errors' => [
                    'min_length' => 'No Handphone terlalu pendek, minimal 10 digit.',
                    'max_length' => 'No Handphone terlalu panjang, maksimal 12 digit.',
                    'integer' => 'No Handphone harus angka.'
                ]
            ],
        ])) {
            //mengambil file foto dari form input
            $foto = $this->request->getFile('foto');
            if ($foto->getError() == 4) {
                //jika foto tdk d ganti
                $data = array(
                    'id_dosen' => $id_dosen,
                    'nidn' => $this->request->getPost('nidn'),
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'jenkel' => $this->request->getPost('jenkel'),
                    'alamat' => $this->request->getPost('alamat'),
                    'ttl' => $this->request->getPost('ttl'),
                    'password' => $this->request->getPost('password'),
                    'email' => $this->request->getPost('email'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'status_ikatan_kerja' => $this->request->getPost('status_ikatan_kerja'),
                    'jabatan_fungsional' => $this->request->getPost('jabatan_fungsional'),
                    'status_aktivitas' => $this->request->getPost('status_aktivitas'),
                );
                $this->ModelDsn->edit_profil($data);
            } else {
                //delete foto lama
                $dosen = $this->ModelDsn->detailData($id_dosen);
                if ($dosen['foto'] != "") {
                    unlink('img-dosen/' . $dosen['foto']);
                }
                //merename nama file foto
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'id_dosen' => $id_dosen,
                    'nidn' => $this->request->getPost('nidn'),
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'jenkel' => $this->request->getPost('jenkel'),
                    'alamat' => $this->request->getPost('alamat'),
                    'ttl' => $this->request->getPost('ttl'),
                    'password' => $this->request->getPost('password'),
                    'email' => $this->request->getPost('email'),
                    'no_hp' => $this->request->getPost('no_hp'),
                    'pendidikan' => $this->request->getPost('pendidikan'),
                    'status_ikatan_kerja' => $this->request->getPost('status_ikatan_kerja'),
                    'jabatan_fungsional' => $this->request->getPost('jabatan_fungsional'),
                    'status_aktivitas' => $this->request->getPost('status_aktivitas'),
                    'foto' => $nama_file,
                );
                //memindahkan file foto dari form input ke folder foto di directory
                $foto->move('img-dosen', $nama_file);
                $this->ModelDsn->edit_profil($data);
            }
            session()->setFlashdata('pesan', 'Data Berhasil di Perbarui!');
            return redirect()->to(base_url('dsn/edit_profil/' . $id_dosen));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dsn/edit_profil/' . $id_dosen));
        }
    }

    public function update_password($id_dosen)
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
                'id_dosen' => $id_dosen,
                'password' => $this->request->getPost('password'),
            );
            $this->ModelDsn->setting_password($data);

            //jika valid
            $data = array(
                'id_dosen' => $id_dosen,
                'password' => $this->request->getPost('password'),
            );

            $this->ModelDsn->setting_password($data);

            session()->setFlashdata('pesan', 'Password Berhasil di ubah!');
            return redirect()->to(base_url('dsn/setting_password/' . $id_dosen));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('dsn/setting_password/' . $id_dosen));
        }
    }

    public function jadwal()
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'ta' => $ta,
            'dosen' => $dosen,
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
            'dosen' => $dosen,
            'absen' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_tahun_akademik']),
            'isi'    => 'dosen/presensi_kuliah/presensi_kuliah'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function presensi($id_jadwal)
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Presensi Mengajar',
            'ta'    => $ta,
            'dosen' => $dosen,
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

    public function nilai_mahasiswa()
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta'    => $ta,
            'dosen' => $dosen,
            'absen' => $this->ModelDsn->JadwalDosen($dosen['id_dosen'], $ta['id_tahun_akademik']),
            'isi'    => 'dosen/nilai_mahasiswa/nilai_mahasiswa'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function nilai($id_jadwal)
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta'    => $ta,
            'dosen' => $dosen,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),
            'isi'    => 'dosen/nilai_mahasiswa/nilai'
        ];
        return view('layout_dashboard/wrapper', $data);
    }

    public function simpan_nilai($id_jadwal)
    {
        $mhs   = $this->ModelDsn->mhs($id_jadwal);
        foreach ($mhs as $key => $value) {
            $absen = $this->request->getPost($value['id_krs'] . 'absen');
            $tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
            $uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
            $uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
            $praktikum = $this->request->getPost($value['id_krs'] . 'nilai_praktikum');
            $na = ($absen * 10 / 100) + ($tugas * 30 / 100) + ($uts * 10 / 100) + ($uas * 20 / 100) + ($praktikum * 30 / 100);
            if ($na > 80) {
                $nh = 'A';
                $bobot = 4;
            } else if ($na > 75 && $na < 80) {
                $nh = 'B+';
                $bobot = 3.5;
            } else if ($na > 70 && $na < 74.99) {
                $nh = 'B';
                $bobot = 3;
            } else if ($na > 60 && $na < 69.99) {
                $nh = 'C+';
                $bobot = 2.5;
            } else if ($na > 55 && $na < 59.99) {
                $nh = 'C';
                $bobot = 2;
            } else if ($na > 40 && $na < 54.99) {
                $nh = 'D';
                $bobot = 1;
            } else if ($na < 40) {
                $nh = 'E';
                $bobot = 0;
            }
            $data = [
                'id_krs' => $this->request->getPost($value['id_krs'] . 'id_krs'),
                'nilai_tugas' => $this->request->getPost($value['id_krs'] . 'nilai_tugas'),
                'nilai_uts' => $this->request->getPost($value['id_krs'] . 'nilai_uts'),
                'nilai_uas' => $this->request->getPost($value['id_krs'] . 'nilai_uas'),
                'nilai_praktikum' => $this->request->getPost($value['id_krs'] . 'nilai_praktikum'),
                'nilai_akhir' => number_format($na, 3),
                'nilai_huruf' => $nh,
                'bobot' => $bobot,
            ];
            $this->ModelDsn->simpan_nilai($data);
        }
        session()->setFlashdata('pesan', 'Nilai Berhasil di Perbarui!');
        return redirect()->to(base_url('dsn/nilai/' . $id_jadwal));
    }

    public function print_nilai($id_jadwal)
    {
        $ta = $this->ModelTahunAkademik->ta_aktif();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta'    => $ta,
            'jadwal' => $this->ModelDsn->DetailJadwal($id_jadwal),
            'mhs'   => $this->ModelDsn->mhs($id_jadwal),
        ];
        return view('dosen/nilai_mahasiswa/print_nilai', $data);
    }
}
