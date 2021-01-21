<?php namespace App\Controllers;

use App\Models\TVModel;

class TV extends BaseController
{
    protected $tvModel;

    public function __construct()
    {
        $this->tvModel = new TVModel();
    }

	public function onAir($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | TV',
            'onAir' => $this->tvModel->getOnAir($page)[0],
            'maximumPopularity' => $this->tvModel->getOnAir($page)[1],
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
            'information' => $this->tvModel->getDetails($tvId)[0],
            'credits' => $this->tvModel->getDetails($tvId)[1]
        ];
        return view('tv/details', $data);
    }

	//--------------------------------------------------------------------

}
