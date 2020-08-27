<?php

namespace App\Controllers;

class BongkarMuat extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'bm',
            'open' => 'tansaksi',
            // 'kirimbarang' => $this->mkirim->get(),
        ];

        return view('pages/bongkarMuat', $data);
    }
}
