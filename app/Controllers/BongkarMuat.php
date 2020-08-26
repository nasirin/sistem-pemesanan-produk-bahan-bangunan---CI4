<?php namespace App\Controllers;

class BongkarMuat extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'driver',
            'open' => 'master',
            'driver' => $this->mdriver->get()
        ];
        return view('pages/driver', $data);
    }
}