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
                'sj' => $this->msj->getAllData(),
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

    public function ubah($id)
    {
        if ($this->sesi) {
            $sj = $this->msj->get_data($id);
            // $getKendaraan = $this->mkendaraan->get($sj['no_perk']);
            // dd($getKendaraan);
            $data = [
                'active' => 'kirim',
                'open' => 'tansaksi',
                'sj' => $this->msj->get_data($id),
                'bayar' => $this->mbayar->get_data_ubah($id),
                'pelanggan' => $this->mpelanggan->get(),
                'kendaraan' => $this->mkendaraan->get(),
                'getKendaraan' => $this->mkendaraan->get($sj['no_perk'])
            ];

            return view('pages/pengiriman-barang/kirimBarang_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function simpan()
    {

        if ($this->sesi) {
            $post = $this->request->getVar();
            // dd($post);
            $this->mso->simpan($post);
            $this->msj->simpan($post);
            $this->mbayar->simpan($post);

            // $tonase = $this->mkendaraan->get($post['no-perk']);
            // $tonas = $tonase['tonase'];

            // if ($post['bm'] >= $tonas) {
            //     $tersisa = $post['bm'] - $tonas;
            //     $this->mso->simpan($post);
            //     $this->msj->simpan($post, $tersisa, $tonas);
            //     $this->mbayar->simpan($post);
            // }

            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect()->to('/kirim');
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ganti($id)
    {

        if ($this->sesi) {
            $post = $this->request->getVar();
            // dd($post);
            $tonase = $this->mkendaraan->get($post['no-perk']);
            $tonas = $tonase['tonase'];

            if ($post['bm'] >= $tonas) {
                $tersisa = $post['bm'] - $tonas;
                $this->mso->ganti($post);
                $this->msj->ganti($post, $tersisa, $tonas);
                $this->mbayar->ganti($post);
            }

            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect()->to('/kirim');
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

    public function hapus($id)
    {
        $this->mso->delete($id);
        $this->msj->hapus($id);
        $this->mbayar->hapus($id);

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/kirim');
    }
}
