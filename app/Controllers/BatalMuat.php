<?php

namespace App\Controllers;

use App\Models\M_sj;
use App\Models\M_SO;

class BatalMuat extends BaseController
{

    protected $msj;
    protected $sesi;
    protected $mso;

    public function __construct()
    {
        $this->msj = new M_sj();
        $this->mso = new M_SO();
        $this->sesi = session()->get('level') == 'admin';
    }


    public function index()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'batal',
                'open' => 'tansaksi',
                'sj' => $this->msj->get(),
                // 'so' => $this->mso->get($post)
            ];

            return view('pages/batalMuat', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function batal()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $query = $this->mso->batal($post['noso']);

            if ($query == true) {
                session()->setFlashdata('success', 'Pengiriman Dibatalkan');
                return redirect()->to('/batal');
            } else {
                session()->setFlashdata('error', 'Pengiriman gagal di batalkan');
                return redirect()->to('/batal');
            }
        } else {
            return redirect()->to('/auth');
        }
    }
}
