<?php

namespace App\Controllers;

use App\Models\M_bayar;
use App\Models\M_kirim;
use App\Models\M_pelanggan;
use App\Models\M_SO;

class Pembayaran extends BaseController
{
    protected $mso;
    protected $mkirim;
    protected $mbayar;
    protected $mpel;
    protected $sesi;

    public function __construct()
    {
        $this->mso = new M_SO();
        $this->mkirim = new M_kirim();
        $this->mbayar = new M_bayar();
        $this->mpel = new M_pelanggan();
        $this->sesi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                'so' => $this->mkirim->getDataBayar()
            ];

            return view('pages/pembayaran/pembayaran', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                'so' => $this->mso->get(),
                'pel' => $this->mso->get(),
                'nobar' => $this->mbayar->no_bayar()
            ];

            return view('pages/pembayaran/pembayaran_tambah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function simpan()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            // dd($post);
            $query = $this->mkirim->simpan($post);
            $query = $this->mbayar->bayar($post);
            $query = $this->mso->ubah_status($post);

            if ($query == true) {
                session()->setFlashdata('success', 'Pembayaran Berhasil');
                return redirect()->to('/bayar');
            } else {
                session()->setFlashdata('error', 'Pembayaran Gagal');
                return redirect()->to('/bayar/ubah');
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    public function cariBySo()
    {
        $id = $_GET['no_so'];
        $query = $this->mkirim->cariBySo($id);
        $data = array(
            'pelanggan' => $query['nama_pel'],
            'total' => $query['jumlah'],
            'terbayar' => $query['terbayar'],
            'sisa' => $query['sisa'],
            'sj' => $query['no_sj'],
            'pel' => $query['kd_pel'],
            'jumlah' => $query['jumlah']
        );
        echo json_encode($data);
    }

    public function detail()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();

            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                // 'so' => $this->mso->get(),
                // 'pel' => $this->mso->get(),
                // 'nobar' => $this->mbayar->no_bayar()
            ];

            return view('pages/pembayaran/pembayaran_detail', $data);
        } else {
            return redirect()->to('/auth');
        }
    }
}
