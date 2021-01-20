<?php

namespace App\Models;

use CodeIgniter\Model;

class PeopleModel extends Model
{
    protected $apiKey = '2695db7da16dc8dc807f8deb23b67567';
    protected $maximumValuePopular = -1;

    public function getPopularPeople($page = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/popular?api_key=$this->apiKey&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $popularPeople = json_decode(curl_exec($ch), true);
        curl_close($ch);

        // Set maximum value for popular people.
        if ($this->maximumValuePopular == -1) {
            $this->maximumValuePopular = max(array_column($popularPeople['results'], 'popularity'));
        }
        return array($popularPeople, $this->maximumValuePopular);
    }

    public function getDetails($peopleId) {
        $ch = curl_init();
        // Get people details.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $details = json_decode(curl_exec($ch), true);

        // Get movie credits.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId/movie_credits?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $movieCredits = json_decode(curl_exec($ch), true);

        // Get TV credits.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/person/$peopleId/tv_credits?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $tvCredits = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return array($details, $movieCredits, $tvCredits);
    }
}
