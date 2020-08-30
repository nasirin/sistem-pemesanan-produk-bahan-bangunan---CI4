<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_driver;

class Driver extends BaseController
{
    protected $mdriver;
    protected $sesi;

    public function __construct()
    {
        $this->mdriver = new M_driver();
        $this->sesi = session()->get('level') == 'admin';
    }
    public function index()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'driver',
                'open' => 'master',
                'driver' => $this->mdriver->get()
            ];
            return view('pages/supir/driver', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function tambah()
    {
        if ($this->sesi) {
            $data = [
                'active' => 'driver',
                'open' => 'master',
                'kode' => $this->mdriver->kd_supir(),
            ];
            return view('pages/supir/driver_tambah', $data);
        }else {
            return redirect()->to('/auth');
        }
    }

    public function insert()
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $query = $this->mdriver->simpan($post);
    
            if ($query != true) {
                session()->setFlashdata('success', 'Data Berhasil di tambah');
                return redirect('driver');
            } else {
                session()->setFlashdata('error', 'Gagal tambah data!');
                return redirect('driver/tambah');
            }
        }else {
            return redirect()->to('/auth');
        }
    }
    
    public function ubah($id)
    {
        if ($this->sesi) {            
            $data = [
                'active' => 'driver',
                'open' => 'master',
                'supir' => $this->mdriver->get($id),
            ];
            return view('pages/supir/driver_ubah', $data);
        }else {
            return redirect()->to('/auth');
        }
    }

    public function update($id)
    {
        if ($this->sesi) {
            $post = $this->request->getVar();
            $query = $this->mdriver->ubah($post);
    
            if ($query == true) {
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect('driver');
            } else {
                session()->setFlashdata('error', 'Gagal mengubah data');
                return redirect('driver/ubah/' . $id);
            }
        }else {
            return redirect()->to('/auth');
        }
    }

    // HAPUS

    public function hapus($id)
    {
        if ($this->sesi) {        
            $hapus = $this->mdriver->delete($id);
    
            if ($hapus) {
                session()->setFlashdata('success', 'Data berhasil hapus');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data');
            }
    
            return redirect('driver');
        }else {
            return redirect()->to('/auth');
        }
    }
}
