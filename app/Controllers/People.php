<?php namespace App\Controllers;

use App\Models\PeopleModel;

class People extends BaseController
{
    protected $peopleModel;

    public function __construct()
    {
        $this->peopleModel = new PeopleModel();
    }

	public function index($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Popular Peoples',
            'popularPeoples' => $this->peopleModel->getPopularPeople($page),
            'page' => $page
        ];
        return view('people/popular', $data);
    }
    
    public function profile($peopleId)
    {
        $data = [
            'title' => 'MovieLBW | Profile',
            'profile' => $this->peopleModel->getPeopleProfile($peopleId),
            'movieCredits' => $this->peopleModel->getMovieCredits($peopleId),
            'tvCredits' => $this->peopleModel->getTVCredits($peopleId)
        ];
        return view('people/profile', $data);
    }

	//--------------------------------------------------------------------

}
