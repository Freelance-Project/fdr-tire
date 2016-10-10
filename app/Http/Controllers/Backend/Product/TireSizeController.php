<?php

namespace App\Http\Controllers\Backend\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\TireArea;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\TireSize;
use App\Models\TireRim;
use App\Models\TireRatio;
use Datatables;
use Table;


class TireSizeController extends Controller
{
	public function __construct(TireArea $tirearea)
	{
		$this->model = new TireSize;
		$this->tireArea = $tirearea;	
	}


	public function getIndex()
	{
		return view('backend.product.tiresize.index');
		
	}

	public function getData()
	{
		$model = $this->model->join('tire_rims as tm', 'tire_sizes.rim_id', '=','tm.id')
							->join('tire_ratios as tr', 'tire_sizes.ratio_id', '=','tr.id')
							->select('tire_sizes.id' , 'tm.name as rim', 'tr.name as ratio')
							->orderBy('tm.name', 'asc');
		return Table::of($model)
			->addColumn('action' , function($model){
			return \Helper::buttons($model->id);
		})->make(true);
	}

	public function getCreate()
	{
		$model = $this->model;
		$date = '';

		return view('backend.product.tiresize.form', [
			'model' => $model,
			'rim' => TireRim::lists('name', 'id')->toArray(),
			'ratio' => TireRatio::lists('name', 'id')->toArray(),
		]);
	}


	public function postCreate(Request $request)
	{
		
		$saveSize = $this->tireArea->saveSize($request);
		if (!$saveSize) return redirect()->back()->withErrors('Ouch! Add size failed.');

		return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');
	}

	public function getUpdate($id)
	{
		$model  = $this->model->find($id);
		
		$date = \Helper::dbToDate($model->created_at);
		
		return view('backend.product.tiresize.form' , [

			'model' => $model,
			'rim' => TireRim::lists('name', 'id')->toArray(),
			'ratio' => TireRatio::lists('name', 'id')->toArray(),
		]);
	}


	public function postUpdate(Request $request , $id)
	{
		$model = $this->model->find($id);
		$saveSize = $this->tireArea->saveSize($request, $model);
		if (!$saveSize) return redirect()->back()->withErrors('Ouch! Add size failed.');

		return redirect(urlBackendAction('index'))->withSuccess('Data has been saved');

	}

	public function getDelete($id)
    {
        $model = $this->model->find($id);
		
        if(!empty($model))
        {
			$model->delete();
            return redirect(urlBackendAction('index'))->withSuccess('Data has been deleted');

        }else{

            return redirect('404');
        }
    }

    
}
