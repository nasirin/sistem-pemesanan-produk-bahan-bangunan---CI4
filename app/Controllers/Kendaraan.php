<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_kendaraan;

class Kendaraan extends BaseController
{
    protected $mkendaraan;
    protected $mdriver;

    public function __construct()
    {
        $this->mkendaraan = new M_kendaraan();
        $this->mdriver = new M_driver();
    }

    public function index()
    {
        $data = [
            'active' => 'kendaraan',
            'open' => 'master',
            'kendaraan' => $this->mkendaraan->get()
        ];
        return view('pages/kendaraan', $data);
    }

    public function tambah()
    {
        $data = [
            'active' => 'kendaraan',
            'open' => 'master',
            'kode' => $this->mkendaraan->kd_ken(),
            'driver' => $this->mdriver->getStatus()
        ];
        return view('pages/kendaraan_tambah', $data);
    }

    public function insert()
    {
        $post = $this->request->getVar();
        $query = $this->mkendaraan->simpan($post);

        if ($query != true) {
            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect()->to('/kendaraan');
        } else {
            session()->setFlashdata('error', 'Gagal tambah data!');
            return redirect()->to('/kendaraan/tambah');
        }
    }

    public function ubah($id)
    {
        $data = [
            'active' => 'kendaraan',
            'open' => 'master',
            'kendaraan' => $this->mkendaraan->get($id),
            'driver' => $this->mdriver->getStatus()
        ];
        return view('pages/kendaraan_ubah', $data);
    }

    public function update($id)
    {
        $post = $this->request->getVar();
        $query = $this->mkendaraan->ubah($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data Berhasil di ubah');
            return redirect()->to('/kendaraan');
        } else {
            session()->setFlashdata('error', 'Gagal ubah data!');
            return redirect()->to('/kendaraan/ubah/'.$id);
        }
    }

    public function hapus($id)
    {
        $hapus = $this->mkendaraan->delete($id);

        if ($hapus) {
            session()->setFlashdata('success', 'Data berhasil hapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data');
        }

        return redirect()->to('/kendaraan');
    }
}
