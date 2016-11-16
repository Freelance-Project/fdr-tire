<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NewsContent;

class GalleryController extends Controller
{
    public function __construct()
	{
		
		$this->model = new NewsContent;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		$data['photo'] = $this->model->whereCategory('foto')->where('status','publish')->take(3)->get();
        // dd($photo);
		return view('frontend.gallery.index',$data);
    }

    public function getPhoto($slug=false){

    	if($slug){

            $data['photo'] = $this->model->whereCategory('foto')->where('status','publish')->where('slug',$slug)->first();

			return view('frontend.gallery.photo-detail',$data);

    	}else{

            $data['racing']= $this->model->whereCategory('foto')->where('type',1)->where('status','publish')->take(3)->get();
            $data['event']= $this->model->whereCategory('foto')->where('type',2)->where('status','publish')->take(3)->get();

			return view('frontend.gallery.photo',$data);


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
