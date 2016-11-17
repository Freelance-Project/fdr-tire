<?php namespace App\Repositories;

use App\Models\TireRim;
use App\Models\TireRatio;
use App\Models\TireSize;
use App\Models\Tire;
use App\Models\MotorTire;
use App\Models\MotorTireCategory;

class TireArea
{
	public function __construct()
	{
		
	}
	
	public function saveTire($data, $model=false)
	{
		$inputs['name'] = $data['name'];
		$inputs['slug'] = str_slug($data['name']);
		$inputs['brief'] = $data['brief'];
		$inputs['description'] = $data['description'];
		$inputs['rating'] = $data['rating'];
		$inputs['author_id'] = \Auth::user()->id;
		dd($inputs);
		if (!$model) {
			$save = Tire::create($inputs);
			return $save->id;
		} else {
			$save = $model->save($inputs);
			return $model->id;
		}
	}

	public function motorTire($data)
	{
		$inputs['tire_id'] = $data['tire_id'];
		$inputs['motor_model_id'] = $data['motor_model_id'];
		$inputs['tire_category_id'] = $data['tire_category_id'];
		$inputs['tire_size_id'] = $data['tire_size_id'];
		$inputs['tire_type_id'] = $data['tire_type_id'];

		if (!$this->isExistMotorTire($data['tire_id'], $data['motor_model_id'], $data['tire_category_id'], $data['tire_size_id'], $data['tire_type_id'])) {
			return MotorTire::create($inputs)->id;
		}

		return false;
	}

	public function isExistMotorTire($tire, $motor_model, $tire_category, $tire_size, $tire_type)
	{
		$get = MotorTire::whereTireId($tire)->whereMotorModelId($motor_model)->whereTireCategoryId($tire_category)
				->whereTireSizeId($tire_size)->whereTireTypeId($tire_type)->first();
		if (isset($get->id)) return $get->id;
		return false;
	}

	public function dropMotorTireById($id=false, $data=false)
	{
		if ($id) return MotorTire::whereId($id)->delete();
		return false;
	}

	public function motorTireCat($motorModel, $tireCat)
	{
		$isExist = $this->isExistMotorTireCat($motorModel, $tireCat);
		
		if (!$isExist) {
			$save = MotorTireCategory::create(['motor_model_id'=>$motorModel, 'tire_category_id'=>$tireCat]);
			return $save->id;
		}
		return false;
	}

	public function isExistMotorTireCat($motorModel, $tireCat)
	{
		$get = MotorTireCategory::whereMotorModelId($motorModel)->whereTireCategoryId($tireCat)->count();
		if ($get > 0) return true;
		return false;
	}

	public function saveSize($data, $model=false)
	{
		if (!$this->isExistRim($data->rim)) {
			$saveRim = TireRim::create(['name'=>$data->rim])->id;
		} else {
			$saveRim = TireRim::whereName($data->rim)->first()->id;
		}
		
		if (!$this->isExistRatio($data->ratio)) {
			$saveRatio = TireRatio::create(['name'=>$data->ratio])->id;
		} else {
			$saveRatio = TireRatio::whereName($data->ratio)->first()->id;
		}

		if($model) {
			$saveSize = $model->update(['size'=> $data->rim.'-'.$data->ratio, 'rim_id'=>$saveRim, 'ratio_id'=>$saveRatio]);
			if ($saveSize) return true;
		} else {

			if (!$this->isExistSize($saveRim, $saveRatio)) {
				$saveSize = TireSize::create(['size'=> $data->rim.'-'.$data->ratio, 'rim_id'=>$saveRim, 'ratio_id'=>$saveRatio]);
				if ($saveSize) return true;
			}
		}
		
		
		return false;
	}

	public function updateMotorTire($data)
	{
		$tire = $data['tire'];
		$tireSize = $data['tire_size'];
		$motorModel = $data['motor_model'];
		$tireCategory = $data['tire_category'];
		
		
		foreach ($tire as $tireid) {

			foreach ($tireSize[$tireid] as $key => $size) {
				
				$tireType = MotorTire::whereTireId($tireid)->groupBy('tire_type_id')->get();
				if ($tireType) {
					
					foreach ($tireType as $key => $value) {
						
						$motorTire['tire_id'] = $tireid;
						$motorTire['motor_model_id'] = $motorModel;
						$motorTire['tire_category_id'] = $tireCategory[$tireid][$size];
						$motorTire['tire_size_id'] = $size;
						$motorTire['tire_type_id'] = $value->tire_type_id;
						// dd($motorTire);
						$saveMotorTire = $this->motorTire($motorTire);
					}
				}
			}
			
		}

		return false;
	}

	public function isExistRim($name=false)
	{
		if ($name) return (TireRim::whereName($name)->count()) > 0 ? true : false;

		return false;
	}

	public function isExistRatio($name=false)
	{
		if ($name) return (TireRatio::whereName($name)->count()) > 0 ? true : false;

		return false;
	}
	
	public function isExistSize($rim=false, $ratio=false)
	{
		if (TireSize::whereRimId($rim)->whereRatioId($ratio)->count() > 0) return true;
		else return false;
	}

}