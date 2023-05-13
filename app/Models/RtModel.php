<?php

namespace App\Models;

use CodeIgniter\Model;

class RtModel extends Model
{
    protected $table      = 'tb_rt';
    protected $primaryKey = 'id_rt';

    protected $allowedFields = ['no_rt', 'no_rw', 'no_dusun', 'nama_rt'];

    public function getFindAll()
    {
        $builder = $this->db->table('tb_rt');
        $builder->distinct();
        $builder->select('no_rt');
        $query = $builder->get();

        return $query;
    }
}
