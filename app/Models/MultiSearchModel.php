<?php

namespace App\Models;

use CodeIgniter\Model;

class MultiSearchModel extends Model
{
    protected $apiKey = '2695db7da16dc8dc807f8deb23b67567';

    public function getSearchResult($page = 1, $query) {
        $ch = curl_init();
        $escaped_query = rawurlencode($query);
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/search/multi?api_key=$this->apiKey&query=$escaped_query&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $searchResult = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $searchResult;
    }
}
