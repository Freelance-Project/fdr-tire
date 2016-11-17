<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MotorType;
use App\Models\MotorBrand;
use App\Models\TireCategory;

class MotorModel extends Model
{
    public $guarded = [];

    public function type()
    {
    	return $this->belongsTo(MotorType::class, 'motor_type_id');
    }

    public function brand()
    {
    	return $this->belongsTo(MotorBrand::class, 'motor_brand_id');
    }

    public function tireCategory()
    {
    	return $this->belongsTo(TireCategory::class);
    }

}
