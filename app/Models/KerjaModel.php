<?php

namespace App\Models;

use CodeIgniter\Model;

class KerjaModel extends Model
{
    protected $table      = 'pekerjaan_pekerjaan_utama';
    protected $primaryKey = 'id_pekerjaan';

    protected $allowedFields = ['nm_pekerjaan'];

    public function JmlKerjaUtama()
    {
        $builder = $this->db->table('pekerjaan_utama_jml');

        $query = $builder->select("PekerjaanUtama, JmlPekerjaan, nm_pekerjaan");
        $query = $builder->join('pekerjaan_pekerjaan_utama', 'pekerjaan_pekerjaan_utama.id_pekerjaan=pekerjaan_utama_jml.PekerjaanUtama');
        // $query = $builder->where("RW GROUP BY RW, s")->get();
        $query = $builder->get();
        $record = $query->getResultArray();

        return $record;
    }
}
