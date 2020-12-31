<?php namespace App\Controllers;

use App\Models\TVModel;

class TV extends BaseController
{
    protected $tvModel;

    public function __construct()
    {
        $this->tvModel = new TVModel();
    }

	public function index($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | TV',
            'onAir' => $this->tvModel->getOnAir($page),
            'page' => $page
        ];
        return view('tv/onAir', $data);
    }
    
    public function details($tvId)
    {
        $data = [
            'title' => 'MovieLBW | TV',
            'information' => $this->tvModel->getTVInformation($tvId),
            'credits' => $this->tvModel->getTVCredits($tvId)
        ];
        return view('tv/details', $data);
    }

	//--------------------------------------------------------------------

}
