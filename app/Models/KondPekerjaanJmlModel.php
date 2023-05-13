<?php

namespace App\Models;

use CodeIgniter\Model;

class KondPekerjaanJmlModel extends Model
{
    protected $table      = 'pekerjaan_kond_jml';
    protected $primaryKey = 'KondisiPekerjaan';

    protected $allowedFields = ['NamaKondisi', 'JmlKondisi'];

    public function JmlKondisiPekerjaan()
    {
        $builder = $this->db->table('pekerjaan_kond_jml');

        $query = $builder->select("KondisiPekerjaan, JmlKondisi, NamaKondisi");
        $query = $builder->join('pekerjaan_kondisi_pekerjaan', 'pekerjaan_kondisi_pekerjaan.IDKondisi=pekerjaan_kond_jml.KondisiPekerjaan');
        // $query = $builder->where("RW GROUP BY RW, s")->get();
        $query = $builder->get();
        $record = $query->getResult();

        return $record;
    }
}
