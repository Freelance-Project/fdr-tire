<?php

namespace App\Http\Controllers\Backend\Gallery;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;
// use App\Models\Comment;

class DownloadController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->resource_view = 'backend.gallery.download.';
	}

	public function getData($id=false)
	{
		

			$model = $this->model
							->select('id' , 'title', 'parent_id', 'image', 'category', 'created_at', 'status')
							->orWhere('category','foto')
							->orWhere('category','ecard');

		return Table::of($model)
			->addColumn('images' , function($model){
				if(!empty($model->image)){

					$images ='<img src="'.asset('contents/'.$model->category.'/thumbnail').'/'.$model->image.'" width="200" height="200" />';
                }else{
					$images ='<img src="'.asset('contents/no-images.jpg').'" width="200" height="200" />';                	
                }
				return $images;
			})
			->addColumn('published' , function($model){
				 if($model->status == 'y')
	            {
	                $words = '<span class="label label-success">Published</span>';
	            }else{
	                $words = '<span class="label label-danger">Unpublished</span>';
	            }
				return $words;
			})
			->addColumn('action' , function($model){

				if($model->status == 'y')
	            {
	                $status = true;
	            }else{
	                $status = false;
	            }

				return \Helper::buttons($model->id,[],$status);
	      
		})->make(true);
	}

	public function getIndex()
	{	

		return view($this->resource_view.'index');
		
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
