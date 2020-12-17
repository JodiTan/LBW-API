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

	public function movie($id)
	{
		$movie_data = file_get_contents('https://api.themoviedb.org/3/movie/'.$id.'?api_key=9ec4544e480b12bcd199a69fafef0d69');
		$movie_data = json_decode($movie_data);
		$data = [
			'title' => 'MovieLBW',
			'movie_data' => $movie_data
		];
		return view('pages/movie', $data);
	}
	//--------------------------------------------------------------------

}
