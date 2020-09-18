<?php

namespace App\Controllers;

use App\Models\M_auth;
use App\Models\M_pelanggan;

class Auth extends BaseController
{
    protected $mauth;
    protected $mpel;
    public function __construct()
    {
        $this->mauth = new M_auth();
        $this->mpel = new M_pelanggan();
    }

    public function index()
    {
        if (session()->get('username') == null) {
            return view('pages/login');
        } else {
            return redirect()->to('/');
        }
    }

    public function login()
    {
        $post = $this->request->getVar();
        $query = $this->mauth->get($post);
        $pel = $this->mpel->login($post);

        if ($query) {
            $data = [
                'username' => $query['username'],
                'level' => $query['level'],
            ];
            session()->set($data);
            return redirect()->to('/');
        } elseif ($pel) {
            $data = [
                'username' => $pel['nama_pel'],
                'level' => 'pelanggan',
                'id' => $pel['kd_pel']
            ];
            session()->set($data);
            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
