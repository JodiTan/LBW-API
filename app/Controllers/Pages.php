<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
            'title' => 'MovieLBW'
        ];
        return view('pages/home', $data);
	}

	public function movies()
	{
		$data = [
			'title' => 'MovieLBW'
		];
		return view('pages/movies', $data);
	}

	public function recommendation()
	{
		$data = [
			'title' => 'MovieLBW'
		];
		return view('pages/recommendation', $data);
	}

	public function peoples()
	{
		$data = [
			'title' => 'MovieLBW'
		];
		return view('pages/peoples', $data);
	}
	//--------------------------------------------------------------------

}
