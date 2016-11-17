<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NewsContent;

class CareerController extends Controller
{
    public function __construct()
	{
		
		$this->model = new NewsContent;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		$data['faq'] = false;
        $data['faqBanner'] = $this->model->whereParentId(null)->whereCategory('faq')->first();
        if(!empty($data['faqBanner']->id)){

			$data['faq'] = $this->model->whereParentId($data['faqBanner']->id)->whereCategory('faq')->where('status','publish')->get();

        }
        
		return view('frontend.career.index', $data);
    }

    public function getEvent()
    {
		
		return view('frontend.career.event');
    }

}
