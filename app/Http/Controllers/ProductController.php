<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
	{
		
		// $this->model = $news;
		// view()->share('static',$this->getStatic());
		
	}
	
    public function getIndex()
    {
		
		return view('frontend.product.index');
    }

    public function getDetail()
    {
		
		return view('frontend.product.detail');
    }

}
