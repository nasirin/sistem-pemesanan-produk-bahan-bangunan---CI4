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


    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->mkendaraan = new M_kendaraan();
        $this->msopir = new M_driver();
        $this->mso = new M_SO();
        $this->msj = new M_sj();
        $this->mbayar = new M_bayar();
        $this->mkirim = new M_kirim();
    }

    public function index()
    {
        // dd($this->mkirim->get());
        $data = [
            'active' => 'kirim',
            'open' => 'tansaksi',
            'kirimbarang' => $this->mkirim->get(),
        ];

        return view('pages/kirimBarang', $data);
    }

    public function tambah()
    {
        $data = [
            'active' => 'kirim',
            'open' => 'tansaksi',
            'pelanggan' => $this->mpelanggan->get(),
            'kendaraan' => $this->mkendaraan->get(),
            'noso' => $this->mso->no_so(),
            'nosj' => $this->msj->no_sj(),
            'nobar' => $this->mbayar->no_bayar(),
        ];

        return view('pages/kirimBarang_tambah', $data);
    }

    public function simpan()
    {
        $post = $this->request->getVar();
        // dd($post);
        $query = $this->mso->simpan($post);
        $query = $this->mbayar->simpan($post);
        $query = $this->msj->simpan($post);
        $query = $this->mkirim->simpan($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect()->to('/kirim');
        } else {
            session()->setFlashdata('error', 'Gagal tambah data!');
            return redirect()->to('/kirim/simpan');
        }
    }

    // public function ubah($id)
    // {
    //     // dd($this->mkirim->get($id));

    //     $data = [
    //         'active' => 'kirim',
    //         'open' => 'tansaksi',
    //         'pelanggan' => $this->mpelanggan->get(),
    //         'kendaraan' => $this->mkendaraan->get(),
    //         // 'noso' => $this->mso->no_so(),
    //         // 'nosj' => $this->msj->no_sj(),
    //         // 'nobar' => $this->mbayar->no_bayar(),
    //         'kirim' => $this->mkirim->get($id)
    //     ];

    //     return view('pages/kirimBarang_ubah', $data);
    // }

    // public function ganti($id)
    // {
    //     $post = $this->request->getVar();
    //     // dd($post);
    //     $query = $this->mso->ubah($post);
    //     $query = $this->mbayar->ubah($post);
    //     $query = $this->msj->ubah($post);
    //     // $query = $this->mkirim->ubah($post);

    //     if ($query == true) {
    //         session()->setFlashdata('success', 'Data Berhasil di ubah');
    //         return redirect()->to('/kirim');
    //     } else {
    //         session()->setFlashdata('error', 'Gagal ubah data!');
    //         return redirect()->to('/kirim/ubah/' . $id);
    //     }
    // }

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
