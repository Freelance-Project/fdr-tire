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

class FotoController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->resource_view = 'backend.gallery.foto.';
	}

	public function getData($id=false)
	{
		if($id==false){
			$model = $this->model->whereParentId(null)->select('id' , 'title', 'image', 'created_at', 'status')->whereCategory('foto');
		}else{

			$model = $this->model->whereParentId($id)->select('id' , 'title', 'parent_id', 'image', 'created_at', 'status')->whereCategory('foto');
		}

		return Table::of($model)
			->addColumn('images' , function($model){
				if(!empty($model->image)){

					$images ='<img src="'.asset('contents/foto/thumbnail').'/'.$model->image.'" width="200" height="200" />';
                }else{
					$images ='<img src="'.asset('contents/no-images.jpg').'" width="200" height="200" />';                	
                }
				return $images;
			})
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
	        if($model->parent_id==NULL){
				return \Helper::buttons($model->id,[],$status);
	        }else{
				return \Helper::buttons($model->id.'/'.$model->parent_id,[],$status);
	        }
		})->make(true);
	}

	public function getIndex()
	{	

		return view($this->resource_view.'index');
		
	}
	
	public function getCreate()
	{
		$model = $this->model;

		return view($this->resource_view.'form', ['model' => $model]);
	}


	public function postCreate(Request $request,$id = false)
	{
		
			$inputs = $request->all();
			
			if($id==false){
				$values = [
				'author_id' => \Auth::user()->id,
        		'slug'      => $this->generateUniqueSlug(NewsContent::all(),$request->title,'slug'),
				'title' => $request->title,
				'description' => $request->description,
				'type' => $request->type,
				'status' => $request->status,
				'category' => 'foto',
				];
				
				$save = $this->model->create($values);

				$image = str_replace("%20", " ", $request->image);

		        if(!empty($image))
		        {
					$imageName = "foto-".$save->id;
					$uploadImage = \Helper::handleUpload($request, $imageName, 'foto');
					// dd($uploadImage);
					
					$this->model->whereId($save->id)->update([
		            		'image' => $uploadImage['filename']          		
		            ]);
		        }
	       		return redirect(urlBackendAction('index'))->withSuccess('data has been saved');		
			}else{
				$values = [
				'author_id' => \Auth::user()->id,
				'parent_id' => $id,
				'title' => $request->title,
				'description' => $request->description,
				'type' => $request->type,
				'status' => $request->status,
				'category' => 'foto',
				];
				
				$save = $this->model->create($values);

				$image = str_replace("%20", " ", $request->image);

		        if(!empty($image))
		        {
					$imageName = "foto-".$save->id;
					$uploadImage = \Helper::handleUpload($request, $imageName, 'foto');
					// dd($uploadImage);
					
					$this->model->whereId($save->id)->update([
		            		'image' => $uploadImage['filename']          		
		            ]);
		        }
	       		return redirect(urlBackendAction('update/'.$id))->withSuccess('data has been saved');					

			}	
		
	}

	public function getUpdate($id,$parent_id=false)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		return view($this->resource_view.'form' , [

			'model' => $model,
			'date' => $date,
			'parent_id' => $parent_id,
		]);
	}


	public function postUpdate(Request $request , $id,$parent_id=false)
	{
					
		$values = [
			'title' => $request->title,
			'description' => $request->description,
			'type' => $request->type,
			'status' => $request->status
		];

		$update = $this->model->whereId($id)->update($values);

		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {
			$imageName = "foto-".$id;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'foto');
			// dd($uploadImage);
			
			$this->model->whereId($id)->update([
            		'image' => $uploadImage['filename']          		
            ]);
        }
		if($parent_id==false){
			$url = "index";
		}else{
			$url = "update/".$parent_id;
		}
		return redirect(urlBackendAction($url))->withSuccess('Data has been saved');
	}

	public function getPublish($id)
    {
        $model = $this->model->find($id);
        if(!empty($model->id))
        {
            if($model->status == 'publish')
            {
                $updateStatus = 'unpublish';
                $message = 'Data has been unpublished';
            }else{
                $updateStatus = 'publish';
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
     public function generateUniqueSlug($model,$title,$param)
    {
      
            $temp = str_slug($title, '-');

            if(!$model->where($param,$temp)->isEmpty()){

                $i = 1;
                $newslug = $temp . '-' . $i;

                while(!$model->where($param,$newslug)->isEmpty()){

                    $i++;
                    $newslug = $temp . '-' . $i;
                }

                $temp =  $newslug;
            }

        return $temp;
    }

}
