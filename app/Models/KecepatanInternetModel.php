<?php

namespace App\Models;

use CodeIgniter\Model;

class KecepatanInternetModel extends Model
{
    protected $table      = 'individu_kecepatan_internet';
    protected $primaryKey = 'IdKecepatan';

    protected $allowedFields = ['NamaKecepatan'];
}
