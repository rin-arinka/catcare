<?php

namespace App\Models;

use CodeIgniter\Model;

class HistModel extends Model
{
    protected $table = "tbl_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_transaksi', 'id_user', 'tgl_transaksi', 'jenis_produk', 'id_produk', 'harga'];
}