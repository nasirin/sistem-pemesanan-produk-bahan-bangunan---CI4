<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data =[
			'active' => 'home'
		];
		return view('pages/home',$data);
	}

	//--------------------------------------------------------------------

}
