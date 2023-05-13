<?php

namespace App\Models;

use CodeIgniter\Model;

class PelayananDesaModel extends Model
{
    protected $table      = 'pendidikan_pelayanan_desa';
    protected $primaryKey = 'IDPelayanan';

    protected $allowedFields = ['NamaPelayanan'];
}
