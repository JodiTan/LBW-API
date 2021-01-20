<?php namespace App\Controllers;

use App\Models\PeopleModel;

class People extends BaseController
{
    protected $peopleModel;

    public function __construct()
    {
        $this->peopleModel = new PeopleModel();
    }

	public function popular($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Popular Peoples',
            'popularPeoples' => $this->peopleModel->getPopularPeople($page)[0],
            'maximumPopularity' => $this->peopleModel->getPopularPeople($page)[1],
            'page' => $page,
            'position' => 4
        ];
        return view('people/popular', $data);
    }
    
    public function details($peopleId)
    {
        $data = [
            'title' => 'MovieLBW | Profile',
            'profile' => $this->peopleModel->getDetails($peopleId)[0],
            'movieCredits' => $this->peopleModel->getDetails($peopleId)[1],
            'tvCredits' => $this->peopleModel->getDetails($peopleId)[2]
        ];
        return view('people/details', $data);
    }

	//--------------------------------------------------------------------

}
