<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_kendaraan;
use App\Models\M_pelanggan;

class KirimBarang extends BaseController
{
    protected $mpelanggan;
    protected $mkendaraan;
    protected $msopir;

    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->mkendaraan = new M_kendaraan();
        $this->msopir = new M_driver();
    }

    public function index()
    {
        $data = [
            'active' => 'kirim',
            'open' => 'tansaksi',
        ];

        return view('pages/kirimBarang', $data);
    }

    public function tambah()
    {
        $data = [
            'active' => 'kirim',
            'open' => 'tansaksi',
            'pelanggan' => $this->mpelanggan->get(),
            'kendaraan' => $this->mkendaraan->get()
        ];

        return view('pages/kirimBarang_tambah', $data);
    }

    public function autofill()
    {
        $post = $_GET['no_perk'];
        $query = $this->mkendaraan->autofill($post);
        $data = array(
            'nopol' => $query['no_plat'],
            'supir' => $query['nama_supir'],
        );
        echo json_encode($data);
    }
}
