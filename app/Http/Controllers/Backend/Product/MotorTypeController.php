<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\MotorType;
use App\Models\MotorBrand;
use Datatables;
use Table;
// use App\Models\Comment;

class MotorTypeController extends Controller
{
	public function __construct()
	{
		$this->model = new MotorType;
		$this->editableFields = ['name','motor_brand_id'];
	}


	public function getIndex()
	{
		return view('backend.product.motortype.index');
		
	}

	public function getData()
	{
		$model = $this->model->join('motor_brands as mb','motor_types.motor_brand_id','=','mb.id')
						->select('motor_types.id' , 'motor_types.name','mb.name as brand');
		return Table::of($model)
			->addColumn('image',function($model){
				return '<img src = "'.asset('contents/product/small/'.$model->image).'"/>';
			})
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';
		$brand = MotorBrand::lists('name','id')->toArray();
		return view('backend.product.motortype.form', ['model' => $model,'date' => $date, 'brand'=>$brand]);
	}


	public function postCreate(Request $request)
	{
		$query = $this->model;

		foreach ($this->editableFields as $value) {
            $query->{$value} = $request->{$value};
        }

        if (!$query->save()) {
            return redirect()->back()->withErrors('Ouch! Add country failed.');
        }
			
		// dd($save);
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		$brand = MotorBrand::lists('name','id')->toArray();

		return view('backend.product.motortype.form' , [

			'model' => $model,
			'date' => $date,
			'brand' => $brand,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		
		$query = $this->model->findOrFail($id);

		foreach ($this->editableFields as $value) {
            $query->{$value} = $request->{$value};
        }

        if (!$query->save()) {
            return redirect()->back()->withErrors('Ouch! Add country failed.');
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
