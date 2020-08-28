<?php

namespace App\Models;

use CodeIgniter\Model;

class M_bayar extends Model
{
    protected $table      = 'bayar';
    protected $primaryKey = 'no_bayar';
    protected $allowedFields = ['no_bayar', 'no_so', 'jumlah', 'keterangan', 'created_bayar', 'updated_at'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('so', 'so.no_so = bayar.no_so')
                ->where('no_bayar', $id)
                ->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('so', 'so.no_so = bayar.no_so')
                ->get()->getRowArray();
        }
    }

    public function no_bayar()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(no_bayar,3)) AS kd From bayar");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "B" . '-' . $kd;
    }

    public function simpan($post)
    {
        $data = [
            'no_bayar' => $post['nobar'],
            'no_so' => $post['noso'],
            'jumlah' => $post['harga'],
            // 'keterangan' => $post['jurusan'],
            'created_bayar' => date('ymd')
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
            'jumlah' => $post['harga'],
            'berat' => $post['bm'],
            // 'keterangan' => $post['jurusan'],
            'updated_at' => date('ymd')
        ];

        $query = $this->update(['no_bayar' => $post['nobar']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function bayar($post)
    {
        $data = [
            'terbayar' => $post['terbayar'],
            'keterangan' => $post['status_so'],
            'updated_bayar' => $post['tgl_bayar']
        ];

        $query = $this->db->table($this->table)->where('no_bayar', $post['nobar'])->update($data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
