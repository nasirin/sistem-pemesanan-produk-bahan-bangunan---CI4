<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data =[
			'active' => 'home',
			'open' => ''
		];
		return view('pages/home',$data);
	}

	//--------------------------------------------------------------------

}
