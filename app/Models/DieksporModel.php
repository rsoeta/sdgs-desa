<?php

namespace App\Models;

use CodeIgniter\Model;

class DieksporModel extends Model
{
    protected $table      = 'penghasilan_diekspor';
    protected $primaryKey = 'IDEkspor';

    protected $allowedFields = ['NamaEkspor'];
}
