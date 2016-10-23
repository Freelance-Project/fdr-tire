<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorType extends Model
{
    public $guarded = [];

    public function motorTire()
    {
    	return $this->hasMany(MotorTire::class);
    }
}
