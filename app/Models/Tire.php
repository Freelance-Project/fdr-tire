<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    protected $table = 'tires';

    public $guarded = [];


    public function childs()
    {
        return $this->hasMany(Tire::class,'parent_id','id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User' , 'author_id');
    }
	
	
}
