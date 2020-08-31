<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_kendaraan;
use App\Models\M_pelanggan;

class Laporan extends BaseController
{
    protected $mpelanggan;
    protected $mkendaraan;
    protected $msupir;

    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->mkendaraan = new M_kendaraan();
        $this->msupir = new M_driver();
    }

    public function expedisiTerkirim()
    {
    }

    public function pelanggan()
    {
        $data = [
            'pelanggan' => $this->mpelanggan->findAll(),
            'no' => 1,
        ];

        return view('pages/laporan/pelanggan', $data);
    }

    public function kendaraan()
    {
        $data = [
            'kendaraan' => $this->mkendaraan->get(),
            'no' => 1,
        ];

        return view('pages/laporan/kendaraan', $data);
    }

    public function supir()
    {
        $data = [
            'supir' => $this->msupir->findAll(),
            'no' => 1,
        ];

        return view('pages/laporan/supir', $data);
    }

    public function sk()
    {
        $data = [
            'sk' => $this->mkendaraan->get(),
            'no' => 1,
        ];

        return view('pages/laporan/sk', $data);
    }

    public function PembayaranPerperiode()
    {
        return view('pages/laporan/pembayaranPerperiode');
    }

    public function PengirimanPerperiode()
    {
        return view('pages/laporan/pengirimanPerperiode');
    }
}
