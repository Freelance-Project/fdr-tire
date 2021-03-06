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
                   Data Instagram
                </div>
                <div class="panel-body">

                    @include('backend.common.errors')

                     {!! Form::model($model,['files' => true]) !!} 

                    {!! Form::hidden('id' , null ,['class' => 'form-control']) !!}
                           
                      
                      <div class="form-group">
                        <label>#hashtag</label>
                        {!! Form::text('title' , null ,['class' => 'form-control']) !!}
                      </div>   

                     
                    <p>&nbsp;</p>
                      <div class="form-group">

                        <label>&nbsp;</label>
                          <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                      </div>
                    
                    {!! Form::close() !!}
                </div>
                <div class="panel-body">
                    <div class="row">
                        @if(!empty($instagram))
                        @foreach($instagram as $valInsta)
                        <div class="col-lg-3">
                        <img src="{{$valInsta['thumbnail_src']}}" width="100%">
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
               
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