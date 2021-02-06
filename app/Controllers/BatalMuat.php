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
                'sj' => $this->msj->get_detail(),
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
            // $query = $this->mso->batal($post['noso']);
            // $this->msj->delete($post['noso']);
            $this->msj->batal($post['noso']);
            session()->setFlashdata('success', 'Pengiriman Dibatalkan');
            return redirect()->to('/batal');
        } else {
            return redirect()->to('/auth');
        }
    }
}
