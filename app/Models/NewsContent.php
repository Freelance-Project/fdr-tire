<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsContent extends Model
{
    protected $table = 'news_contents';

    public $guarded = [];


    public function rules($id = "")
    {

    	if(!empty($id))
    	{
    		$plus = ',title,'.$id;
    	
    	}else{
    	
    		$plus = '';
    	
    	}

    	$rules = [

    		'title' => 'required|max:200|unique:archive_contents'.$plus,
			'intro' => 'max:300',
		];

		return $rules;
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User' , 'author_id');
    }
	
	
    public function childs()
    {
        return $this->hasMany(NewsContent::class,'parent_id','id');
    }
}
