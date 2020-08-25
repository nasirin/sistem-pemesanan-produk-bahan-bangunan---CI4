<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pelanggan extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'kd_pel';
    protected $allowedFields = ['kd_pel', 'nama_pel', 'jln_pel', 'no_jln_pel', 'kota_pel', 'kelurahan_pel', 'kecamatan_pel', 'kodepos_pel', 'notelp_pel', 'cp_pel'];

    public function kd_pel()
    {
        $code = $this->db->query("SELECT MAX(RIGHT(kd_pel,3)) AS kd From pelanggan");
        $kd = "";
        if ($code->getFieldCount() > 0) {
            foreach ($code->getResult() as $k) {
                $tmp = ((int)$k->kd) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return "P" . $kd;
    }

    public function get($id = null)
    {
        if ($id == null) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kd_pel' => $id])->getRowArray();
        }
    }

    public function simpan($post)
    {
        $data = [
            'kd_pel' => $post['kd'],
            'nama_pel' => $post['nama'],
            'jln_pel' => $post['jln'],
            'no_jln_pel' => $post['no-jln'],
            'kota_pel' => $post['kota'],
            'kelurahan_pel' => $post['kelurahan'],
            'kecamatan_pel' => $post['kecamatan'],
            'kodepos_pel' => $post['kodepos'],
            'notelp_pel' => $post['notelp'],
            'cp_pel' => $post['cp'],
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
            'kd_pel' => $post['kd'],
            'nama_pel' => $post['nama'],
            'jln_pel' => $post['jln'],
            'no_jln_pel' => $post['no-jln'],
            'kota_pel' => $post['kota'],
            'kelurahan_pel' => $post['kelurahan'],
            'kecamatan_pel' => $post['kecamatan'],
            'kodepos_pel' => $post['kodepos'],
            'notelp_pel' => $post['notelp'],
            'cp_pel' => $post['cp'],
            'updated_at' => date('ymd')
        ];

        $query = $this->table($this->table)->update(['kd_pel' => $post['kd']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
