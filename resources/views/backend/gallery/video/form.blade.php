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
                    Form Album Video
                </div>
                <div class="panel-body">

                    @include('backend.common.errors')

                     {!! Form::model($model,['files' => true]) !!} 

                      <div class="form-group">
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>
                      
					  
                      <div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description' , null ,['class' => 'form-control','id'=>'description']) !!}
                      </div>     
                    @if(!empty($id))

                      <div class="form-group">
                        <label>Video Yotube</label>
                        {!! Form::text('image' , null ,['class' => 'form-control']) !!}
                      </div>
                    @else

                    @if(empty($parent_id))
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
                              <img src="{{ asset('contents/video/thumbnail').'/'.$model->image }}" width="200" height="200" />
                            @endif
                        </div>      
                        @else
                          <div class="form-group">
                            <label>Video Yotube</label>
                            {!! Form::text('image' , null ,['class' => 'form-control']) !!}
                          </div>

                        @endif

                    @endif			           					

    				  <div class="form-group">
    					<label>Status</label>
    					{!! Form::select('status' , ['n' => 'Unpublished','y' => 'Published'] , null ,['class' => 'form-control']) !!}
    				  </div>

                      <div class="form-group">

                        <label>&nbsp;</label>
                          <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                      </div>
                    
                    {!! Form::close() !!}

                    @if(empty($parent_id))
                        @if(!empty($model->id))

                            {!! helper::buttonCreate($model->id) !!}
                    
                    
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>

                            <table class = 'table' id = 'table'>
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created</th>
                                        <th>Published</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                
                            </table>

                        @endif
                    @endif
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
        @if(!empty($model->id))
            $.fn.dataTable.ext.errMode = 'none';
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data/".$model->id) }}',
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'published', name: 'published' },
                    { data: 'action', name: 'action' , searchable: false, "orderable":false},
                    
                ]
            });
        @endif
        });

    </script>
@endsection