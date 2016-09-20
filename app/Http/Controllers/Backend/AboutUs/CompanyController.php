<?php

namespace App\Http\Controllers\Backend\AboutUs;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Helper;
use App\Models\NewsContent;
use Datatables;
use Table;

class CompanyController extends Controller
{
    public function __construct(User $model)
    {
    	parent::__construct();

    	$this->model = $model->find(getUser()->id);
    }

    public function getIndex()
    {
    	$model = $this->model;

    	return view('backend.aboutus.company.index',compact('model'));
    }

    public function handleInsert($request)
    {
    	$inputs = $request->all();

    	$inputs['password'] = \Hash::make($request->password);
    	$inputs['role_id'] = $this->model->role_id;
    	return $inputs;
    }

    public function postIndex(Request $request)
    {
    	$model = new User;

    	$this->validate($request,$model->rules($this->model->id));

    	$data = $this->handleInsert($request);

    	$this->model->update($data);

    	return redirect(urlBackendAction('index'))->withSuccess('Data has been updated');
    }
}
