<?php

namespace App\Http\Controllers\Backend\Career;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\Career;
use Datatables;
use Table;
// use App\Models\Comment;

class ApplicationController extends Controller
{
	public function __construct()
	{
		$this->model = new Career;
		$this->resource_view = 'backend.career.application.';
	}

	public function getData()
	{


		$model = $this->model
						->select(
								'id' ,
								'id_number' ,
								'fullname' ,
								'email' ,
								'address' ,
								'religion' ,
								'phone' ,
								'created_at', 
								'status'
								);

		return Table::of($model)
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id,['delete']);
		})->make(true);
	}

	public function getIndex()
	{	
		
		return view($this->resource_view.'index');
		
	}

	public function getExport($format='xls')
	{

        $model = $this->model->orderBy('id','asc')->get()->toArray();

        if($format != 'xls' && $format != 'csv'){
        	$format = 'xls';
        }

        foreach ($model as $key => $value) {
           
            $data[$key]['No'] = $key+1;
            $data[$key]['Name'] = $value['name'];
            $data[$key]['Full Name'] = $value['fullname'] ;
            $data[$key]['Phone'] = $value['phone'] ;
            $data[$key]['Email'] = $value['email'] ;
            $data[$key]['address'] = $value['address'] ;
        }

        \Excel::create('Application-Form', function($excel)  use($data) {

            $excel->sheet('Sheet Name', function($sheet) use($data)  {

                $sheet->fromArray($data);
            
            });
        })->download($format);
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

}
