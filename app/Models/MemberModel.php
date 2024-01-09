<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = "tbl_member";
    protected $primaryKey = "id_member";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_member', 'nama_member', 'username', 'no_hp', 'level', 'password', 'alamat_member', 'saldo'];
}