<?php

namespace App\Controllers;

use App\Models\M_bayar;
use App\Models\M_driver;
use App\Models\M_kendaraan;
use App\Models\M_kirim;
use App\Models\M_pelanggan;
use App\Models\M_sj;
use App\Models\M_SO;

class KirimBarang extends BaseController
{
    protected $mpelanggan;
    protected $mkendaraan;
    protected $msopir;
    protected $mso;
    protected $msj;
    protected $mbayar;
    protected $mkirim;
    protected $sesi;


    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->mkendaraan = new M_kendaraan();
        $this->msopir = new M_driver();
        $this->mso = new M_SO();
        $this->msj = new M_sj();
        $this->mbayar = new M_bayar();
        $this->mkirim = new M_kirim(); //pake
        $this->sesi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sesi) {
            // $sj = $this->msj->get();
            // dd($sj);

            $data = [
                'active' => 'kirim',
                'open' => 'tansaksi',
                'sj' => $this->msj->get(),
            ];

            return view('pages/pengiriman-barang/kirimBarang', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'kirim',
                'open' => 'tansaksi',
                'pelanggan' => $this->mpelanggan->get(),
                'kendaraan' => $this->mkendaraan->get(),
                'noso' => $this->mso->no_so(),
                'nosj' => $this->msj->no_sj(),
                'nobar' => $this->mbayar->no_bayar(),
            ];

            return view('pages/pengiriman-barang/kirimBarang_tambah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function simpan()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $tonase = $this->mkendaraan->get($post['no-perk']);
            $tonas = $tonase['tonase'];

            if ($post['bm'] >= $tonas) {
                $tersisa = $post['bm'] - $tonas;
                $query = $this->mso->simpan($post);
                $query = $this->msj->simpan($post, $tersisa, $tonas);
            }

            if ($query == false) {
                session()->setFlashdata('success', 'Data Berhasil di tambah');
                return redirect()->to('/kirim');
            } else {
                session()->setFlashdata('error', 'Gagal tambah data!');
                return redirect()->to('/kirim/tambah');
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    public function autofill1()
    {
        $post = $_GET['no_perk'];
        $query = $this->mkendaraan->autofill($post);
        $data = array(
            'nopol' => $query['no_plat'],
            'supir' => $query['nama_supir'],
        );
        echo json_encode($data);
    }

    public function autofill2()
    {
        $post = $_GET['kd_pel'];
        $query = $this->mpelanggan->get($post);
        $data = array(
            'penerima' => $query['nama_pel'],
        );
        echo json_encode($data);
    }
}
