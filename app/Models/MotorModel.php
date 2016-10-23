<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MotorType;
use App\Models\TireCategory;

class MotorModel extends Model
{
    public $guarded = [];

    public function motorType()
    {
    	return $this->belongsTo(MotorType::class);
    }

    public function tireCategory()
    {
    	return $this->belongsTo(TireCategory::class);
    }

}
