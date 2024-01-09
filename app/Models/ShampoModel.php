<?php

namespace App\Models;

use CodeIgniter\Model;

class ShampoModel extends Model
{
    protected $table = "tbl_shampo";
    protected $primaryKey = "id_shampo";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_shampo', 'harga', 'stok', 'foto', 'id_user', 'type_user'];
}