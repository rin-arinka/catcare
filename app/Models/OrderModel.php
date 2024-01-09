<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'tbl_transaksi'; // Replace 'your_table_name' with your actual table name
    protected $primaryKey = 'id_transaksi'; // Replace 'id' with your actual primary key column name
    protected $allowedFields = ['id_makanan', 'id_user', 'tgl_transaksi', 'status', 'alamat', 'delivery', 'catatan', 'bukti_bayar'];
}

?>