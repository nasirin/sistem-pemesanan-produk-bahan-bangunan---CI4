<?php

namespace App\Controllers;

use App\Models\M_sj;

class BatalMuat extends BaseController
{

    protected $msj;

    public function __construct()
    {
        $this->msj = new M_sj();
    }


    public function index()
    {
        $data = [
            'active' => 'batal',
            'open' => 'tansaksi',
            'sj' => $this->msj->get(),
            // 'so' => $this->mso->get($post)
        ];

        return view('pages/batalMuat', $data);
    }

    public function batal($id)
    {
        $query = $this->msj->batal($id);

        if ($query == true) {
            session()->setFlashdata('success','Pengiriman Dibatalkan');
            return redirect()->to('/batal');
        }else {
            session()->setFlashdata('error','Pengiriman gagal di batalkan');
            return redirect()->to('/batal');
        }
    }
}
