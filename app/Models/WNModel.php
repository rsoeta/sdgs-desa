<?php

namespace App\Models;

use CodeIgniter\Model;

class WNModel extends Model
{
    protected $table      = 'individu_warganegara';
    protected $primaryKey = 'IdWN';

    protected $allowedFields = ['NamaWN'];
}
