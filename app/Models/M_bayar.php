<?php

namespace App\Models;

use CodeIgniter\Model;

class M_bayar extends Model
{
    protected $table      = 'bayar';
    protected $primaryKey = 'no_bayar';
    protected $allowedFields = ['no_bayar', 'kd_pel', 'no_so', 'jumlah', 'keterangan', 'created_bayar', 'updated_at'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('so', 'so.no_so = bayar.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
                ->where('no_bayar', $id)
                ->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('so', 'so.no_so = bayar.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
                ->get()->getResultArray();
        }
    }


    public function get_data($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->get()->getResultArray();
    }

    public function getStatus($id)
    {
        return $this->db->table($this->table)
            ->where('no_so', $id)
            ->orderBy($this->primaryKey, 'desc')
            ->limit(1)
            ->get()->getRowArray();
    }

    public function get_bayar($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('no_bayar', $id)
            ->orderBy('no_bayar', 'desc')
            ->limit(1)
            ->get()->getRowArray();
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
            'no_bayar' => $this->no_bayar(),
            'no_so' => $post['noso'],
            'kd_pel' => $post['pelanggan'],
            'keterangan' => 'belum dibayar',
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
        $jumlah = $this->get_bayar($post['nobar']);

        $total = $jumlah['harga_so'] - $jumlah['terbayar'];

        $data = [
            'no_bayar' => $this->no_bayar(),
            'no_so' => $post['noso'],
            'kd_pel' => $post['pelanggan'],
            'terbayar' => $post['terbayar'],
            'sisa' => $total - $post['terbayar'],
            'keterangan' => $post['keterangan'],
            'created_bayar' => $post['tgl_bayar']
        ];


        $query = $this->db->table($this->table)->insert($data);


        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function invoice($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->where('keterangan !=', 'belum dibayar')
            ->get()->getResultArray();
    }

    public function getKeterangan($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->orderBy('bayar.no_bayar', 'desc')->limit(1)
            ->get()->getRowArray();
    }
}
