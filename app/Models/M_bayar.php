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
                ->orderBy($this->primaryKey, 'desc')
                ->get()->getResultArray();
        }
    }


    public function get_data($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->where('terbayar !=', null)
            // ->where('bayar.keterangan =', 'belum dibayar')
            ->get()->getResultArray();
    }

    public function get_data2($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->get()->getResultArray();
    }

    public function get_data_ubah($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->get()->getRowArray();
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

    public function totalTerbayar($noso)
    {
        return $this->db->table($this->table)->selectSum('terbayar')
            ->where('no_so', $noso)
            ->where('terbayar !=', null)
            ->get()->getRowArray();
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

    public function ganti($post)
    {
        $data = [
            'kd_pel' => $post['pelanggan'],
            'keterangan' => 'belum dibayar',
            'created_bayar' => date('ymd')
        ];

        return $this->update(['no_so', $post['noso']], $data);
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

        $total = $jumlah['totalHargaSO'] - $jumlah['terbayar'];

        $data = [
            'no_bayar' => $this->no_bayar(),
            'no_so' => $post['noso'],
            'kd_pel' => $post['pelanggan'],
            'terbayar' => $post['terbayar'],
            'sisa' => $total - $post['terbayar'],
            'keterangan' => $post['keterangan'],
            'created_bayar' => $post['tgl_bayar']
        ];


        return $this->db->table($this->table)->insert($data);
    }

    public function ubahBayar($post)
    {
        $jumlah = $this->get_bayar($post['nobar']);
        // dd($jumlah);

        $total = $jumlah['totalHargaSO'] - $post['terbayar'];

        $data = [
            'terbayar' => $post['terbayar'],
            'sisa' => $total,
            'keterangan' => $post['keterangan'],
            'created_bayar' => $post['tgl_bayar']
        ];


        return $this->db->table($this->table)
            ->where($this->primaryKey, $post['nobar'])
            ->update($data);
    }

    public function invoice($id)
    {
        return $this->db->table($this->table)
            ->join('so', 'so.no_so = bayar.no_so')
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->where('bayar.no_so', $id)
            ->where('keterangan !=', 'belum dibayar')
            ->where('terbayar !=', null)
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

    public function hapus($id)
    {
        $this->db->table($this->table)
            ->where('no_so', $id)
            ->delete();
    }

    public function laporanBayar($post)
    {
        return $this->db->table($this->table)
            ->join('pelanggan', 'pelanggan.kd_pel = bayar.kd_pel', 'left')
            ->join('so', 'so.no_so = bayar.no_so', 'left')
            ->where('created_bayar >= ', $post['start'])
            ->where('created_bayar <= ', $post['end'])
            ->where('keterangan ', $post['status'])
            ->where('terbayar !=', null)
            ->get()->getResultArray();
    }

    public function ubahStatus($post, $id)
    {
        $data = [
            'keterangan' => $post['keterangan'],
            'updated_at' => date('ymd')
        ];

        $this->update([$this->primaryKey => $id], $data);
    }
}
