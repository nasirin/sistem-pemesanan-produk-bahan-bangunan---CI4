<?php

namespace App\Controllers;

class StatusKendaraan extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'status',
            'open' => 'master',
            // 'pelanggan' => $this->mpelanggan->get()
        ];
        return view('pages/statusKendaraan',$data);
    }
}
