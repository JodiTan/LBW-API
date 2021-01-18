<?php namespace App\Controllers;

use App\Models\RecommendationModel;

class Recommendation extends BaseController
{
    protected $recommendationModel;

    public function __construct()
    {
        $this->recommendationModel = new RecommendationModel();
    }

	public function index($page = 1)
	{
		$data = [
            'title' => 'MovieLBW | Recommendation',
            'recommendation' => $this->recommendationModel->getTopRated($page),
            'maximumPopularity' => $this->recommendationModel->getMaximumPopularity(),
            'page' => $page,
            'position' => 3
        ];
        return view('pages/recommendation', $data);
    }

	//--------------------------------------------------------------------

}
