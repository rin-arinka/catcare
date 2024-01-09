<?php

namespace App\Models;

use CodeIgniter\Model;

class GroomingModel extends Model
{
    protected $table = "tbl_grooming";
    protected $primaryKey = "id_grooming";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_grooming', 'deskripsi_grooming', 'foto_grooming'];
}