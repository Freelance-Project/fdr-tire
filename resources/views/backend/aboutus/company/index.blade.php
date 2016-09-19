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
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>
                      
					  <div class="form-group">
                        <label>Intro Text</label>
                        {!! Form::textarea('brief' , null ,['class' => 'form-control','id'=>'brief']) !!}
                      </div>
					  
                      <div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description' , null ,['class' => 'form-control','id'=>'description']) !!}
                      </div>

                      <div class="form-group">
                        <label>File</label>
                        <div>
                          <a class="Wbutton" onclick = "return browseElfinder('image'  , 'image_tempel' , 'elfinder_browse1' , 'cancelBrowse')" >Browse</a>
                          Suggestion Image Size (726,449)
                        </div>
                        <input type = 'hidden' name = 'image' id = 'image' />
                        
                      </div>
                      <div id="image_tempel" style = 'margin-top:30px;'>
                        @if(!empty($model->image))
                          <img src="{{ asset('contents/news/thumbnail').'/'.$model->image }}" width="200" height="200" />
                        @endif
                      </div>
					  <div class="row">
						<div class="col-md-6">
                      
                      <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection