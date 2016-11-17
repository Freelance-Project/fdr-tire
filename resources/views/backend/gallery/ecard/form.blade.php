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
                    Form Album Foto
                </div>
                <div class="panel-body">

                    @include('backend.common.errors')

                     {!! Form::model($model,['files' => true]) !!} 

                      <div class="form-group">
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>

                    <div class="form-group">
                        <label>Thumbnail Image</label>
                        <div>
                          <a class="Wbutton" onclick = "return browseElfinder('image'  , 'image_tempel' , 'elfinder_browse1' , 'cancelBrowse')" >Browse</a>
                          Suggestion Image Size (726,449)
                        </div>
                        <input type = 'hidden' name = 'image' id = 'image' />
                        
                    </div>
                    <div id="image_tempel" style = 'margin-top:30px;'>
                        @if(!empty($model->image))
                          <img src="{{ asset('contents/ecard/thumbnail').'/'.$model->image }}" width="200" height="200" />
                        @endif
                    </div>     					           					

        						  <div class="form-group">
        							<label>Status</label>
        							{!! Form::select('status' , ['unpublish' => 'Unpublished','publish' => 'Published'] , null ,['class' => 'form-control']) !!}
        						  </div>

                      <div class="form-group">

                        <label>&nbsp;</label>
                          <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                      </div>
                    
                    {!! Form::close() !!}
                  
                </div>
            </div>
        </div>
    </div>
    @include('backend.popElfinder');
@endsection
@section('script')
 <script type="text/javascript">
        
        $(document).ready(function(){

        window.onload = function()
        {
          CKEDITOR.replace( 'description',{
          filebrowserBrowseUrl: '{{ urlBackend("image/lib")}}'});
        }
       
        });

    </script>
@endsection