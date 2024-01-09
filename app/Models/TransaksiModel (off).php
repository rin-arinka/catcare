<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = "tbl_transaksi";
    protected $primaryKey = "id_transaksi";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['id_transaksi', 'id_makanan', 'id_user', 'tgl_transaksi', 'status', 'alamat', 'delivery', 'catatan'];

    public function AdminOrder()
	{
	    $query = $this->db->query("SELECT * FROM tbl_transaksi JOIN tbl_makanan ON tbl_transaksi.id_makanan = tbl_makanan.id_makanan JOIN tbl_user ON tbl_transaksi.id_user = tbl_user.id_user WHERE tbl_transaksi.status = 'Pending' ORDER BY tbl_transaksi.tgl_transaksi ASC");
	    return $query->getResult();
	}
}