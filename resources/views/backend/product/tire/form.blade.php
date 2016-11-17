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
                        <label>Overview</label>
                        {!! Form::textarea('brief' , null ,['class' => 'form-control','id'=>'brief']) !!}
                      </div>
					  
                      <div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description' , null ,['class' => 'form-control','id'=>'description']) !!}
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rating</label>
                            {!! Form::text('rating' , null ,['class' => 'form-control']) !!}
                          </div>
                        </div>
                        
                      </div>
                      <div class="form-group">
                        <label>Motor Brand : </label><br>
                        @foreach($motor as $val)
                          <br>
                          <label>{{$val->name}}</label>
                          
                            <br>
                            <?php
                            
                            $motorTypeCheck = false;
                            if (isset($tireSelected)) {
                              
                              if (in_array($val->type->id, $tireSelected)) {
                                $motorTypeCheck = true;
                              }
                            }
                            // dd($val->type->id);
                            ?>

                            {!! Form::checkbox("motor_type[$val->id]", $val->type->id, $motorTypeCheck) !!} {{$val->type->name}}
                            </br>
                            
                            @foreach($size as $s)
                              <?php
                              $sizeCheck = false;
                              $tireCat = false;
                              if (isset($model->motorTire)) {
                                foreach ($model->motorTire as $data) {
                                  if (($val->type->id == $data->motor_type_id) and ($s->id == $data->tire_size_id)) {
                                    $sizeCheck = true;
                                    $tireCat = $data->tire_category_id;
                                  }
                                }
                              }
                              $motorType = $val->type->id;
                              ?>
                              <span style="margin-left:5em">{!! Form::checkbox("size[$motorType][]" , $s->id, $sizeCheck) !!} {{$s->size}}</span>
                              
                              <span style="margin-left:5em">{!! Form::select("category[$motorType][$s->id]", $category, isset($tireCat) ? $tireCat : null) !!}</span>
                              </br>
                            @endforeach
                            
                            
                         

                        @endforeach
                        
                      </div>
                      <div class="form-group">
                        <label>Tire Tipe : </label><br>
                        @foreach($tire_type as $val)
                          <?php
                          $typeCheck = false;
                          if (isset($model->motorTire)) {
                            foreach ($model->motorTire as $motorTire) {
                              if ($val->id == $motorTire->tire_type_id) {
                                $typeCheck = true;
                              }
                            }
                          }
                          ?>
                          {!! Form::checkbox('tire_type[]', $val->id, $typeCheck) !!} <label>{{$val->name}}</label> 
                        @endforeach
                        
                      </div>

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

      CKEDITOR.replace( 'brief',{
      filebrowserBrowseUrl: '{{ urlBackend("image/lib")}}'});
  }
</script>
@endsection