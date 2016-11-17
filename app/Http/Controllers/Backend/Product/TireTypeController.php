<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\TireTipe;
use Datatables;
use Table;
// use App\Models\Comment;

class TireTypeController extends Controller
{
	public function __construct()
	{
		$this->model = new TireTipe;
		$this->category = 1;
	}


	public function getIndex()
	{
		return view('backend.product.tiretype.index');
		
	}

	public function getData()
	{
		$model = $this->model->select('id' , 'name', 'banner');
		return Table::of($model)
			->addColumn('banner',function($model){
				return '<img src = "'.asset('contents/product/small/'.$model->banner).'"/>';
			})
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';
		return view('backend.product.tiretype.form', ['model' => $model,'date' => $date]);
	}


	public function postCreate(Request $request)
	{
		$inputs = $request->all();
		// dd($inputs);
		$values = [
			'name' => $request->name
		];
		
		$save = $this->model->create($values);
		
		$image = str_replace("%20", " ", $request->image);
        if(!empty($image))
        {
            $imageName = "product-".$save->id;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'product');
			
			$this->model->whereId($save->id)->update([
            		'banner' => $uploadImage['filename'],
            ]);
        }

		// dd($save);
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		return view('backend.product.tiretype.form' , [

			'model' => $model,
			'date' => $date,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
					
		$values = [
			'name' => $request->name,
			'created_at' => \Helper::dateToDb($request->date)
		];

		$update = $this->model->whereId($id)->first();
		$update->update($values);
		
		$image = str_replace("%20", " ", $request->image);
        if(!empty($image))
        {
            $imageName = "product-".$update->id;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'product');
			
			$this->model->whereId($update->id)->update([
            		'banner' => $uploadImage['filename'],
            ]);
        }

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
