<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		if (session()->get('level') != null) {
			$data =[
				'active' => 'home',
				'open' => ''
			];
			return view('pages/home',$data);
		}else {
			return redirect()->to('/auth');
		}
	}
}
