<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalKuliah extends Model
{
    public function allData($id_prodi)
    {
        return $this->db->table('jadwal_kuliah')
        ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
        ->join('prodi', 'prodi.id_prodi = jadwal_kuliah.id_prodi', 'left')
        ->join('dosen', 'dosen.nidn = jadwal_kuliah.nidn', 'left')
        ->join('ruangan', 'ruangan.id_ruangan = jadwal_kuliah.id_ruangan', 'left')
        ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
        ->where('jadwal_kuliah.id_prodi', $id_prodi)
        ->orderBy('matkul.smt', 'ASC')
        ->get()->getResultArray();
    }

    public function matkul($id_prodi)
    {
        return $this->db->table('matkul')
        ->where('id_prodi', $id_prodi)
        ->orderBy('smt', 'ASC')
        ->get()->getResultArray();
    }

    public function kelas($id_prodi)
    {
        return $this->db->table('kelas')
        ->where('id_prodi', $id_prodi)
        ->orderBy('kelas', 'ASC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('jadwal_kuliah')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('jadwal_kuliah')
            ->where('id_jadwal_kuliah', $data['id_jadwal_kuliah'])
            ->delete($data);
            
    }

}
