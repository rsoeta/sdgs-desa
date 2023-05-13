<?php

namespace App\Models;

use CodeIgniter\Model;

class JenKelModel extends Model
{
    protected $table      = 'individu_jenis_kelamin';
    protected $primaryKey = 'IdJenKel';

    protected $allowedFields = ['NamaJenKel'];
}
