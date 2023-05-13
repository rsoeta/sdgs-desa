<?php

namespace App\Models;

use CodeIgniter\Model;

class DesKelModel extends Model
{
    protected $table      = 'tb_des_kel';
    protected $primaryKey = 'IDDesa';

    protected $allowedFields = ['KodeDesa', 'NamaDesa'];

    public function getDesKels()
    {
        $builder = $this->db->table('tb_des_kel');
        $builder->select('*');
        $builder->orderBy('NamaDesa', 'asc');
        $query = $builder->get();

        return $query;
        // Produces: SELECT SUM(age) as age FROM mytable
    }
}
