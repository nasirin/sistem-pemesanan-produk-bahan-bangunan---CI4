<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sj extends Model
{
    protected $table      = 'sj';
    protected $primaryKey = 'no_sj';
    protected $allowedFields = ['no_sj', 'no_so', 'no_perk', 'berat', 'tujuan', 'muatan', 'created_at', 'status_sj'];

    public function no_sj()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(no_sj,3)) AS kd From sj");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "SJ" . '-' . $kd;
    }

    public function simpan($post)
    {
        $data = [
            'no_sj' => $post['nosj'],
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'berat' => $post['bm'],
            'tujuan' => $post['jurusan'],
            'muatan' => $post['jm'],
            // 'status_sj'=>$post['status'],
            'created_at' => date('ymd')
        ];

        $query = $this->insert($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function ubah($post)
    {
        $data = [
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'berat' => $post['bm'],
            'tujuan' => $post['jurusan'],
            'muatan' => $post['jm'],
            // 'status_sj'=>$post['status'],
            'created_at' => date('ymd')
        ];

        $query = $this->update(['no_sj' => $post['nosj']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
