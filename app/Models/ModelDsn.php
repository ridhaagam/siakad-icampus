<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model
{
    public function DataDosen()
    {
        return $this->db->table('dosen')
            ->where('nidn', session()->get('username'))
            ->get()->getRowArray();
    }

    public function detailData($id_dosen)
    {
        return $this->db->table('dosen')
            ->where('id_dosen', $id_dosen)
            ->get()->getRowArray();
    }

    public function edit_profil($data)
    {
        $this->db->table('dosen')
            ->where('id_dosen', $data['id_dosen'])
            ->update($data);
    }

    public function setting_password($data)
    {
        $this->db->table('dosen')
            ->where('id_dosen', $data['id_dosen'])
            ->update($data);
    }

    public function id_dosen($data)
    {
        $this->db->table('dosen')
            ->where('id_dosen', $data['id_dosen'])
            ->update($data);
    }

    public function JadwalDosen($id_dosen, $id_ta)
    {
        return $this->db->table('jadwal_kuliah')
            ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
            ->join('prodi', 'prodi.id_prodi = jadwal_kuliah.id_prodi', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen', 'left')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal_kuliah.id_ruangan', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
            ->where('jadwal_kuliah.id_dosen', $id_dosen)
            ->where('jadwal_kuliah.id_tahun_akademik', $id_ta)
            ->get()->getResultArray();
    }

    public function DetailJadwal($id_jadwal)
    {
        return $this->db->table('jadwal_kuliah')
            ->join('prodi', 'prodi.id_prodi = jadwal_kuliah.id_prodi', 'left')
            ->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left')
            ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
            ->where('jadwal_kuliah.id_jadwal_kuliah', $id_jadwal)
            ->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('krs')
            ->join('mahasiswa', 'mahasiswa.id_mhs = krs.id_mhs', 'left')
            ->where('id_jadwal_kuliah', $id_jadwal)
            ->get()->getResultArray();
    }

    public function simpan_presensi($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }

    public function simpan_nilai($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }
}
