<?php

namespace App\Models;

use CodeIgniter\Model;
use Mpdf\Tag\Select;

class M_sj extends Model
{
    protected $table      = 'sj';
    protected $primaryKey = 'no_sj';
    protected $allowedFields = ['no_sj', 'no_so', 'no_perk', 'kd_pel', 'terkirim', 'tersisa', 'totalKirim', 'jurusan', 'muatan', 'status_sj', 'created_sj', 'created_tiba', 'update_at'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->where('no_sj', $id)->get()->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->get()->getResultArray();
        }
    }

    public function getAllData()
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->orderBy($this->primaryKey, 'desc')
            ->groupBy('so.no_so')
            ->get()->getResultArray();
    }

    public function get_data($id)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('sj.no_so', $id)
            ->get()->getRowArray();
    }

    public function getLastData($id)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('sj.no_so', $id)
            ->where('sj.status_sj !=', 'batal')
            ->orderBy($this->primaryKey, 'desc')
            ->get()->getRowArray();
    }

    public function getLastData2($id)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('sj.no_so', $id)
            // ->where('sj.status_sj !=', 'batal')
            ->orderBy($this->primaryKey, 'desc')
            ->get()->getRowArray();
    }

    public function kirimSisa($id)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('sj.no_so', $id)
            ->where('status_sj !=', 'batal')
            ->orderBy('no_sj', 'desc')
            ->limit(1)
            ->get()->getRowArray();
    }

    public function get_detail($id = null)
    {
        if ($id) {
            return $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->where('sj.no_so', $id)
                ->where('terkirim !=', 0)
                ->where('status_sj !=', 'batal')
                ->orderBy($this->primaryKey, 'desc')
                ->get()->getResultArray();
        } else {
            $query = $this->db->table($this->table)
                ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
                ->join('so', 'so.no_so = sj.no_so', 'left')
                ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
                ->where('terkirim !=', 0)
                ->orderBy($this->primaryKey, 'desc');
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

    public function simpan($post)
    {

        $data = [
            'no_sj' => $this->no_sj(),
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'kd_pel' => $post['pelanggan'],
            // 'terkirim' => $terkirim,
            'tersisa' => $post['bm'],
            'jurusan' => $post['jurusan'],
            'muatan' => $post['jm'],
            'created_sj' => $post['tgl-kirim']
        ];

        $this->insert($data);
    }

    public function ganti($post, $tersisa, $terkirim)
    {

        $data = [
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'kd_pel' => $post['pelanggan'],
            'terkirim' => $terkirim,
            'tersisa' => $tersisa,
            'jurusan' => $post['jurusan'],
            'muatan' => $post['jm'],
            'created_sj' => $post['tgl-kirim']
        ];

        return $this->update(['no_sj', $post['nosj']], $data);
    }

    public function getTotalTerkirim($id)
    {
        return $this->db->table($this->table)->selectSum('terkirim')
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('sj.no_so', $id)
            ->where('sj.status_sj !=', 'batal')
            ->orderBy($this->primaryKey, 'desc')
            ->get()->getRowArray();
    }

    public function simpanBM($post)
    {
        // $x = $this->kirimSisa($post['noso']);

        // $totalTerkirim = $this->getTotalTerkirim($post);
        // dd($x);

        // if ($post['tersisa'] - $post['muat'] == 0) {
        //     $status = 'kirim';
        // } else {
        //     $status = 'proses';
        // }
        $a = intval($post['terkirim']);
        $terkirim = $post['muat'] + $a;

        $data = [
            'no_sj' => $this->no_sj(),
            'no_so' => $post['noso'],
            'no_perk' => $post['no-perk'],
            'kd_pel' => $post['pelanggan'],
            'terkirim' => $post['muat'],
            'totalKirim' => $terkirim,
            'tersisa' => $post['bm'] - $terkirim,
            'jurusan' => $post['jurusan'],
            'muatan' => $post['jm'],
            'status_sj' => 'proses',
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
            // 'berat' => $post['bm'],
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
            'status_sj' => 'kirim',
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

    public function laporanKirim($post)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('created_sj >=', $post['start'])
            ->where('created_sj <=', $post['end'])
            ->where('status_sj', $post['status'])
            ->where('sj.status_sj !=', null)
            ->get()->getResultArray();
    }

    public function laporanKirimPel($post)
    {
        return $this->db->table($this->table)
            ->join('kendaraan', 'kendaraan.no_perk = sj.no_perk', 'left')
            ->join('so', 'so.no_so = sj.no_so', 'left')
            ->join('pelanggan', 'pelanggan.kd_pel = sj.kd_pel', 'left')
            ->where('so.kd_pel', $post['id'])
            ->where('created_sj >=', $post['start'])
            ->where('created_sj <=', $post['end'])
            ->where('status_so', $post['status'])
            ->get()->getResultArray();
    }

    public function hapus($id)
    {
        $this->db->table($this->table)
            ->where('no_so', $id)
            ->delete();
    }

    public function getDataByNoso($id)
    {
        return $this->db->table($this->table)->selectSum('terkirim')
            ->where('no_so', $id)
            ->where('status_sj !=', 'batal')
            // ->limit(1)
            // ->orderBy($this->primaryKey, 'desc')
            ->get()->getRowArray();
    }

    public function totalPesanan($id)
    {
        return $this->db->table($this->table)
            ->where('no_so', $id)
            ->where('status_sj', null)
            ->limit(1)
            ->orderBy($this->primaryKey, 'desc')
            ->get()->getRowArray();
    }
}
