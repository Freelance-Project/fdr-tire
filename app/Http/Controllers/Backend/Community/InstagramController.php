<?php

namespace App\Http\Controllers\Backend\Community;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;
// use App\Models\Comment;

class InstagramController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->resource_view = 'backend.community.instagram.';
	}

	public function getData()
	{

		$data = $this->model->whereParentId(null)->where('category','instagram')->first();

		$model = $this->model->whereParentId($data->id)->select('id' , 'title', 'created_at', 'status')->whereCategory('instagram');
		return Table::of($model)
			->addColumn('published' , function($model){
				 if($model->status == 'publish')
	            {
	                $words = '<span class="label label-success">Published</span>';
	            }else{
	                $words = '<span class="label label-danger">Unpublished</span>';
	            }
				return $words;
			})
			->addColumn('action' , function($model){

				if($model->status == 'publish')
	            {
	                $status = true;
	            }else{
	                $status = false;
	            }
			return \Helper::buttons($model->id,[],$status);
		})->make(true);
	}
	
	public function scrape_insta_hash($tag) {
		$insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
		$shards = explode('window._sharedData = ', $insta_source);
		$insta_json = explode(';</script>', $shards[1]); 
		$insta_array = json_decode($insta_json[0], TRUE);
		return $insta_array; // this return a lot things print it and see what else you need
	}
	public function getIndex()
	{	
		$model = $this->model->whereParentId(null)->where('category','instagram')->first();
		$instagram = false;
		if(!empty($model->id)){
			$tag = $model->title; // tag for which ou want images 
			$results_array = $this->scrape_insta_hash($tag);
			$limit = 17 ;// provide the limit thats important because one page only give some images then load more have to be clicked
			$image_array= array(); // array to store images.

			for ($i=0; $i < $limit; $i++) { 

				if(!empty($results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i]))
				{
					$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
				 	// $image_data  = '<img src="'.$latest_array['thumbnail_src'].'">'; // thumbnail and same sizes 
				 	$image_data  = $latest_array; // thumbnail and same sizes 
				 	//$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes 
					array_push($image_array, $image_data);

				}
			}

			$instagram = $image_array;
		}
// dd($instagram);
		return view($this->resource_view.'index',compact('model','instagram'));
		
	}
	public function postIndex(Request $request)
	{
		$inputs = $request->all();
		
		$values = [
			'author_id' => \Auth::user()->id,
			'title' => $request->title,
			'description' => 'instagram',
			'status'=>'publish',
			'category' => 'instagram',
		];

		if(!empty($request->id)){

			$save = $this->model->whereId($request->id)->update($values);
			$dataid=$request->id;
		}else{

			$save = $this->model->create($values);
			$dataid=$save->id;
		}
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {
			$imageName = "instagram-".$dataid;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'instagram',true);
			// dd($uploadImage);
			
			$this->model->whereId($dataid)->update([
            		'image' => $uploadImage['filename']          		
            ]);
        }

        return redirect(urlBackendAction('index'))->withSuccess('data has been saved');		
	}

	public function getCreate()
	{
		$model = $this->model;

		return view($this->resource_view.'form', ['model' => $model]);
	}


	public function postCreate(Request $request)
	{
		
		$data = $this->model->whereParentId(null)->where('category','jobfair')->first();

		if(!empty($data->id)){
			$inputs = $request->all();
		
			$values = [
				'author_id' => \Auth::user()->id,
				'parent_id' => $data->id,
				'title' => $request->title,
				'description' => $request->description,
				'status' => $request->status,
				'category' => 'jobfair',
			];
			
			$save = $this->model->create($values);

        return redirect(urlBackendAction('index'))->withSuccess('data has been saved');		
			
		}else{

        return redirect()->back()->withMessage('Sory Data Parent Not Found!');

		}
		
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		return view($this->resource_view.'form' , [

			'model' => $model,
			'date' => $date,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
					
		$values = [
			'title' => $request->name,
			'description' => $request->description,
			'status' => $request->status
		];

		$update = $this->model->whereId($id)->update($values);
		
		return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getPublish($id)
    {
        $model = $this->model->find($id);
        if(!empty($model->id))
        {
            if($model->status == 'y')
            {
                $updateStatus = 'n';
                $message = 'Data has been unpublished';
            }else{
                $updateStatus = 'y';
                $message = 'Data has been published';
            }

            $model->update(['status' => $updateStatus]);
            return redirect()->back()->withMessage($message);
        }else{

            return redirect()->back()->withMessage('something wrong');

        }
    }

    public function getDelete($id)
    {
        $getmodel = $this->model->find($id);
		
        if(!empty($getmodel->id))
        {
			$model = $this->model->whereId($getmodel->id);
			
            $path_image = public_path('contents/news');
            @unlink($path_image. '/large/'.$model->image);
            @unlink($path_image. '/medium/'.$model->image);
            @unlink($path_image. '/small/'.$model->image);
            @unlink($path_image. '/thumbnail/'.$model->image);
            $model->delete();
            return redirect(urlBackendAction('index'))->withSuccess('Data has been deleted');

        }else{

            return redirect('404');
        }
    }

    public function getView($id)
    {
    	$model = $this->model->find($id);
    	return view('backend.blog.view' , [
    		'model' => $model,
    	]);
    }
}
