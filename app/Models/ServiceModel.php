<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = "tbl_service";
    protected $primaryKey = "id_service";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_service', 'deskripsi_service', 'harga_service', 'foto', 'id_user', 'type_user'];
}