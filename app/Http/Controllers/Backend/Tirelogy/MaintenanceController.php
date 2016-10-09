<?php

namespace App\Http\Controllers\Backend\Tirelogy;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;
// use App\Models\Comment;

class MaintenanceController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->category = 1;
		$this->resource_view = 'backend.tirelogy.maintenance.';
	}

	public function getData()
	{

		$data = $this->model->whereParentId(null)->where('category','tire-maintenance')->first();

		$model = $this->model->whereParentId($data->id)->select('id' , 'title', 'created_at', 'status')->whereCategory('tire-maintenance');
		return Table::of($model)
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
		$model = $this->model->whereParentId(null)->where('category','tire-maintenance')->first();

		return view($this->resource_view.'index',compact('model'));
		
	}
	public function postIndex(Request $request)
	{
		$inputs = $request->all();
		
		$values = [
			'author_id' => \Auth::user()->id,
			'description' => $request->description,
			'status'=>'y',
			'category' => 'tire-maintenance',
		];

		if(!empty($request->id)){

			$save = $this->model->whereId($request->id)->update($values);
			$dataid=$save;
		}else{

			$save = $this->model->create($values);
			$dataid=$save->id;
		}
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {
			$imageName = "tire-maintenance-".$dataid;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'tire-maintenance');
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
		
		$data = $this->model->whereParentId(null)->where('category','tire-maintenance')->first();

		if(!empty($data->id)){
			$inputs = $request->all();
		
			$values = [
				'author_id' => \Auth::user()->id,
				'parent_id' => $data->id,
				'title' => $request->title,
				'description' => $request->description,
				'status' => $request->status,
				'category' => 'safety',
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
			'title' => $request->title,
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
                $words = 'Unpublished';
            }else{
                $updateStatus = 'y';
                $message = 'Data has been published';
                $words = 'Published';
            }

            Helper::history($words , '' , ['id' => $id]);
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
