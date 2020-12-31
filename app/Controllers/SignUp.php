<?php namespace App\Controllers;

use App\Models\SigningModel;

class SignUp extends BaseController
{
    protected $signingModel;

    public function __construct()
    {
        $this->signingModel = new SigningModel();
    }

	public function index()
	{
		$data = [
            'title' => 'MovieLBW | Log In'
        ];
        return view('signing/signup', $data);
    }

	//--------------------------------------------------------------------

}
