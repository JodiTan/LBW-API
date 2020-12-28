<?php

namespace App\Models;

use CodeIgniter\Model;

class RecommendationModel extends Model
{
    protected $api_key = '2695db7da16dc8dc807f8deb23b67567';

    public function getTopRated($page = 1){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/top_rated?api_key=$this->api_key&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }
}