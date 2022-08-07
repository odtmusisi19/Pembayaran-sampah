<?php

namespace App\Models;

use CodeIgniter\Model;

class SimpananModel extends Model
{
    public function getSimpanan()
    {
        $query =  $this->db->table('simpanan')
            ->join('anggota', 'simpanan.id_anggota = anggota.id_anggota')
            ->get();
        return $query;
    }
    public function getSimpanan1()
    {
        $query =  $this->db->table('simpanan')
            ->join('anggota', 'simpanan.id_anggota = anggota.id_anggota')
            ->join('unit', 'anggota.id_unit = unit.id_unit')
            ->get();
        return $query;
    }
}
