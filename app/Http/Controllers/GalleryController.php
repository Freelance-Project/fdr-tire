<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
	{
		
		// $this->model = $news;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		
		// return view('frontend.gallery.index');
    }

    public function getPhoto($slug=false){
    	if($slug){

			return view('frontend.gallery.photo-detail');

    	}else{

			return view('frontend.gallery.photo');


    	}
    }

    public function getVideo($slug=false){

    	if($slug){

			return view('frontend.gallery.video-detail');

    	}else{
			return view('frontend.gallery.video');

    	}

    }

}
