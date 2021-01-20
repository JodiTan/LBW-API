<?php

namespace App\Models;

use CodeIgniter\Model;

class TVModel extends Model
{
    protected $apiKey = '2695db7da16dc8dc807f8deb23b67567';
    protected $maximumValueOnAir = -1;

    public function getOnAir($page = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/tv/on_the_air?api_key=$this->apiKey&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $onAirTVs = json_decode(curl_exec($ch), true);
        curl_close($ch);

        // Set maximum value for on air tv shows.
        if ($this->maximumValueOnAir == -1) {
            $this->maximumValueOnAir = max(array_column($onAirTVs['results'], 'popularity'));
        }
        return array($onAirTVs, $this->maximumValueOnAir);
    }

    public function getTopRated($page = 1) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/tv/top_rated?api_key=$this->apiKey&page=$page");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $output;
    }

    public function getDetails($tvId) {
        $ch = curl_init();
        // Get TV details.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/tv/$tvId?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $details = json_decode(curl_exec($ch), true);

        // Get TV credits.
        curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/tv/$tvId/credits?api_key=$this->apiKey");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $credits = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return array($details, $credits);
    }
}
