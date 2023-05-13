<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table      = 'individu_status';
    protected $primaryKey = 'IdStatus';

    protected $allowedFields = ['NamaStatus'];
}
