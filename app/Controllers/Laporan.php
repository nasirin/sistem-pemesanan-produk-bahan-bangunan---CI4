<?php

namespace App\Controllers;

use App\Models\M_bayar;
use App\Models\M_driver;
use App\Models\M_kendaraan;
use App\Models\M_pelanggan;
use App\Models\M_sj;
use App\Models\M_SO;

class Laporan extends BaseController
{
    protected $mpelanggan;
    protected $mkendaraan;
    protected $msupir;
    protected $msj;
    protected $mbayar;
    protected $mso;

    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->mkendaraan = new M_kendaraan();
        $this->msupir = new M_driver();
        $this->msj = new M_sj();
        $this->mbayar = new M_bayar();
        $this->mso = new M_SO();
    }

    public function expedisiTerkirim()
    {
    }

    public function pelanggan()
    {
        $data = [
            'pelanggan' => $this->mpelanggan->findAll(),
            'no' => 1,
        ];

        return view('pages/laporan/pelanggan', $data);
    }

    public function kendaraan()
    {
        $data = [
            'kendaraan' => $this->mkendaraan->get(),
            'no' => 1,
        ];

        return view('pages/laporan/kendaraan', $data);
    }

    public function supir()
    {
        $data = [
            'supir' => $this->msupir->findAll(),
            'no' => 1,
        ];

        return view('pages/laporan/supir', $data);
    }

    public function sk()
    {
        $data = [
            'sk' => $this->mkendaraan->get(),
            'no' => 1,
        ];

        return view('pages/laporan/sk', $data);
    }

    public function terbilang($x)
    {
        $angka = array("", " Satu", " Dua", " Tiga", " Empat", " Lima", " Enam", " Tujuh", " Delapan", " Sembilan", " Sepuluh", " Sebelas");
        if ($x < 12) {
            return "" . $angka[$x];
        } elseif ($x < 20) {
            return $this->terbilang($x - 10) . " Belas";
        } elseif ($x < 100) {
            return $this->terbilang($x / 10) . " Puluh" . $this->terbilang($x % 10);
        } elseif ($x < 200) {
            return " Seratus" . $this->terbilang($x - 100);
        } elseif ($x < 1000) {
            return $this->terbilang($x / 100) . " Ratus" . $this->terbilang($x % 100);
        } elseif ($x < 2000) {
            return " Seribu" . $this->terbilang($x - 1000);
        } elseif ($x < 1000000) {
            return $this->terbilang($x / 1000) . " Ribu" . $this->terbilang($x % 1000);
        } elseif ($x < 1000000000) {
            return $this->terbilang($x / 1000000) . " Juta" . $this->terbilang($x % 1000000);
        } elseif ($x < 1000000000000) {
            return $this->terbilang($x / 1000000000) . " Milyar" . $this->terbilang($x % 1000000000);
        } elseif ($x < 1000000000000000) {
            return $this->terbilang($x / 1000000000000) . " Trilyun" . $this->terbilang($x % 1000000000000);
        }
    }

    public function PengirimanPerperiode()
    {
        $post = $this->request->getVar();
        $laporan = $this->msj->laporanKirim($post);

        if ($laporan) {
            foreach ($laporan as $data) {
                $terbilang[] = $data['harga_so'] * $data['jumlah_pesanan'];
            };

            $total = array_sum($terbilang);
            $data = [
                'laporan' => $this->msj->laporanKirim($post),
                'terbilang' => $this->terbilang($total),
                'total' => $total
            ];
            return view('pages/laporan/pengirimanPerperiode', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function PembayaranPerperiode()
    {
        $post = $this->request->getVar();
        $laporan = $this->mso->laporanBayar($post);

        if ($laporan) {
            foreach ($laporan as $data) {
                $terbilang[] = $data['jumlah_pesanan'] * $data['harga_so'];
            }
            $total = array_sum($terbilang);
            $data = [
                'bayar' => $this->mso->laporanBayar($post),
                'terbilang' => $this->terbilang($total),
                'total' => $total
            ];
            return view('pages/laporan/pembayaranPerperiode', $data);
        } else {
            return redirect()->to('/');
        }
        // $laporan = $this->mbayar->laporanBayar($post);
        // dd($laporan);
    }

    public function invoice()
    {
        $post = $this->request->getVar('noso');
        $invoice = $this->mbayar->invoice($post);
        $keterangan = $this->mbayar->getKeterangan($post);
        // dd($invoice);        

        if ($keterangan['keterangan'] != 'belum dibayar') {

            foreach ($invoice as $data) {
                $terbilang[] = $data['jumlah_pesanan'] * $data['harga_so'];
                $nama = $data['nama_pel'];
                $so = $data['no_so'];
                $total = $data['harga_so'];
            }

            $data = [
                'invoice' => $this->mbayar->invoice($post),
                'terbilang' => $this->terbilang($total),
                'total' => $total,
                'nama' => $nama,
                'noso' => $so,
            ];
            return view('pages/laporan/pembayaran', $data);
        } else {
            session()->setFlashdata('success', 'Pembelian belum terbayar');
            return redirect()->to('/bayar');
        }
    }

    public function invoicesj()
    {
        $post = $this->request->getVar('noso');
        $invoicesj = $this->msj->get_detail($post);
        $so = $this->mso->get($post);

        // foreach ($invoicesj as $data) {
        //     $noso = $data['no_so'];
        //     $statusSO = $data['status_so'];
        //     $tgl_so = $data['created_so'];
        //     $pelanggan = $data['nama_pel'];
        //     $angkutan = $data['harga_so'];
        // }

        $terbilang = $so['harga_so'];
        $data = [
            'invoicesj' => $invoicesj,
            'so' => $so,
            'terbilang' => $this->terbilang($terbilang)
        ];

        return view('pages/laporan/pengiriman', $data);
    }

    // LAPORAN PELANGGAN

    public function cetakSO()
    {
        $post = $this->request->getVar();
        $laporan = $this->msj->laporanKirimPel($post);
        // dd($laporan);

        if ($laporan) {
            foreach ($laporan as $data) {
                $terbilang[] = $data['harga_so'] * $data['jumlah_pesanan'];
            };

            $total = array_sum($terbilang);
            $data = [
                'laporan' => $laporan,
                'terbilang' => $this->terbilang($total),
                'total' => $total
            ];
            return view('pages/laporan/pengirimanPerperiode', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function cetakPemb()
    {
        $post = $this->request->getVar();
        $laporan = $this->mso->laporanBayarPel($post);
        // dd($laporan);

        if ($laporan) {
            foreach ($laporan as $data) {
                $terbilang[] = $data['jumlah_pesanan'] * $data['harga_so'];
            }
            $total = array_sum($terbilang);
            $data = [
                'bayar' => $laporan,
                'terbilang' => $this->terbilang($total),
                'total' => $total
            ];
            return view('pages/laporan/pembayaranPerperiode', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
