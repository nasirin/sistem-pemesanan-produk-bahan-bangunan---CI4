<?php

namespace App\Models;

use CodeIgniter\Model;

class M_StatusKendaraan extends Model

{
    protected $table = 'kendaraan';
    protected $allowedFields = ['no_perk', 'no_plat', 'jenis', 'tonase', 'volume', 'posisi', 'kd_driver', 'status_ekspedisi', 'updated_at'];
    
    // protected $table =""
    public function get($id = null)
    {
        if ($id) {
            return $this->db->table('kendaraan')
                ->join('supir', 'supir.kd_supir = kendaraan.kd_driver', 'left')
                ->where('no_perk', $id)
                ->get()->getRowArray();
        } else {
            return $this->db->table('kendaraan')
                ->join('supir', 'supir.kd_supir = kendaraan.kd_driver', 'left')->get()->getResultArray();
        }
    }

    public function ubah($post)
    {
        $data = [
            'kd_driver' => $post['supir'],
            'no_plat' => $post['nopol'],
            'posisi' => $post['posisi'],
            'status_ekspedisi' => $post['status'],
            'updated_at' => date('ymd')
        ];

        $query = $this->db->table($this->table)->where('no_perk', $post['noperk'])->update($data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
