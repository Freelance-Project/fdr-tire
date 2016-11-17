<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MotorModel;
use App\Models\TireCategory;

class MotorTire extends Model
{
    public $guarded = [];

    public function model()
    {
    	return $this->belongsTo(MotorModel::class, 'motor_model_id');
    }

    public function tireCategory()
    {
    	return $this->belongsTo(TireCategory::class);
    }

}
