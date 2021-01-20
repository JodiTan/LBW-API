<?php

namespace App\Models;

use CodeIgniter\Model;

class MoviesModel extends Model
{
    protected $apiKey = '2695db7da16dc8dc807f8deb23b67567';
    protected $maximumValueNowPlaying = -1;

    public function getNowPlaying($page = 1){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/now_playing?api_key=$this->apiKey&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $playingMovies = json_decode(curl_exec($ch), true);
        curl_close($ch);

        // Set maximum value for now playing movies.
        if ($this->maximumValueNowPlaying == -1) {
            $this->maximumValueNowPlaying = max(array_column($playingMovies['results'], 'popularity'));
        }
        return array($playingMovies, $this->maximumValueNowPlaying);
    }

    public function getTopRated($page = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/top_rated?api_key=$this->apiKey&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getDetails($movieId) {
        $ch = curl_init();
        // Get movie details.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$movieId?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $details = json_decode(curl_exec($ch), true);

        // Get movie credits.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/$movieId/credits?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $credits = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return array($details, $credits);
    }
}
