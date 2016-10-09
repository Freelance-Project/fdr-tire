@extends('backend.layouts.layout')
@section('content')

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

                    @include('backend.common.errors')

                     {!! Form::model($model,['files' => true]) !!} 

                      <div class="form-group">
                        <label>Name</label>
                        {!! Form::text('name' , null ,['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                      <label>Brand</label>
                      {!! Form::select('motor_brand_id' , $brand , null ,['class' => 'form-control']) !!}
                      </div>
					   
                      {{--
          					  <div class="row">
          						<div class="col-md-6">
          							
          						  <div class="form-group">
          							<label>Date</label>
          							{!!  Form::text('date', $date , ['id' => 'datepicker', 'class'=>'form-control']) !!}
          						  </div>
          						</div>
          						
          						<div class="col-md-6">							

          						  <div class="form-group">
          							<label>Status</label>
          							{!! Form::select('status' , ['publish' => 'Published' , 'unpublish' => 'Unpublished'] , null ,['class' => 'form-control']) !!}
          						  </div>
          						</div>
          					  </div>
                      --}} 
                      <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @include('backend.popElfinder');
@endsection
@section('script')
<script type="text/javascript">
  
  window.onload = function()
  {
      CKEDITOR.replace( 'description',{
      filebrowserBrowseUrl: '{{ urlBackend("image/lib")}}'});
  }
</script>
@endsection