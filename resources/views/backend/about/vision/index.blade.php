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
                   Data Visions
                </div>
                <div class="panel-body">

                    @include('backend.common.errors')

                     {!! Form::model($model,['files' => true]) !!} 

                    {!! Form::hidden('id' , null ,['class' => 'form-control']) !!}
                           
					{{--
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
                          <img src="{{ asset('contents/tire-maintenance/thumbnail').'/'.$model->image }}" width="200" height="200" />
                        @endif
                    </div>
					--}}
                      
					  
					  <div class="form-group">
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>
					  
                      <div class="form-group">
                        <label>Brief</label>
                        {!! Form::textarea('brief' , null ,['class' => 'form-control','id'=>'brief']) !!}
                      </div>   

					<div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description' , null ,['class' => 'form-control','id'=>'description']) !!}
                      </div>  					  

                      <div class="form-group">

                        <label>&nbsp;</label>
                          <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Create' }}</button>
                      </div>
                    
                    {!! Form::close() !!}
                </div>
                @if(!empty($model->id))
                
				{{--
				<div class="panel-body">
                
                        {!! helper::buttonCreate() !!}
                
                
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

                </div>
				--}}
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
            $.fn.dataTable.ext.errMode = 'none';
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data") }}',
                columns: [
                    { data: 'title', name: 'title' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'published', name: 'published' },
                    { data: 'action', name: 'action' , searchable: false, "orderable":false},
                    
                ]
            });
        });

    </script>

@endsection