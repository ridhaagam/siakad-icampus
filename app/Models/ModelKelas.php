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
        $this->db->table('kelas')
            ->where('id_kelas', $data['id_kelas'])
            ->delete($data);
    }

    //Tampilan mahasiswa per kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('mahasiswa')
        ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
        ->where('id_kelas', $id_kelas)       
        ->orderBy('id_mhs', 'DESC')
        ->get()->getResultArray();
    }

    //Belum ada kelas

    public function nonkelas()
    {
        return $this->db->table('mahasiswa')
        ->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left')
        ->where('id_kelas', null) 
        ->orderBy('id_mhs', 'DESC')
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
