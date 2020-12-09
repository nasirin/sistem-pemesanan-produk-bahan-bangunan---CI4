<?php

namespace App\Controllers;

use App\Models\M_driver;
use App\Models\M_kendaraan;

class Kendaraan extends BaseController
{
    protected $mkendaraan;
    protected $mdriver;
    protected $sesi;

    public function __construct()
    {
        $this->mkendaraan = new M_kendaraan();
        $this->mdriver = new M_driver();
        $this->sesi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'kendaraan',
                'open' => 'master',
                'kendaraan' => $this->mkendaraan->get()
            ];
            // dd($data['kendaraan']);
            return view('pages/kendaraan/kendaraan', $data);
        } else {
            return redirect()->to('/atuh');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'kendaraan',
                'open' => 'master',
                'kode' => $this->mkendaraan->kd_ken(),
                'driver' => $this->mdriver->getStatus()
            ];
            return view('pages/kendaraan/kendaraan_tambah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function insert()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            // dd($post);
            $query = $this->mkendaraan->simpan($post);

            if ($query != true) {
                session()->setFlashdata('success', 'Data Berhasil di tambah');
                return redirect()->to('/kendaraan');
            } else {
                session()->setFlashdata('error', 'Gagal tambah data!');
                return redirect()->to('/kendaraan/tambah');
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    public function ubah($id)
    {
        if ($this->sesi) {
            $data = [
                'active' => 'kendaraan',
                'open' => 'master',
                'kendaraan' => $this->mkendaraan->get($id),
                'driver' => $this->mdriver->getStatus()
            ];
            return view('pages/kendaraan/kendaraan_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function update($id)
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $query = $this->mkendaraan->ubah($post);

            if ($query == true) {
                session()->setFlashdata('success', 'Data Berhasil di ubah');
                return redirect()->to('/kendaraan');
            } else {
                session()->setFlashdata('error', 'Gagal ubah data!');
                return redirect()->to('/kendaraan/ubah/' . $id);
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    public function hapus($id)
    {
        if ($this->sesi) {
            $hapus = $this->mkendaraan->delete($id);

            if ($hapus) {
                session()->setFlashdata('success', 'Data berhasil hapus');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data');
            }

            return redirect()->to('/kendaraan');
        } else {
            return redirect()->to('/auth');
        }
    }
}
