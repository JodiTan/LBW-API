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
            'title' => 'MovieLBW',
            'popularPeoples' => $this->peopleModel->getPopularPeople($page),
            'page' => $page
        ];
        return view('pages/peoples', $data);
    }
    
    public function profile($people_id)
    {
        $data = [
            'title' => 'MovieLBW',
            'profile_people' => $this->peopleModel->getPeopleProfile($people_id)
        ];
        return view('', $data);
    }
	//--------------------------------------------------------------------

}
