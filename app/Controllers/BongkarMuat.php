<?php

namespace App\Controllers;

use App\Models\M_sj;
use App\Models\M_SO;

class BongkarMuat extends BaseController
{
    protected $msj;
    protected $mso;
    public function __construct()
    {
        $this->msj = new M_sj();
        $this->mso = new M_SO();
    }

    public function index()
    {
        // dd($this->msj->get());
        // dd($this->mso->get());
        $data = [
            'active' => 'bm',
            'open' => 'tansaksi',
            'sj' => $this->msj->get(),
        ];

        return view('pages/bongkar-muat/bongkarMuat', $data);
    }

    public function tambah()
    {
        // dd($this->msj->get($id));
        $data = [
            'active' => 'bm',
            'open' => 'tansaksi',
            'noso' => $this->mso->get(),
            'nosj' => $this->msj->no_sj()
        ];

        return view('pages/bongkar-muat/bongkarMuat_tambah', $data);
    }

    public function detail($id)
    {
        // dd($this->msj->get($id));
        $data = [
            'active' => 'bm',
            'open' => 'tansaksi',
            'sj' => $this->msj->get_data($id),
        ];

        return view('pages/bongkar-muat/bongkarMuat_detail', $data);
    }

    public function ubah($id)
    {
        $post = $this->request->getVar('noso');
        // dd($this->mso->get($post));
        $data = [
            'active' => 'bm',
            'open' => 'tansaksi',
            'sj' => $this->msj->get($id),
            'so' => $this->mso->get($post)
        ];

        return view('pages/bongkar-muat/bongkarMuat_ubah', $data);
    }

    public function ganti($id)
    {
        $post = $this->request->getVar();
        // dd($post);
        $query = $this->msj->ubah_BM($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to('/BM');
        } else {
            session()->setFlashdata('error', 'Gagal Mengubah Data');
            return redirect()->to('/BM/ubah/' . $id);
        }
    }


    public function autofill3()
    {
        $id = $_GET['no_so'];
        $query = $this->mso->get($id);
        $data = array(
            'nama' => $query['nama_pel'],
            'tgl' => date('d M Y', strtotime($query['created_so'])),
        );
        echo json_encode($data);
    }
}
