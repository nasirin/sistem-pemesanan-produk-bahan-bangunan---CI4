<?php

namespace App\Models;

use CodeIgniter\Model;
// use App\Models\M_bayar;

class M_kirim extends Model
{
    // protected $mbayar;

    // public function __construct()
    // {
    //     $this->mbayar = new M_bayar();
    // }
    protected $table      = 'detail_kirim';
    protected $allowedFields = ['id_detail_kirim','no_so_detail', 'no_sj_detail', 'kd_pel_detail', 'no_bayar_detail', 'no_perk_detail'];

    public function get($id = null)
    {
        if ($id) {
            return $this->db->table('detail_kirim')
                ->join('so', 'so.no_so = detail_kirim.no_so_detail')
                ->join('sj', 'sj.no_sj = detail_kirim.no_sj_detail')
                ->join('pelanggan', 'pelanggan.kd_pel = detail_kirim.kd_pel_detail')
                ->join('bayar', 'bayar.no_bayar = detail_kirim.no_bayar_detail')
                ->join('kendaraan', 'kendaraan.no_perk = detail_kirim.no_perk_detail')
                ->where('no_so_detail', $id)
                ->get()->getRowArray();
        } else {
            return $this->db->table('detail_kirim')
                ->join('so', 'so.no_so = detail_kirim.no_so_detail')
                ->join('sj', 'sj.no_sj = detail_kirim.no_sj_detail')
                ->join('pelanggan', 'pelanggan.kd_pel = detail_kirim.kd_pel_detail')
                ->join('bayar', 'bayar.no_bayar = detail_kirim.no_bayar_detail')
                ->join('kendaraan', 'kendaraan.no_perk = detail_kirim.no_perk_detail')
                ->get()->getResultArray();
        }
    }

    public function simpan($post)
    {

        $data = [
            'no_so_detail' => $post['noso'],
            'no_sj_detail' => $post['nosj'],
            'kd_pel_detail' => $post['pelanggan'],
            'no_bayar_detail' => $post['nobar'],
            'no_perk_detail' => $post['no-perk']
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
            'no_so_detail' => $post['noso'],
            'no_sj_detail' => $post['nosj'],
            'kd_pel_detail' => $post['pelanggan'],
            'no_bayar_detail' => $post['nobar'],
            'no_perk_detail' => $post['no-perk']
        ];

        $query = $this->update(['id_detail_kirim' => $post['id_detail']], $data);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }
}
