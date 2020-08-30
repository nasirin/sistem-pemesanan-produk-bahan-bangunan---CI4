<?php

namespace App\Models;

use CodeIgniter\Model;

class M_auth extends Model
{
    protected $table = 'user';

    public function get($post)
    {
        return $this->db->table($this->table)
            ->where('username', $post['username'])
            ->where('password', $post['password'])
            ->get()->getRowArray();
    }
}
