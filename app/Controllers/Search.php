<?php namespace App\Controllers;

use App\Models\MultiSearchModel;

class Search extends BaseController
{
    protected $searchModel;

    public function __construct()
    {
        $this->searchModel = new MultiSearchModel();
    }

	public function index($page = 1)
	{
        $query = $_GET["query"];
		$data = [
            'title' => 'MovieLBW | Search',
            'searchResult' => $this->searchModel->getSearchResult($page, $query),
            'page' => $page,
            'query' => $query
        ];
        return view('search/search', $data);
	}
    
	//--------------------------------------------------------------------

}
