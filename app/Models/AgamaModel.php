<?php

namespace App\Models;

use CodeIgniter\Model;

class AgamaModel extends Model
{
    protected $table      = 'individu_agama';
    protected $primaryKey = 'IdAgama';

    protected $allowedFields = ['NamaAgama'];
}
