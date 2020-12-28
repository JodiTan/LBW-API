<?php namespace App\Controllers;

use App\Models\RecommendationModel;

class Movies extends BaseController
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
            'page' => $page
        ];
        return view('pages/recommendation', $data);
    }

	//--------------------------------------------------------------------

}
