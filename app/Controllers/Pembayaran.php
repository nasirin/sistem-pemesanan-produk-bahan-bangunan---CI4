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

    public function __construct()
    {
        $this->mso = new M_SO();
        $this->mkirim = new M_kirim();
        $this->mbayar = new M_bayar();
        $this->mpel = new M_pelanggan();
    }

    public function index()
    {
        // dd($this->mkirim->get());

        $data = [
            'active' => 'bayar',
            'open' => 'tansaksi',
            'so' => $this->mkirim->get()
        ];

        return view('pages/pembayaran/pembayaran', $data);
    }

    public function tambah()
    {
        // dd($this->mkirim->get($id));

        $data = [
            'active' => 'bayar',
            'open' => 'tansaksi',
            'so' => $this->mso->get(),
            'pel' => $this->mso->get()
        ];

        return view('pages/pembayaran/pembayaran_tambah', $data);
    }

    public function simpan($id)
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

    public function cariBySo()
    {
        $id = $_GET['no_so'];
        $query = $this->mkirim->get($id);
        $data = array(
            'pelanggan' => $query['nama_pel'],
            'total' => $query['jumlah'],
            'terbayar' => $query['terbayar'],
            'sisa' => $query['jumlah'] - $query['terbayar'],
        );
        echo json_encode($data);
    }

    // function Terbilang($satuan)
    // {
    //     $jumlah = $_POST['jumlah'];
    //     $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    //     if ($satuan < 12) {
    //         return " " . $huruf[$satuan];
    //     } elseif ($satuan < 20) {
    //         return Terbilang($satuan - 10) . " belas";
    //     } elseif ($satuan < 100)
    //         return Terbilang($satuan / 10) . " puluh" .
    //             Terbilang($satuan % 10);
    //     elseif ($satuan < 200)
    //         return "seratus" . Terbilang($satuan - 100);
    //     elseif ($satuan < 1000)
    //         return Terbilang($satuan / 100) . " ratus" .
    //             Terbilang($satuan % 100);
    //     elseif ($satuan < 2000)
    //         return "seribu" . Terbilang($satuan - 1000);
    //     elseif ($satuan < 1000000)
    //         return Terbilang($satuan / 1000) . " ribu" .
    //             Terbilang($satuan % 1000);
    //     elseif ($satuan < 1000000000)
    //         return Terbilang($satuan / 1000000) . " juta" .
    //             Terbilang($satuan % 1000000);
    //     elseif ($satuan >= 1000000000)
    //         echo "hasil terbilang tidak dapat di proses, nilai terlalu besar";
    // }
}
