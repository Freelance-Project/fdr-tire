<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\Tire;
use App\Models\TireSize;
use App\Models\MotorBrand;
use App\Models\MotorModel;
use App\Models\MotorType;
use App\Models\TireCategory;
use App\Models\TireTipe;
use App\Repositories\TireArea;
use Datatables;
use Table;
// use App\Models\Comment;

class TireController extends Controller
{
	public function __construct(TireArea $tire)
	{
		$this->model = new Tire;
		$this->category = 1;
		$this->tire = $tire;
	}


	public function getIndex()
	{
		return view('backend.product.tire.index');
		
	}

	public function getData()
	{
		$model = $this->model->select('id' , 'name' , 'category');
		return Table::of($model)
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';
		
		$a = MotorModel::get();
		// dd($a[0]->type->name);
		return view('backend.product.tire.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'motor' => MotorModel::get(),
			'motor_type' => MotorType::get(),
			'category' => TireCategory::lists('name','id'),
			'tire_type' => TireTipe::get(),
		]);
	}


	public function postCreate(Request $request)
	{
		$inputs = $request->all();
		
		// dd($inputs);
		// insert ke tire
		$saveTire = $this->tire->saveTire($inputs);
		// $saveTire = 1;
		if ($saveTire) {

			// insert select motor_tipe
			foreach ($inputs['motor_type'] as $model => $motor) {

				foreach ($inputs['size'][$motor] as $size) {

					$tireCategory = $inputs['category'][$motor][$size];

					$saveMotorCat = $this->tire->motorTireCat($model, $tireCategory);
					
					foreach($inputs['tire_type'] as $type) {
						
						$motorTire['tire_id'] = $saveTire;
						$motorTire['motor_model_id'] = $model;
						$motorTire['tire_category_id'] = $tireCategory;
						$motorTire['tire_size_id'] = $size;
						$motorTire['tire_type_id'] = $type;
						
						$saveMotorTire = $this->tire->motorTire($motorTire);
					}
					
				}
				
			}
			
			
		}
		
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		// dd($model->motorTire);
		$tireid = [];
		foreach ($model->motorTire as $value) {
			$tireid[$value->motor_model_id][$value->model->type->id]['size'][] = $value->tire_size_id;
			$tireid[$value->motor_model_id][$value->model->type->id]['category'][$value->tire_size_id] = $value->tire_size_id;
		}
		// dd($tireid);
		return view('backend.product.tire.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'motor' => MotorModel::get(),
			'category' => TireCategory::lists('name','id'),
			'tire_type' => TireTipe::get(),
			'tireSelected' => $tireid,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		
		$model = $this->model->find($id);		
		$inputs = $request->all();
		// dd($inputs);
		$motorTireId = [];
		foreach ($model->motorTire as $value) {
			$motorTireId[] = $value->id;
		}
		
		$saveTire = $this->tire->saveTire($inputs, $model);
		
		if ($model->id) {

			foreach ($inputs['motor_type'] as $motormodel => $motor) {

				foreach ($inputs['size'][$motor] as $size) {

					$tireCategory = $inputs['category'][$motor][$size];

					$saveMotorCat = $this->tire->motorTireCat($motormodel, $tireCategory);
					
					foreach($inputs['tire_type'] as $type) {
						
						$motorTire['tire_id'] = $model->id;
						$motorTire['motor_model_id'] = $motormodel;
						$motorTire['tire_category_id'] = $tireCategory;
						$motorTire['tire_size_id'] = $size;
						$motorTire['tire_type_id'] = $type;
						
						$saveMotorTire = $this->tire->motorTire($motorTire);
						// dd($motorTire);
						$existId[] = $this->tire->isExistMotorTire($model->id, $motormodel, $tireCategory, $size, $type);
					}
					
				}
				
			}
			
		}

		$outer = array_diff($motorTireId, $existId);
		
		
		if ($outer) {
			foreach ($outer as $value) {
				$dropMotorTire = $this->tire->dropMotorTireById($value);
			}
		}
		
		return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
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
