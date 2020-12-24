<?php namespace App\Controllers;

use App\Models\MoviesModel;

class Movies extends BaseController
{
    protected $moviesModel;

    public function __construct()
    {
        $this->moviesModel = new MoviesModel();
    }

	public function index($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Now Playing',
            'nowPlaying' => $this->moviesModel->getNowPlaying($page),
            'page' => $page
        ];
        return view('pages/movies', $data);
    }

	//--------------------------------------------------------------------

}
