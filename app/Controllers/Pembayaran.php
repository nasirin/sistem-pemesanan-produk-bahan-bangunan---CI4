<?php

namespace App\Controllers;

use App\Models\M_bayar;
use App\Models\M_kirim;
use App\Models\M_SO;

class Pembayaran extends BaseController
{
    protected $mso;
    protected $mkirim;
    protected $mbayar;

    public function __construct()
    {
        $this->mso = new M_SO();
        $this->mkirim = new M_kirim();
        $this->mbayar = new M_bayar();
    }

    public function index()
    {
        // dd($this->mkirim->get());

        $data = [
            'active' => 'bayar',
            'open' => 'tansaksi',
            'so' => $this->mkirim->get()
        ];

        return view('pages/pembayaran', $data);
    }

    public function ubah($id)
    {
        // dd($this->mkirim->get($id));

        $data = [
            'active' => 'bayar',
            'open' => 'tansaksi',
            'so' => $this->mkirim->get($id)
        ];

        return view('pages/pembayaran_ubah', $data);
    }

    public function ganti($id)
    {
        $post = $this->request->getVar();
        $query = $this->mbayar->bayar($post);
        $query = $this->mso->ubah_status($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Pembayaran Berhasil');
            return redirect()->to('/bayar');
        } else {
            session()->setFlashdata('error', 'Pembayaran Gagal');
            return redirect()->to('/bayar/ubah/' . $id);
        }
    }
}
