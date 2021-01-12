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
        return view('movies/nowPlaying', $data);
    }

    public function details($movieId)
    {
        $data = [
            'title' => 'MovieLBW | Movie Details',
            'details' => $this->moviesModel->getDetails($movieId),
            'credits' => $this->moviesModel->getCredits($movieId)
        ];
        return view('movies/details', $data);
    }

	//--------------------------------------------------------------------

}
