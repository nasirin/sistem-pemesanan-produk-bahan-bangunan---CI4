<?php

namespace App\Controllers;

use App\Models\M_auth;

class Auth extends BaseController
{
    protected $mauth;
    public function __construct()
    {
        $this->mauth = new M_auth();
    }

    public function index()
    {
        if (session()->get('username') == null) {
            return view('pages/login');
        }else {
            return redirect()->to('/');
        }
    }

    public function login()
    {
        $post = $this->request->getVar();
        $query = $this->mauth->get($post);

        if ($query) {
            $data = [
                'username' => $query['username'],
                'level' => $query['level']
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
