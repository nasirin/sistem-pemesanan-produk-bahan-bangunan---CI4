<?php

namespace App\Models;

use CodeIgniter\Model;

class M_SO extends Model
{
    protected $table      = 'so';
    protected $primaryKey = 'no_so';
    protected $allowedFields = ['no_so', 'kd_pel', 'status_so','created_so'];

    public function no_so()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(no_so,3)) AS kd From so");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "SO" . '-' . $kd;
    }

    public function simpan($post)
    {
        $data = [
            'no_so' => $post['noso'],
            'kd_pel' => $post['pelanggan'],
            'status_so' => 'belum lunas',
            'created_so' => $post['tgl-so']
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
            'kd_pel' => $post['pelanggan'],
            // 'status_so'=>$post['status'],
            'total_so' => $post['harga'],
            'updated_at' => date('ymd')
        ];

        $query = $this->update(['no_so' => $post['noso']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
