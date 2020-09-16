<?php

namespace App\Models;

use CodeIgniter\Model;

class M_sj extends Model
{
    protected $table      = 'sj';
    protected $primaryKey = 'no_sj';
    protected $allowedFields = ['no_sj', 'no_so', 'no_perk', 'kd_pel', 'terkirim', 'tersisa', 'jurusan', 'muatan', 'created_sj', 'created_tiba', 'update_at'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->where('no_sj', $id)->get()->getRowArray();
        } else {
            $query = $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left');
            return $query->get()->getResultArray();
        }
    }

    public function get_detail($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->where('sj.no_so', $id)->get()->getResultArray();
        } else {
            $query = $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left');
            return $query->get()->getResultArray();
        }
    }

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

    public function simpan($post, $tersisa, $terkirim)
    {

        $data = [
            'no_sj' => $this->no_sj(),
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'kd_pel' => $post['pelanggan'],
            'terkirim' => $terkirim,
            'tersisa' => $tersisa,
            'jurusan' => $post['jurusan'],
            'muatan' => $post['jm'],
            'created_sj' => $post['tgl-kirim']
        ];

        $query = $this->insert($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function simpanMuat($post)
    {
        $data = [
            'no_sj' => $this->no_sj(),
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'kd_pel' => $post['pelanggan'],
            'berat' => $post['bm'],
            'terkirim' => $post['terkirim'],
            'tersisa' => $post['tersisa'],
            'jurusan' => $post['jurusan'],
            'muatan' => $post['jm'],
            'created_sj' => $post['tgl-kirim']
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

    public function ubah_BM($post)
    {
        $data = [
            // 'status_sj' => 'kirim',
            'created_tiba' => $post['tgl-tiba']
        ];

        $query = $this->db->table($this->table)->where('no_sj', $post['nosj'])->update($data);
        // $this->update(['no_sj' => $post['nosj']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function batal($id)
    {
        $data = [
            'status_sj' => 'batal'
        ];

        $query = $this->db->table($this->table)->where('no_sj', $id)->update($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
