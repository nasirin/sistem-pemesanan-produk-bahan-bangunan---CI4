<?php

namespace App\Models;

use CodeIgniter\Model;

class M_driver extends Model
{
    protected $table      = 'supir';
    protected $primaryKey = 'kd_supir';
    protected $allowedFields = ['kd_supir', 'no_perk', 'nama_supir', 'jln_supir', 'no_jln_supir', 'kota_supir', 'kelurahan_supir', 'kecamatan_supir', 'kodepos_supir', 'notelp_supir', 'status_supir'];

    public function kd_supir()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(kd_supir,3)) AS kd From supir");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "D" . $kd;
    }

    public function get($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere([$this->primaryKey => $id])->getRowArray();
        }
    }

    public function getStatus()
    {
        return $this->getWhere(['status_supir'=>'Tersedia'])->getResultArray();
    }

    public function simpan($post)
    {
        $data = [
            'kd_supir' => $post['kd'],
            'nama_supir' => $post['nama'],
            'notelp_supir' => $post['notelp'],
            'jln_supir' => $post['jln'],
            'no_jln_supir' => $post['no-jln'],
            'kota_supir' => $post['kota'],
            'kecamatan_supir' => $post['kecamatan'],
            'kelurahan_supir' => $post['kelurahan'],
            'kodepos_supir' => $post['kodepos'],
            'status_supir' => $post['status'],
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
            'kd_supir' => $post['kd'],
            'nama_supir' => $post['nama'],
            'notelp_supir' => $post['notelp'],
            'jln_supir' => $post['jln'],
            'no_jln_supir' => $post['no-jln'],
            'kota_supir' => $post['kota'],
            'kecamatan_supir' => $post['kecamatan'],
            'kelurahan_supir' => $post['kelurahan'],
            'kodepos_supir' => $post['kodepos'],
            'status_supir' => $post['status'],
            'updated_at' => date('ymd')
        ];

        $query = $this->table($this->table)->update(['kd_supir' => $post['kd']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
