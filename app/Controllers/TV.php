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
            'maximumPopularity' => $this->tvModel->getMaximumPopularity(),
            'page' => $page,
            'position' => 2
        ];
        return view('tv/onAir', $data);
    }

    public function recommendation($page = 1) {
        $data = [
            'title' => 'MovieLBW | TV',
            'topRated' => $this->tvModel->getTopRated($page),
            'page' => $page,
            'position' => 2
        ];
        return view('tv/recommendation', $data);
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
