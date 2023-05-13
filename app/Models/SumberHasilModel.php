<?php

namespace App\Models;

use CodeIgniter\Model;

class SumberHasilModel extends Model
{
    protected $table      = 'penghasilan_sumber';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nm_sumber'];
}
