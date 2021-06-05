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

    public function JadwalDosen($id_dosen)
    {
        return $this->db->table('jadwal_kuliah')
        ->join('matkul', 'matkul.id_matkul = jadwal_kuliah.id_matkul', 'left')
        ->join('prodi', 'prodi.id_prodi = jadwal_kuliah.id_prodi', 'left')
        ->join('dosen', 'dosen.id_dosen = jadwal_kuliah.id_dosen', 'left')
        ->join('ruangan', 'ruangan.id_ruangan = jadwal_kuliah.id_ruangan', 'left')
        ->join('kelas', 'kelas.id_kelas = jadwal_kuliah.id_kelas', 'left')
        ->where('jadwal_kuliah.id_dosen', $id_dosen)
        ->get()->getResultArray();
    } 

}
