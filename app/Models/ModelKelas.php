<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    public function allData()
    {
        return $this->db->table('kelas')
            ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
            ->join('dosen', 'dosen.nidn = kelas.nidn', 'left')
            ->orderBy('kelas.id_prodi', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_kelas){
        return $this->db->table('kelas')
        ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
        ->join('dosen', 'dosen.nidn = kelas.nidn', 'left')
        ->where('id_kelas', $id_kelas)
        ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('kelas')->insert($data);
    }

     public function delete_data($data)
    {
        $this->db->table('matkul')
            ->where('id_matkul', $data['id_matkul'])
            ->delete($data);
    }

    //Tampilan mahasiswa per kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('mahasiswa')
        ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
        ->where('id_kelas', $id_kelas)       
        ->orderBy('nim', 'DESC')
        ->get()->getResultArray();
    }

    //Belum ada kelas

    public function nonkelas()
    {
        return $this->db->table('mahasiswa')
        ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
        ->where('id_kelas', null) 
        ->orderBy('nim', 'DESC')
        ->get()->getResultArray();
    }

    public function jumlah($id_kelas)
    {
        return $this->db->table('mahasiswa')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }
    
    public function update_mhs($data)
    {
        $this->db->table('mahasiswa')
        ->where('id_mhs', $data['id_mhs'])
        ->update($data);
    }
}
