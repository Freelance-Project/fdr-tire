<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','DefaultController@getIndex');
Route::controller('profile','ProfileController');
Route::controller('request','RequestController');
Route::controller('search','SearchController');

Route::controller('product','ProductController');
Route::controller('news','NewsController');
Route::controller('about-us','AboutController');
Route::controller('gallery','GalleryController');
Route::controller('career','CareerController');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    
	Route::controller('login','Backend\LoginController');

	Route::get('admin-cp' , function(){
		return redirect('login');
	});

	if(request()->segment(1) == helper()->backendUrl)
	{
		include __DIR__.'/backendRoutes.php';
	}

});
