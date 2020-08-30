<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_pelanggan;

class Pelanggan extends BaseController
{
    protected $mpelanggan;
    protected $sisi;

    public function __construct()
    {
        $this->mpelanggan = new M_pelanggan();
        $this->sisi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sisi) {
            $data = [
                'active' => 'pelanggan',
                'open' => 'master',
                'pelanggan' => $this->mpelanggan->get()
            ];
            return view('pages/pelanggan/pelanggan', $data);
        } else {
            return redirect()->to('auth');
        }
    }

    // TAMBAH

    public function tambah()
    {
        if ($this->sisi) {
            $data = [
                'active' => 'pelanggan',
                'open' => 'master',
                'kode' => $this->mpelanggan->kd_pel(),
            ];
            return view('pages/pelanggan/pelanggan_tambah', $data);
        } else {
            return redirect()->to('auth');
        }
    }

    public function insert()
    {
        if ($this->sisi) {
            $post = $this->request->getVar();
            $query = $this->mpelanggan->simpan($post);

            if ($query != true) {
                session()->setFlashdata('success', 'Data Berhasil di tambah');
                return redirect('pelanggan');
            } else {
                session()->setFlashdata('error', 'Gagal tambah data!');
                return redirect('pelanggan/tambah');
            }
        } else {
            return redirect()->to('auth');
        }
    }

    // UBAH


    public function ubah($id)
    {
        if ($this->sisi) {
            $data = [
                'active' => 'pelanggan',
                'open' => 'master',
                'pelanggan' => $this->mpelanggan->get($id),
            ];
            return view('pages/pelanggan/pelanggan_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function update($id)
    {
        if ($this->sisi) {
            $post = $this->request->getVar();
            $query = $this->mpelanggan->ubah($post);

            if ($query == true) {
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect('pelanggan');
            } else {
                session()->setFlashdata('error', 'Gagal mengubah data');
                return redirect('pelanggan/ubah/' . $id);
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    // HAPUS

    public function hapus($id)
    {
        if ($this->sisi) {
            $hapus = $this->mpelanggan->delete($id);

            if ($hapus) {
                session()->setFlashdata('success', 'Data berhasil hapus');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data');
            }

            return redirect('pelanggan');
        } else {
            return redirect()->to('/auth');
        }
    }
}
