<?php namespace App\Controllers;

use App\Models\MoviesModel;

class Movies extends BaseController
{
    protected $moviesModel;

    public function __construct()
    {
        $this->moviesModel = new MoviesModel();
    }

	public function nowPlaying($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Now Playing',
            'nowPlaying' => $this->moviesModel->getNowPlaying($page)[0],
            'maximumPopularity' => $this->moviesModel->getNowPlaying($page)[1],
            'page' => $page,
            'position' => 1
        ];
        return view('movies/nowPlaying', $data);
    }

    public function upcoming($page = 1) {
        $data = [
            'title' => 'MovieLBW | Upcoming',
            'nowPlaying' => $this->moviesModel->getUpcoming($page)[0],
            'maximumPopularity' => $this->moviesModel->getUpcoming($page)[1],
            'page' => $page,
            'position' => 1
        ];
        return view('movies/upcoming', $data);
    }

    public function recommendation($page = 1) {
        $data = [
            'title' => 'MovieLBW | Now Playing',
            'topRated' => $this->moviesModel->getTopRated($page),
            'page' => $page,
            'position' => 1
        ];
        return view('movies/recommendation', $data);
    }

    public function details($movieId)
    {
        $data = [
            'title' => 'MovieLBW | Movie Details',
            'details' => $this->moviesModel->getDetails($movieId)[0],
            'credits' => $this->moviesModel->getDetails($movieId)[1]
        ];
        return view('movies/details', $data);
    }

	//--------------------------------------------------------------------

}
