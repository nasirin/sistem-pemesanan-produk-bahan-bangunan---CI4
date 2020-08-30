<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_StatusKendaraan;

class StatusKendaraan extends BaseController
{
    protected $msk;
    protected $msupir;
    protected $sesi;

    public function __construct()
    {
        $this->msk = new M_StatusKendaraan();
        $this->msupir = new M_driver();
        $this->sesi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'sk',
                'open' => 'master',
                'sk' => $this->msk->get()
            ];
            return view('pages/kendaraan/status/statusKendaraan', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ubah($id)
    {
        if ($this->sesi) {
            $data = [
                'active' => 'sk',
                'open' => 'master',
                'sk' => $this->msk->get($id),
                'supir' => $this->msupir->getStatus()
            ];
            return view('pages/kendaraan/status/statusKendaraan_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function update($id)
    {
        if ($this->sesi) {
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
        } else {
            return redirect()->to('/auth');
        }
    }
}
