<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = "tbl_gallery";
    protected $primaryKey = "id_gallery";
    protected $returnType = "object";
    protected $useTimestamps = false;
    protected $allowedFields = ['foto_gallery', 'thumb_gallery'];
}