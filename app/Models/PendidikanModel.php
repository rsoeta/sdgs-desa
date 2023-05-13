<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    protected $table      = 'pendidikan_pend_tinggi';
    protected $primaryKey = 'IDPendidikan';

    protected $allowedFields = ['NamaPendidikan'];
}
