<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{ 
    public function DataMhs()
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
            ->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left')
            ->join('kelas', 'kelas.id_kelas = mahasiswa.id_kelas', 'left')
            ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
            ->where('nim', session()->get('username'))
            ->get()->getRowArray();
    }

    public function MatkulDitawarkan($id_tahun_akademik/*, $id_prodi*/)
    {
        return $this->db->table('jadwal_kuliah')
            ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal_kuliah.id_ruangan', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen', 'left')
            //->join('prodi', 'prodi.id_prodi = jadwal_kuliah.id_prodi', 'left')
            //->where('jadwal_kuliah.id_tahun_akademik', $id_tahun_akademik)
            //->where('jadwal_kuliah.id_prodi', $id_prodi)
            ->where('id_tahun_akademik', $id_tahun_akademik)
            ->get()->getResultArray();
    }

    public function TambahMatkul($data)
    {
        $this->db->table('krs')->insert($data);
    }

    public function DataKrs($id_mhs, $id_tahun_akademik)
    {
        return $this->db->table('krs')
            ->join('jadwal_kuliah', 'jadwal_kuliah.id_jadwal_kuliah = krs.id_jadwal_kuliah', 'left')
            ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal_kuliah.id_ruangan', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen', 'left')
            ->where('id_mhs', $id_mhs)
            ->where('krs.id_tahun_akademik', $id_tahun_akademik)
            ->get()->getResultArray();
    }

    public function delete_data($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->delete($data);
    }
}
