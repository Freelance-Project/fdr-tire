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
		
		return view('backend.product.tire.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'motor' => MotorBrand::get(),
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
			foreach ($inputs['motor_type'] as $motor) {

				foreach ($inputs['size'][$motor] as $size) {

					$tireCategory = $inputs['category'][$motor][$size];

					$saveMotorCat = $this->tire->motorTireCat($motor, $tireCategory);
					
					foreach($inputs['tire_type'] as $type) {
						
						$motorTire['tire_id'] = $saveTire;
						$motorTire['motor_type_id'] = $motor;
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
		
		foreach ($model->motorTire as $value) {
			$tireid[$value->motor_type_id] = $value->motor_type_id;
		}

		return view('backend.product.tire.form', [
			'model' => $model,
			'date' => $date,
			'size' => TireSize::get(),
			'motor' => MotorBrand::get(),
			'category' => TireCategory::lists('name','id'),
			'tire_type' => TireTipe::get(),
			'tireSelected' => $tireid,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		
		$model = $this->model->find($id);		
		$inputs = $request->all();
		
		$motorTireId = [];
		foreach ($model->motorTire as $value) {
			$motorTireId[] = $value->id;
		}
		
		$saveTire = $this->tire->saveTire($inputs, $model);
		
		if ($model->id) {

			foreach ($inputs['motor_type'] as $motor) {

				foreach ($inputs['size'][$motor] as $size) {

					$tireCategory = $inputs['category'][$motor][$size];

					$saveMotorCat = $this->tire->motorTireCat($motor, $tireCategory);
					
					foreach($inputs['tire_type'] as $type) {
						
						$motorTire['tire_id'] = $model->id;
						$motorTire['motor_type_id'] = $motor;
						$motorTire['tire_category_id'] = $tireCategory;
						$motorTire['tire_size_id'] = $size;
						$motorTire['tire_type_id'] = $type;
						
						$saveMotorTire = $this->tire->motorTire($motorTire);
						// dd($motorTire);
						$existId[] = $this->tire->isExistMotorTire($model->id, $motor, $tireCategory, $size, $type);
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
