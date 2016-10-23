<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\Tire;
use App\Models\TireSize;
use App\Models\MotorBrand;
use App\Models\TireCategory;
use App\Models\TireTipe;
use App\Models\MotorType;
use Datatables;
use Table;
use App\Repositories\TireArea;
// use App\Models\Comment;

class MotorModelController extends Controller
{
	public function __construct(TireArea $tire)
	{
		$this->model = new MotorType;
		$this->category = 1;
		$this->tire = $tire;
	}


	public function getIndex()
	{
		return view('backend.product.motormodel.index');
		
	}

	public function getData()
	{
		$model = $this->model->join('motor_brands', 'motor_types.motor_brand_id','=','motor_brands.id')
					->select('motor_types.id' , 'motor_types.name as model','motor_brands.name as brand');
		return Table::of($model)
			->addColumn('image',function($model){
				return '<img src = "'.asset('contents/news/small/'.$model->image).'"/>';
			})
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';

		return view('backend.product.motormodel.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'tire' => Tire::get(),
			'brand' => MotorBrand::lists('name','id')->toArray(),
			'tire_category' => TireCategory::lists('name','id')->toArray(),
		]);
	}


	public function postCreate(Request $request)
	{
		$inputs = $request->all();
		// dd($inputs);
		
		$saveMotorModel = $this->model->create(['name'=>$inputs['name'], 'motor_brand_id'=>$inputs['motor_brand_id']]);
		if ($saveMotorModel->id) {
			
			if (isset($inputs['tire'])) {

				$tireData['tire'] = $inputs['tire'];
				$tireData['tire_size'] = $inputs['size'];
				$tireData['motor_type'] = $saveMotorModel->id;
				$tireData['tire_category'] = $inputs['tire_category'];
				
				$saveTire = $this->tire->updateMotorTire($tireData);
			}
			
		}
		
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		foreach ($model->motorTire as $key => $value) {
			$tireSelected[] = $value->tire_id;
		}
		
		return view('backend.product.motormodel.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'tire' => Tire::get(),
			'brand' => MotorBrand::lists('name','id')->toArray(),
			'tire_category' => TireCategory::lists('name','id')->toArray(),
			'tireSelected' => $tireSelected,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		$model = $this->model->find($id);
		$inputs = $request->all();
		// dd($inputs);
		
		$saveMotorModel = $model->update(['name'=>$inputs['name'], 'motor_brand_id'=>$inputs['motor_brand_id']]);
		if ($model->id) {
			
			if (isset($inputs['tire'])) {

				$tireData['tire'] = $inputs['tire'];
				$tireData['tire_size'] = $inputs['size'];
				$tireData['motor_type'] = $model->id;
				$tireData['tire_category'] = $inputs['tire_category'];
				// dd($tireData);					
				$saveTire = $this->tire->updateMotorTire($tireData);
			}
			
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
