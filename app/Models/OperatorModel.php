<?php

namespace App\Models;

use CodeIgniter\Model;

class OperatorModel extends Model
{
    protected $table      = 'tb_operator';
    protected $primaryKey = 'IdOpr';

    protected $allowedFields = ['UserID', 'NamaLengkap'];

    public function getDesKels()
    {
        $builder = $this->db->table('des_kel');
        $builder->select('*');
        $builder->orderBy('nm_desa', 'asc');
        $query = $builder->get();

        return $query;
        // Produces: SELECT SUM(age) as age FROM mytable
    }
}
