<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_pelanggan;

class Pelanggan extends BaseController
{
    protected $mpelanggan;

    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
    }
    public function index()
    {
        $data = [
            'active' => 'pelanggan',
            'open' => 'master',
            'pelanggan' => $this->mpelanggan->get()
        ];
        return view('pages/pelanggan', $data);
    }

    // TAMBAH

    public function tambah()
    {
        $data = [
            'active' => 'pelanggan',
            'open' => 'master',
            'kode' => $this->mpelanggan->kd_pel(),
        ];
        return view('pages/pelanggan_tambah', $data);
    }

    public function insert()
    {
        $post = $this->request->getVar();
        $query = $this->mpelanggan->simpan($post);

        if ($query != true) {
            session()->setFlashdata('success', 'Data Berhasil di tambah');
            return redirect('pelanggan');
        } else {
            session()->setFlashdata('error', 'Gagal tambah data!');
            return redirect('pelanggan/tambah');
        }
    }

    // UBAH


    public function ubah($id)
    {
        $data = [
            'active' => 'pelanggan',
            'open' => 'master',
            'pelanggan' => $this->mpelanggan->get($id),
        ];
        return view('pages/pelanggan_ubah', $data);
    }

    public function update($id)
    {
        $post = $this->request->getVar();
        $query = $this->mpelanggan->ubah($post);

        if ($query == true) {
            session()->setFlashdata('success', 'Data berhasil diubah');
            return redirect('pelanggan');
        } else {
            session()->setFlashdata('error', 'Gagal mengubah data');
            return redirect('pelanggan/ubah/' . $id);
        }
    }

    // HAPUS

    public function hapus($id)
    {
        $hapus = $this->mpelanggan->delete($id);

        if ($hapus) {
            session()->setFlashdata('success', 'Data berhasil hapus');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus data');
        }

        return redirect('pelanggan');
    }
}
