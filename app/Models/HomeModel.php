<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $api_key = '2695db7da16dc8dc807f8deb23b67567';
    protected $maximum_value = -1;

    public function getLatest($page = 1){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/upcoming?api_key=$this->api_key&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getMaximumPopularity() {
        if ($this->maximum_value == -1) {
            $firstPage = $this->getLatest(1)["results"];
            $this->maximum_value = max(array_column($firstPage, 'popularity'));
        }
        return $this->maximum_value;
    }

}