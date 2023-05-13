<?php

namespace App\Models;

use CodeIgniter\Model;

class IndLogModel extends Model
{
    protected $table      = 'individu_data_log';

    protected $allowedFields = ['created_by, jumlah'];

    public function getCapaian()
    {
        $builder = $this->db->table('individu_data_log');
        // $builder->where('tb_target.UserID');
        $builder->select('UserID, NamaPendata, Jml_LP, Jml_KK, individu_data_log.jumlah');
        // $builder->join('individu_data', 'individu_data_log.created_by=individu_data.created_by');
        $builder->join('tb_target', 'tb_target.UserID=individu_data_log.created_by');
        // $builder->selectCount('created_by');
        // $builder->where('')
        // $builder->select('NamaPendata, count(*)');
        // $builder->select('(SELECT COUNT(individu_data.created_by) FROM individu_data WHERE individu_data.created_by=tb_target.UserID) AS jumlah', false);
        $builder->orderBy('NamaPendata', 'asc');
        $query = $builder->get();

        return $query;
    }
}
