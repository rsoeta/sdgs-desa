<?php

namespace App\Models;

use CodeIgniter\Model;

class KondisiPekerjaanModel extends Model
{
    protected $table      = 'pekerjaan_kondisi_pekerjaan';
    protected $primaryKey = 'IDKondisi';

    protected $allowedFields = ['NamaKondisi'];
}
