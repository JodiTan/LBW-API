<?php namespace App\Controllers;

use App\Models\HomeModel;

class Home extends BaseController
{
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

	public function index($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Home',
            'home' => $this->homeModel->getLatest($page),
            'page' => $page
        ];
        return view('pages/home', $data);
    }

	//--------------------------------------------------------------------

}