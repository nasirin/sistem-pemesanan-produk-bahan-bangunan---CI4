<?php

namespace App\Models;

use CodeIgniter\Model;

class M_SO extends Model
{
    protected $table      = 'so';
    protected $primaryKey = 'no_so';
    protected $allowedFields = ['no_so', 'kd_pel', 'harga_so', 'jumlah_pesanan', 'status_so', 'created_so'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('pelanggan', 'pelanggan.kd_pel = so.kd_pel', 'left')
                ->where('no_so', $id)->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('pelanggan', 'pelanggan.kd_pel = so.kd_pel', 'left')
                ->get()->getResultArray();
        }
    }

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
            'harga_so' => $post['harga'],
            'jumlah_pesanan' => $post['bm'],
            'status_so' => 'proses',
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

    public function ubah_status($post)
    {
        // if ($post['keterangan'] != 'lunas') {
        //     $status = '';
        // }
        $data = [
            'status_so' => $post['keterangan'],
        ];

        $query = $this->update(['no_so' => $post['noso']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function batal($id)
    {
        $data = [
            'status_so' => 'batal'
        ];

        $query = $this->db->table($this->table)->where('no_so', $id)->update($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function laporanBayar($post)
    {
        return $this->db->table($this->table)
            ->join('pelanggan', 'pelanggan.kd_pel = so.kd_pel', 'left')
            ->where('created_so >= ', $post['start'])
            ->where('created_so <= ', $post['end'])
            ->where('status_so ', $post['status'])
            ->get()->getResultArray();
    }

    public function laporanBayarPel($post)
    {
        return $this->db->table($this->table)
            ->join('pelanggan', 'pelanggan.kd_pel = so.kd_pel', 'left')
            ->where('created_so >= ', $post['start'])
            ->where('created_so <= ', $post['end'])
            ->where('status_so ', $post['status'])
            ->where('so.kd_pel ', $post['id'])
            ->get()->getResultArray();
    }
}
