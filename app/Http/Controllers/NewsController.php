<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NewsContent;

class NewsController extends Controller
{
    public function __construct(NewsContent $news)
	{
		
		$this->model = $news;
		// view()->share('static',$this->getStatic());
		$this->paging = 25;
	}
	
    public function getIndex()
    {
		$getBanner = $this->model->whereIn('category',['news','tips','mediahighlights','fdrnews','event'])->whereStatus('publish')->where('type','=',4)->orderBy('type','asc')->get();
		$data['resultBanner'] = $getBanner;
		
		$getNews = $this->model->whereCategory('news')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		
		$data['resultNews'] = $getNews;
		
		$getTips = $this->model->whereCategory('tips')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultTips'] = $getTips;
		
		$getMediahighlights = $this->model->whereCategory('mediahighlights')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultMediahighlights'] = $getMediahighlights;
		
		$getFdrnews = $this->model->whereCategory('fdrnews')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultFdrnews'] = $getFdrnews;
		
		$getEvent = $this->model->whereCategory('event')->whereStatus('publish')->where('type','>',0)->orderBy('type','asc')->take(3)->get();
		$data['resultEvent'] = $getEvent;
		
		// dd($data);
		return view('frontend.news.index', $data);
    }

    public function getList()
    {
		
		$getNews = $this->model->whereCategory('news')->whereStatus('publish')->orderBy('created_at','desc')->paginate($this->paging);
		$data['resultNews'] = $getNews;
		
		return view('frontend.news.list', $data);
    }

    public function getDetail($slug)
    {

    	$getNews = $this->model->whereStatus('publish')->whereSlug($slug)->first();
		$data['resultNews'] = $getNews;

    	return view('frontend.news.detail', $data);
    }
}
