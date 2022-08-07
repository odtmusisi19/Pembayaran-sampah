<?php

namespace App\Models;

use CodeIgniter\Model;

class MasyarakatModel extends Model
{
    protected $table = "masyarakat";
    protected $primaryKey = "id_masyarakat";
    protected $returnType = "object";
    protected $allowedFields = ['id_masyarakat', 'nama_masyarakat', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'telepon', 'gambar'];

    // public function saveData($data_pembayaran)
    // {
    //     // return $this->db->table('masyarakat')->insert($data_masyarakat);

    //     // $data_pembayaran['id_pembayaran'] = $this->db->insertID();
    //     return $this->db->table('pembayaran')->insert($data_pembayaran);
    // }
}
