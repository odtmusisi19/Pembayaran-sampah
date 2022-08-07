<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = "petugas";
    protected $primaryKey = "id_petugas";
    protected $returnType = "object";
    protected $allowedFields = ['id_petugas', 'nama_petugas', 'telepon', 'username', 'password'];
}
