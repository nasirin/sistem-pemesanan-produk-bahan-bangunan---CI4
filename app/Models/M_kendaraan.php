<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class M_kendaraan extends Model
{
    protected $table      = 'kendaraan';
    protected $primaryKey = 'no_perk';
    protected $allowedFields = ['no_perk', 'no_plat', 'jenis', 'tonase', 'volume', 'posisi', 'kd_driver', 'status_ekspedisi'];

    public function kd_ken()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(no_perk,3)) AS kd From $this->table");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "PRK" . $kd;
    }

    public function get($id = null)
    {
        if ($id == null) {
            return $this->db->table('kendaraan')
                ->join('supir', 'supir.kd_supir = kendaraan.kd_driver', 'left')
                ->get()->getResultArray();
        } else {
            return $this->db->table('kendaraan')
                ->join('supir', 'supir.kd_supir = kendaraan.kd_driver', 'left')
                ->where($this->primaryKey, $id)
                ->get()->getRowArray();
        }
    }

    public function simpan($post)
    {
        $data = [
            'no_perk' => $post['kd'],
            'kd_driver' => $post['driver'],
            'no_plat' => $post['noplat'],
            'jenis' => $post['jenis'],
            'tonase' => $post['berat'],
            'volume' => $post['panjang'],
            // 'posisi' => $post['posisi'],
            // 'status_kendaraan' => $post['status'],
            'created_at' => date('ymd')
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
            'no_perk' => $post['kd'],
            'kd_driver' => $post['driver'],
            'no_plat' => $post['noplat'],
            'jenis' => $post['jenis'],
            'tonase' => $post['berat'],
            'volume' => $post['panjang'],
            // 'posisi' => $post['posisi'],
            // 'status_kendaraan' => $post['status'],
            'updated_at' => date('ymd')
        ];

        $query = $this->table($this->table)->update(['no_perk' => $post['kd']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function autofill($post)
    {
        return $this->db->table('kendaraan')
            ->join('supir', 'supir.kd_supir = kendaraan.kd_driver', 'left')
            ->where('no_perk', $post)
            ->get()->getRowArray();
    }
}
