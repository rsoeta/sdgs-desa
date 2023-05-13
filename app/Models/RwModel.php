<?php

namespace App\Models;

use CodeIgniter\Model;

class RwModel extends Model
{
    protected $table      = 'tb_rw';
    protected $primaryKey = 'id_rw';

    protected $allowedFields = ['no_rw', 'no_dusun', 'nama_rw'];
}
