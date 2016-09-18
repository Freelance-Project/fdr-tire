@extends('backend.layouts.layout')
@section('content')

  @include('backend.common.sweet_flashes')
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
                        <label>Username</label>
                        {!! Form::text('username' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Name</label>
                        {!! Form::text('name' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        {!! Form::text('email' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Gender</label>
                        {!! Form::select('gender' , ['pria' => 'Pria','wanita'=>'Wanita'] , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        {!! Form::textarea('address' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Phone</label>
                        {!! Form::text('phone' , null ,['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        {!! Form::password('password',['class' => 'form-control']) !!}
                      </div>

                      <div class="form-group">
                        <label>Verify Password</label>
                        {!! Form::password('verify_password',['class' => 'form-control']) !!}
                      </div>
                      
                      <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection