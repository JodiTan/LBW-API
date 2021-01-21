<?php namespace App\Controllers;

use App\Models\MoviesModel;
use App\Models\TVModel;
use App\Models\PeopleModel;

class Home extends BaseController
{
    protected $movieModel;
    protected $tvModel;
    protected $peopleModel;

    public function __construct()
    {
        $this->movieModel = new MoviesModel();
        $this->tvModel = new TVModel();
        $this->peopleModel = new PeopleModel();
    }

    public function home() {
        $data = [
            'title' => 'MovieLBW | Home',
            'nowPlaying' => $this->movieModel->getNowPlaying(1)[0],
            'onAir' => $this->tvModel->getOnAir(1)[0],
            'popular' => $this->peopleModel->getPopularPeople(1)[0],
            'positon' => 0
        ];
        return view('home', $data);
    }

	//--------------------------------------------------------------------

}