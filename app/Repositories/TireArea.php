<?php namespace App\Repositories;

use App\Models\TireRim;
use App\Models\TireRatio;
use App\Models\TireSize;

class TireArea
{
	public function __construct()
	{
		
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