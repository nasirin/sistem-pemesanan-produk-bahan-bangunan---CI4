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
        // $bayar = $this->mbayar->get();
        // dd($bayar);

        if ($this->sesi) {
            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                'bayar' => $this->mso->get()
            ];

            return view('pages/pembayaran/pembayaran', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $post = $this->request->getVar('nobar');
            // $bayar = $this->mbayar->get_bayar($post);
            // dd($post);

            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                'bayar' => $this->mbayar->get_bayar($post)
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
            $this->mbayar->bayar($post);
            if ($post['keterangan'] == 'lunas') {
                $status = 'lunas';
                $this->mso->ubah_status($post, $status);
                $dataAwal = $this->mbayar->first($post['noso']);
                $data = $dataAwal['no_bayar'];
                // dd($data);
                $this->mbayar->ubahStatus($post, $data);
            }
            session()->setFlashdata('success', 'Pembayaran Berhasil');
            return redirect()->to('/bayar');
        } else {
            return redirect()->to('/auth');
        }
    }
    public function edit()
    {
        if ($this->sesi) {
            $post = $this->request->getVar('nobar');

            $data = [
                'active' => 'bayar',
                'open' => 'tansaksi',
                'bayar' => $this->mbayar->get_bayar($post)
            ];

            return view('pages/pembayaran/pembayaran_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ubah()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();

            $query = $this->mbayar->ubahBayar($post);

            if ($post['keterangan'] == 'dp') {
                $status = 'proses';
                $this->mso->ubah_status($post, $status);

                $dataAwal = $this->mbayar->first($post['noso']);
                $data = $dataAwal['no_bayar'];

                $this->mbayar->ubahStatus($post, $data);
            } elseif ($post['keterangan'] == 'lunas') {
                $status = 'lunas';
                $this->mso->ubah_status($post, $status);

                $dataAwal = $this->mbayar->first($post['noso']);
                $data = $dataAwal['no_bayar'];
                // dd($data);
                $this->mbayar->ubahStatus($post, $data);
            }

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
        $so = $this->mso->get($id);
        $bayar = $this->mbayar->get_data($id);
        // dd($query);
        $data = array(
            'pelanggan' => $so['nama_pel'],
            'total' => $so['harga_so'],
            'terbayar' => $bayar['terbayar'],
            'sisa' => $bayar['sisa'],
            // 'sj' => $bayar['no_sj'],
            'pel' => $so['kd_pel'],
            // 'jumlah' => $query['jumlah']
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
                'noso' => $post['noso'],
                'bayar' => $this->mbayar->get_data2($post['noso']),
                'status' => $this->mbayar->getStatus($post['noso'])
                // 'pel' => $this->mso->get(),
                // 'nobar' => $this->mbayar->no_bayar()
            ];

            return view('pages/pembayaran/pembayaran_detail', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function hapus($id)
    {
        $this->mbayar->delete($id);
        session()->setFlashdata('success', 'Data Pembayaran Terhapus');
        return redirect()->to('/bayar');
    }
}
