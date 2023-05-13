<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table      = 'penghasilan_satuan';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nm_satuan'];
}
