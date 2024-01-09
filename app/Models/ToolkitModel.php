<?php

namespace App\Models;

use CodeIgniter\Model;

class ToolkitModel extends Model
{
    protected $table = "tbl_toolkit";
    protected $primaryKey = "id_toolkit";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_toolkit', 'harga', 'stok', 'foto', 'id_user', 'type_user'];
}