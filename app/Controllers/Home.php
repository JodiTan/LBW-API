<?php namespace App\Controllers;

use App\Models\HomeModel;

class Movies extends BaseController
{
    protected $homeModel;

    public function __construct()
    {
        $this->homeModel = new HomeModel();
    }

	public function index()
	{
		$data = [
            'title' => 'MovieLBW | Home',
            'latest' => $this->homeModel->getLatest(),
        ];
        return view('pages/home', $data);
    }

	//--------------------------------------------------------------------

}