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

	//--------------------------------------------------------------------

}
