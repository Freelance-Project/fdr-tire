<?php

namespace App\Http\Controllers\Backend\News;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;
// use App\Models\Comment;

class NewsController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->category = 1;
	}


	public function getIndex()
	{
		return view('backend.news.news.index');
	}

	public function getData()
	{
		$model = $this->model->select('id' , 'title' , 'brief', 'image', 'status');
		return Table::of($model)
			->addColumn('thumbnail',function($model){
				return '<img src = "'.asset('contents/news/small/'.$model->thumbnail).'"/>';
			})
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';

		return view('backend.news.news.form', ['model' => $model,'date' => $date]);
	}


	public function postCreate(Request $request)
	{
		$inputs = $request->all();
		
		$values = [
			'author_id' => \Auth::user()->id,
			'title' => $request->title,
			'brief' => $request->intro,
			'description' => $request->description,
			'created_at' => \Helper::dateToDb($request->date),
			'slug' => str_slug($request->title),
			'status' => $request->status,
			'category' => $this->category,
		];
		
		$save = $this->model->create($values);
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {

            $imageName = "news-".$save->id;
			$uploadImage = \Helper::handleUpload($request, $imageName);
			
			$this->model->whereId($save->id)->update([
            		'image' => $uploadImage['filename']          		
            ]);
        }		
			
		
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		$data = $this->model->whereContentId($model->content_id)->get();
		$date = \Helper::dbToDate($model->created_at);
		
		return view('backend.page.news.form' , [

			'model' => $model,
			'date' => $date,
			'data' => $data,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		$inputs = $request->all();
		$validation = \Validator::make($inputs , $this->model->rules($id));
		if($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
		
		$dataid = $this->model->whereId($id)->first();
		$siblings = $this->model->whereContentId($dataid->content_id)->get();
		if ($siblings) {
			foreach ($siblings as $val) {
				$idcoll[] = $val->id;
			}
		}
					
		$values = [
			'title' => $request->title[$lang[$i]],
			'brief' => $request->brief[$lang[$i]],
			'description' => $request->description[$lang[$i]],
			'created_at' => \Helper::dateToDb($request->date),
			'slug' => str_slug($request->title[$lang[$i]]),
			'status' => $request->status
		];

		$update = $this->model->whereId($idcoll[$i-1])->update($values);
		
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {

            $imageName = "news-".$dataid->content_id;
			$uploadImage = \Helper::handleUpload($request, $imageName);
			
			$this->model->whereContentId($dataid->content_id)->update([
            		'image' => $uploadImage['filename'],
            		'thumbnail' => $uploadImage['filename'],            		
            ]);
        }
		return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getPublish($id)
    {
        $model = $this->model->find($id);
        if(!empty($model->id))
        {
            if($model->status == 'y')
            {
                $updateStatus = 'n';
                $message = 'Data has been unpublished';
                $words = 'Un published';
            }else{
                $updateStatus = 'y';
                $message = 'Data has been published';
                $words = 'Published';
            }

            Helper::history($words , '' , ['id' => $id]);
            $model->update(['status' => $updateStatus]);
            return redirect()->back()->withMessage($message);
        }else{

            return redirect()->back()->withMessage('something wrong');

        }
    }

    public function getDelete($id)
    {
        $getmodel = $this->model->find($id);
		
        if(!empty($getmodel->id))
        {
			$model = $this->model->whereContentId($getmodel->content_id);
			
            $path_image = public_path('contents/news');
            @unlink($path_image. '/large/'.$model->image);
            @unlink($path_image. '/medium/'.$model->image);
            @unlink($path_image. '/small/'.$model->image);
            @unlink($path_image. '/thumbnail/'.$model->image);
            $model->delete();
            return redirect(urlBackendAction('index'))->withSuccess('Data has been deleted');

        }else{

            return redirect('404');
        }
    }

    public function getView($id)
    {
    	$model = $this->model->find($id);
    	return view('backend.blog.view' , [
    		'model' => $model,
    	]);
    }
}
