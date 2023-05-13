<?php

namespace App\Models;

use CodeIgniter\Model;

class TargetModel extends Model
{
    protected $table      = 'tb_target';
    protected $primaryKey = 'IDTarget';

    protected $allowedFields = ['UserID', 'NamaPendata', 'Jml_LP', 'Jml_KK'];
}
