<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_user;

class User extends BaseController
{
    protected $muser;
    protected $sisi;

    public function __construct()
    {
        $this->muser = new M_user();
        $this->sisi = session()->get('level') == 'admin';
    }

    public function index()
    {
        if ($this->sisi) {
            $data = [
                'active' => 'user',
                'open' => 'master',
                'user' => $this->muser->get()
            ];
            return view('pages/user/user', $data);
        } else {
            return redirect()->to('auth');
        }
    }

    // TAMBAH

    public function tambah()
    {
        if ($this->sisi) {
            $data = [
                'active' => 'user',
                'open' => 'master',
            ];
            return view('pages/user/user_tambah', $data);
        } else {
            return redirect()->to('auth');
        }
    }

    public function insert()
    {
        if ($this->sisi) {
            $post = $this->request->getVar();
            // dd($post);
            $query = $this->muser->simpan($post);

            if ($query == true) {
                session()->setFlashdata('success', 'Data Berhasil di tambah');
                return redirect('user');
            } else {
                session()->setFlashdata('error', 'Gagal tambah data!');
                return redirect('user/tambah');
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
                'active' => 'user',
                'open' => 'master',
                'user' => $this->muser->get($id),
            ];
            return view('pages/user/user_ubah', $data);
        } else {
            return redirect()->to('/auth');
        }
    }

    public function update()
    {
        if ($this->sisi) {
            $post = $this->request->getVar();
            // dd($post);
            $query = $this->muser->ubah($post);

            if ($query == true) {
                session()->setFlashdata('success', 'Data berhasil diubah');
                return redirect()->to('/user');
            } else {
                session()->setFlashdata('error', 'Gagal mengubah data');
                return redirect('/user/ubah/' . $post['id']);
            }
        } else {
            return redirect()->to('/auth');
        }
    }

    // HAPUS

    public function hapus($id)
    {
        if ($this->sisi) {
            $hapus = $this->muser->delete($id);

            if ($hapus) {
                session()->setFlashdata('success', 'Data berhasil hapus');
            } else {
                session()->setFlashdata('error', 'Gagal menghapus data');
            }
            return redirect()->to('/user');
        } else {
            return redirect()->to('/auth');
        }
    }
}
