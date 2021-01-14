<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $api_key = '2695db7da16dc8dc807f8deb23b67567';
    protected $maximum_value = -1;

    public function getPopularPeople($page = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/popular?api_key=$this->api_key&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getMaximumPopularity() {
        if ($this->maximum_value == -1) {
            $firstPage = $this->getPopularPeople(1)["results"];
            $this->maximum_value = max(array_column($firstPage, 'popularity'));
        }
        return $this->maximum_value;
    }

    public function getPeopleProfile($peopleId) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId?api_key=$this->api_key");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getMovieCredits($peopleId) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId/movie_credits?api_key=$this->api_key");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getTVCredits($peopleId) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId/tv_credits?api_key=$this->api_key");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }
}
