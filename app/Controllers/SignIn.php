<?php namespace App\Controllers;

use App\Models\SigningModel;

class SignIn extends BaseController
{
    protected $signingModel;

    public function __construct()
    {
        $this->signingModel = new SigningModel();
    }

	public function index()
	{
		$data = [
            'title' => 'MovieLBW | Sign In'
        ];
        return view('signing/signin', $data);
    }

    public function signIn()
    {
        
    }

	//--------------------------------------------------------------------

}
