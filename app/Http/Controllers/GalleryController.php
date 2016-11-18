<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\NewsContent;

class GalleryController extends Controller
{
    public function __construct()
	{
		
		$this->model = new NewsContent;
		
        $this->pathFileDownloadecard       = public_path('contents/ecard/large/');
        $this->pathFileDownload       = public_path('contents/download/large/');
		
	}
	
    public function getIndex()
    {
        $data['photo'] = $this->model->whereParentId(null)->whereCategory('foto')->where('status','publish')->take(3)->get();
		$data['video'] = $this->model->whereParentId(null)->whereCategory('video')->where('status','publish')->take(3)->get();

        $data['ecard'] = $this->model->whereParentId(null)->whereCategory('ecard')->where('status','publish')->first();
        $data['wallpaper'] = $this->model->whereParentId(null)->whereCategory('download')->whereType(1)->where('status','publish')->first();
        $data['chart'] = $this->model->whereParentId(null)->whereCategory('download')->whereType(2)->where('status','publish')->first();
        $data['calender'] = $this->model->whereParentId(null)->whereCategory('download')->whereType(3)->where('status','publish')->first();
        $data['bulletin'] = $this->model->whereParentId(null)->whereCategory('download')->whereType(4)->where('status','publish')->first();
        // dd($photo);

        $data['instagram'] = false;

        $modelinstagram = $this->model->whereParentId(null)->where('category','instagram')->first();
        $instagram = false;
        if(!empty($modelinstagram->id)){
            $tag = $modelinstagram->title; // tag for which ou want images 
            $results_array = $this->scrape_insta_hash($tag);
            $limit = 12 ;// provide the limit thats important because one page only give some images then load more have to be clicked
            $image_array= array(); // array to store images.

            for ($i=0; $i < $limit; $i++) { 

                if(!empty($results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i]))
                {
                    $latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
                    // $image_data  = '<img src="'.$latest_array['thumbnail_src'].'">'; // thumbnail and same sizes 
                    $image_data  = $latest_array; // thumbnail and same sizes 
                    //$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes 
                    array_push($image_array, $image_data);

                }
            }

            $data['instagram'] = $image_array;
        }

		return view('frontend.gallery.index',$data);
    }

    public function getPhoto($slug=false){

    	if($slug){

            $data['photo'] = $this->model->whereCategory('foto')->where('status','publish')->where('slug',$slug)->first();

			return view('frontend.gallery.photo-detail',$data);

    	}else{

            $data['racing']= $this->model->whereParentId(null)->whereCategory('foto')->where('type',1)->where('status','publish')->take(3)->get();
            $data['event']= $this->model->whereParentId(null)->whereCategory('foto')->where('type',2)->where('status','publish')->take(3)->get();

			return view('frontend.gallery.photo',$data);


    	}
    }

    public function getVideo($slug=false){

    	if($slug){

            $data['video'] = $this->model->whereCategory('video')->where('status','publish')->where('slug',$slug)->first();
            $embed = explode('v=', $data['video']->video);
            // dd($embed);

            $data['youtube'] = false;
            if(!empty($embed[1])){

            $data['youtube'] = $embed[1];
            }
			return view('frontend.gallery.video-detail', $data);

    	}else{

            $data['racing']= $this->model->whereParentId(null)->whereCategory('video')->where('type',1)->where('status','publish')->take(3)->get();

            $data['event']= $this->model->whereParentId(null)->whereCategory('video')->where('type',2)->where('status','publish')->take(3)->get();

			return view('frontend.gallery.video', $data);

    	}

    }

    public function getDownloadecard($id)
    {
        $model = $this->model->findOrFail($id);

        $path = $this->pathFileDownloadecard.'/'.$model->image;

        return response()->download($path);
    }

    public function getDownload($id)
    {
        $model = $this->model->findOrFail($id);

        $path = $this->pathFileDownload.'/'.$model->image;

        return response()->download($path);
    }


    public function scrape_insta_hash($tag) {
        $insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
        $shards = explode('window._sharedData = ', $insta_source);
        $insta_json = explode(';</script>', $shards[1]); 
        $insta_array = json_decode($insta_json[0], TRUE);
        return $insta_array; // this return a lot things print it and see what else you need
    }

}
