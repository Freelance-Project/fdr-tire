<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
	{
		
		// $this->model = $news;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		
		return view('frontend.about.index');
    }

    public function getCsr()
    {
		
		return view('frontend.about.csr');
    }

    public function getVision()
    {
		
		return view('frontend.about.vision');
    }

    public function getRacingExperience()
    {
		
		return view('frontend.about.racing-experience');
    }
}
