<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $api_key = '2695db7da16dc8dc807f8deb23b67567';

    public function getPopularPeople() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/popular?api_key=$this->api_key");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getPeopleProfile($id) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$id?api_key=$this->api_key");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }
}
