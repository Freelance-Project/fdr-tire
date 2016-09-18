@extends('backend.layouts.layout')
@section('content')

  @include('backend.common.errors')
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> {{ helper::titleActionForm() }} </h1>
        </div>
    </div>
      <hr />

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <div class="panel-body">

                     {!! Form::model($model) !!} 

                      <div class="form-group">
                        <label>Parent</label>
                        {!! Form::select('parent_id' , $parents , null ,['class' => 'form-control']) !!}
                      </div>
                      
                      <div class="form-group">
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Controller</label>
                        {!! Form::text('controller' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Order</label>
                        {!! Form::text('order' , null ,['class' => 'form-control']) !!}
                      </div>

                      <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

</div>
@endsection