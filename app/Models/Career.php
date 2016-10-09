<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $table = 'careers';

    public $guarded = [];


    public function user()
    {
    	return $this->belongsTo('App\Models\User' , 'author_id');
    }
	
	
}
