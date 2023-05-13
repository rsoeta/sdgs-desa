<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesInternetModel extends Model
{
    protected $table      = 'individu_akses_internet';
    protected $primaryKey = 'IdAkses';

    protected $allowedFields = ['NamaAkses'];
}
