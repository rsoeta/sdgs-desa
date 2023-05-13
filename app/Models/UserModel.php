<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup  = 'default';
    protected $table      = 'tb_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields = ['desa_id', 'firstname', 'lastname', 'nik', 'email', 'password', 'status', 'role', 'user_image', 'updated_at'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = ["beforeInsert"];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];


    // protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }

    // protected function beforeUpdate(array $data)
    // {
    //     $data = $this->passwordHash($data);

    //     return $data;
    // }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    public function getUser()
    {
        $id = session()->get('id');
        $builder = $this->db->table('tb_users');
        $builder->select('*');
        $builder->join('tb_roles', 'tb_roles.id_role = tb_users.role', 'left');
        $builder->join('tb_des_kel', 'tb_des_kel.KodeDesa = tb_users.desa_id', 'left');
        $builder->where('tb_users.id', $id);
        $query = $builder->get();

        return $query;
    }

    public function getFindAll()
    {
        $builder = $this->db->table('tb_users');
        $builder->select('*');
        $builder->join('tb_roles', 'tb_roles.id_role = tb_users.role', 'left');
        $builder->join('tb_des_kel', 'tb_des_kel.KodeDesa = tb_users.desa_id', 'left');
        $query = $builder->get();

        return $query;
    }

    public function update_status($uid, $ustatus)
    {
        // $uid = $this->request->getVar('uid');
        // $ustatus = $this->request->getVar('ustatus');

        if ($ustatus == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $data = [
            'status' => $status,
        ];

        $builder = $this->db->table('tb_users');
        $builder->where('id', $uid);
        $query = $builder->update($data);

        return $query;
    }
}
