<?php
dd('aa');
namespace App\Http\Controllers\Backend\News;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;
// use App\Models\Comment;

class EventController extends Controller
{
	public function __construct()
	{
		$this->model = new NewsContent;
		$this->category = 1;
	}


	public function getIndex()
	{
		return view('backend.news.event.index');
		
	}

	public function getData()
	{
		$model = $this->model->select('id' , 'title' , 'image', 'created_at', 'status')->whereCategory('event');
		return Table::of($model)
			->addColumn('image',function($model){
				return '<img src = "'.asset('contents/news/small/'.$model->image).'"/>';
			})
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';

		return view('backend.news.event.form', ['model' => $model,'date' => $date]);
	}


	public function postCreate(Request $request)
	{
		$inputs = $request->all();
		
		$values = [
			'author_id' => \Auth::user()->id,
			'title' => $request->title,
			'brief' => $request->brief,
			'description' => $request->description,
			'created_at' => \Helper::dateToDb($request->date),
			'slug' => str_slug($request->title),
			'status' => $request->status,
			'category' => 'event',
		];
		
		$save = $this->model->create($values);
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {

            $imageName = "event-".$save->id;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'news');
			
			$this->model->whereId($save->id)->update([
            		'image' => $uploadImage['filename']          		
            ]);
        }		
			
		// dd($save);
        return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		return view('backend.news.event.form' , [

			'model' => $model,
			'date' => $date,
		]);
	}


	public function postUpdate(Request $request , $id)
	{
					
		$values = [
			'title' => $request->title,
			'brief' => $request->brief,
			'description' => $request->description,
			'created_at' => \Helper::dateToDb($request->date),
			'slug' => str_slug($request->title),
			'status' => $request->status
		];

		$update = $this->model->whereId($id)->update($values);
		
		
		$image = str_replace("%20", " ", $request->image);

        if(!empty($image))
        {

            $imageName = "event-".$id;
			$uploadImage = \Helper::handleUpload($request, $imageName, 'news');
			
			$this->model->whereId($id)->update([
            		'image' => $uploadImage['filename']
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
                $words = 'Unpublished';
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
			$model = $this->model->whereId($getmodel->id);
			
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
