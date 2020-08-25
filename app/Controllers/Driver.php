<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_driver;

class Driver extends BaseController
{
    protected $mdriver;

    public function __construct()
    {
        $this->mdriver = new M_driver();
    }
    public function index()
    {
        $data = [
            'active' => 'driver',
            'open' => 'master',
            'driver' => $this->mdriver->get()
        ];
        return view('pages/driver', $data);
    }

    // TAMBAH

    public function tambah()
    {
        $data = [
            'active' => 'driver',
            'open' => 'master',
            'kode' => $this->mdriver->kd_supir(),
        ];
        return view('pages/driver_tambah', $data);
    }

    public function insert()
    {
        $post = $this->request->getVar();
        $query = $this->mdriver->simpan($post);

        if ($query != true) {
            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect('driver');
        } else {
            session()->setFlashdata('error', 'Gagal tambah data!');
            return redirect('driver/tambah');
        }
    }

    // UBAH


    public function ubah($id)
    {
        $data = [
            'active' => 'driver',
            'open' => 'master',
            'supir' => $this->mdriver->get($id),
        ];
        return view('pages/driver_ubah', $data);
    }

    public function update($id)
    {
        $post = $this->request->getVar();
        $query = $this->mdriver->ubah($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect('driver');
        } else {
            session()->setFlashdata('error', 'Gagal mengubah data');
            return redirect('driver/ubah/' . $id);
        }
    }

    // HAPUS

    public function hapus($id)
    {
        $hapus = $this->mdriver->delete($id);

        if ($hapus) {
            session()->setFlashdata('success', 'Data berhasil hapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data');
        }

        return redirect('driver');
    }
}
