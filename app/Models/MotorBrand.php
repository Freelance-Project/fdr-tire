<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MotorType;

class MotorBrand extends Model
{
    public $guarded = [];

    public function type()
    {
    	return $this->belongsTo(MotorType::class);
    }
}
