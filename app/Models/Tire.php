<?php

namespace App\Models;

use App\Models\MotorTire;
use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    protected $table = 'tires';

    public $guarded = [];


    public function motorTire()
    {
        return $this->hasMany(MotorTire::class);
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User' , 'author_id');
    }
	
	
}
