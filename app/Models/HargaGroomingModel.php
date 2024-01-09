<?php

namespace App\Models;

use CodeIgniter\Model;

class HargaGroomingModel extends Model
{
    protected $table = "tbl_harga_grooming";
    protected $primaryKey = "id_harga_grooming";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['jenis_grooming', 'deskripsi_jenis', 'foto_grooming', 'harga_normal', 'harga_promo'];
}