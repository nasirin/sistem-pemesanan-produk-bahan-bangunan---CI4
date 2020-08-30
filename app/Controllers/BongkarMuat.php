<?php

namespace App\Controllers;

use App\Models\M_sj;
use App\Models\M_SO;

class BongkarMuat extends BaseController
{
    protected $msj;
    protected $mso;
    protected $sesi;

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
                'active' => 'bm',
                'open' => 'tansaksi',
                'sj' => $this->msj->get(),
            ];

            return view('pages/bongkar-muat/bongkarMuat', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'bm',
                'open' => 'tansaksi',
                'noso' => $this->mso->get(),
                'nosj' => $this->msj->no_sj()
            ];

            return view('pages/bongkar-muat/bongkarMuat_tambah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function detail()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $data = [
                'active' => 'bm',
                'open' => 'tansaksi',
                'sj' => $this->msj->get_data($post['noso']),
            ];

            return view('pages/bongkar-muat/bongkarMuat_detail', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ubah()
    {
        if ($this->sesi) {
            $sj = $this->request->getVar('nosj');
            $so = $this->request->getVar('noso');
            // dd($post);
            // dd($this->mso->get($post));
            $data = [
                'active' => 'bm',
                'open' => 'tansaksi',
                'sj' => $this->msj->get($sj),
                'so' => $this->mso->get($so)
            ];

            return view('pages/bongkar-muat/bongkarMuat_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ganti($id)
    {
        if ($this->sesi) {

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
        } else {
            return redirect()->to('/auth');
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
