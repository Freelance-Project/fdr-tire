<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NewsContent;

class DefaultController extends Controller
{
    public function __construct(NewsContent $news)
	{
		
		$this->model = $news;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		
		$getSlide = $this->model->orderBy('type','asc')->get();
		$data['resultSlide'] = $getSlide;

		$getNews = $this->model->whereCategory('news')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultNews'] = $getNews;

		$getEvent = $this->model->whereCategory('event')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultEvent'] = $getEvent;

		return view('frontend.default.index', $data);
    }

}
