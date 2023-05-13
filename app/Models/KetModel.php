<?php

namespace App\Models;

use CodeIgniter\Model;

class KetModel extends Model
{
    protected $table      = 'tb_keterangan';
    protected $primaryKey = 'IDKeterangan';

    protected $allowedFields = ['NamaKeterangan'];
}
