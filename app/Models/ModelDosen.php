<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{
    public function allData()
    {
        return $this->db->table('dosen')
            ->orderBy('nidn', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($nidn)
    {
        return $this->db->table('dosen')
            ->where('nidn', $nidn)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('dosen')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('dosen')
            ->where('nidn', $data['nidn'])
            ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('dosen')
            ->where('nidn', $data['nidn'])
            ->delete($data);
    }
}
