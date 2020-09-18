<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'telepon', 'level'];

    public function get($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_user' => $id])->getRowArray();
        }
    }

    public function simpan($post)
    {
        $data = [
            'username' => $post['username'],
            'password' => $post['password'],
            'telepon' => $post['telp'],
            'level' => $post['level'],
        ];

        $query = $this->table($this->table)->insert($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah($post)
    {
        $data = [
            'username' => $post['username'],
            'password' => $post['password'],
            'telepon' => $post['telp'],
            'level' => $post['level'],
        ];

        $query = $this->table($this->table)->update(['id_user' => $post['id']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
