<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

    public function jml_user()
    {
        return $this->db->table('user')
        ->countAll();
    }

    public function jml_dosen()
    {
        return $this->db->table('dosen')
        ->countAll();
    }

    public function jml_mahasiswa()
    {
        return $this->db->table('mahasiswa')
        ->countAll();
    }

    public function jml_prodi()
    {
        return $this->db->table('prodi')
        ->countAll();
    }

    public function jml_fakultas()
    {
        return $this->db->table('fakultas')
        ->countAll();
    }

    public function jml_matkul()
    {
        return $this->db->table('matkul')
        ->countAll();
    }

    public function jml_gedung()
    {
        return $this->db->table('gedung')
        ->countAll();
    }

    public function jml_ruangan()
    {
        return $this->db->table('ruangan')
        ->countAll();
    } 

}

