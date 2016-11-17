<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use \App\Models\NewsContentComment;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveComment($newsid, $data)
    {

    	$value['news_content_id'] = $newsid;
    	$value['name'] = $data['name'];
    	$value['email'] = $data['email'];
    	$value['comment'] = $data['comment'];
    	$value['source'] = \Request::ip();

    	NewsContentComment::create($value);
    	return true;
    }
    public function generateUniqueSlug($model,$title,$param)
    {
      
            $temp = str_slug($title, '-');

            if(!$model->where($param,$temp)->isEmpty()){

                $i = 1;
                $newslug = $temp . '-' . $i;

                while(!$model->where($param,$newslug)->isEmpty()){

                    $i++;
                    $newslug = $temp . '-' . $i;
                }

                $temp =  $newslug;
            }

        return $temp;
    }

}
