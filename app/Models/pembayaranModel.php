<?php

namespace App\Models;

use CodeIgniter\Model;

class PembayaranModel extends Model
{
    protected $table = "pembayaran";
    protected $primaryKey = "id_pembayaran";
    protected $returnType = "object";
    protected $allowedFields = ['id_pembayaran', 'id_masyarakat', 'id_dusun', 'id_petugas', 'tanggal_pembayaran', 'jumlah', 'keterangan'];

    public function saveData($data_masyarakat)
    {
        $this->db->table('pembayaran')->insert($data_masyarakat);
    }
    public function getJoin()
    {
        //Mengambil Data Pembayaran dari id_petugas yang bernilai NULL
        $last_petugas = $this->db->query("SELECT * FROM `pembayaran` WHERE `id_petugas` IS NULL ");
        if ($last_petugas !== []) {
            $query =  $this->db->table('masyarakat')
                ->join('pembayaran', 'masyarakat.id_masyarakat = pembayaran.id_masyarakat')
                ->join('dusun', 'pembayaran.id_dusun = dusun.id_dusun')
                ->get();
            return $query;
        } else {
            $query =  $this->db->table('masyarakat')
                ->join('pembayaran', 'masyarakat.id_masyarakat = pembayaran.id_masyarakat')
                ->join('dusun', 'pembayaran.id_dusun = dusun.id_dusun')
                ->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas')
                ->get();
            return $query;
        }
    }
}
