<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Tire;

class ProductController extends Controller
{
    public function __construct(Tire $tire)
	{
		
		$this->model = $tire;
		// view()->share('static',$this->getStatic());
		$this->paging = 10;
	}
	
    public function getIndex()
    {
		
		$getSlide = $this->model->whereStatus('publish')->take(5)->get();
		$data['resultSlide'] = $getSlide;

		$getTire = $this->model->whereStatus('publish')->paginate($this->paging);
		$data['resultTire'] = $getTire;

		// dd($data);
		return view('frontend.product.index', $data);
    }

    public function getDetail($slug)
    {
		
		$getProduct = Tire::whereSlug($slug)->whereStatus('publish')->first();
		$data['product'] = $getProduct;

		return view('frontend.product.detail', $data);
    }

}
