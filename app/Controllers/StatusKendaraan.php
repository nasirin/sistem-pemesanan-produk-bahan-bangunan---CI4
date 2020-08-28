<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_StatusKendaraan;

class StatusKendaraan extends BaseController
{
    protected $msk;
    protected $msupir;

    public function __construct()
    {
        $this->msk = new M_StatusKendaraan();
        $this->msupir = new M_driver();
    }

    public function index()
    {
        $data = [
            'active' => 'sk',
            'open' => 'master',
            'sk' => $this->msk->get()
        ];
        return view('pages/kendaraan/status/statusKendaraan', $data);
    }

    public function ubah($id)
    {
        $data = [
            'active' => 'sk',
            'open' => 'master',
            'sk' => $this->msk->get($id),
            'supir' => $this->msupir->getStatus()
        ];
        return view('pages/kendaraan/status/statusKendaraan_ubah', $data);
    }

    public function update($id)
    {
        $post = $this->request->getVar();
        // dd($post);
        $query = $this->msk->ubah($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data Berhasil Di ubah');
            return redirect()->to('/sk');
        } else {
            session()->setFlashdata('error', 'Data Gagal Di ubah');
            return redirect()->to('/sk/ubah/' . $id);
        }
    }
}
