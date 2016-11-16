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
                   Data Award
                </div>
               
                <div class="panel-body">
                
                        {!! helper::buttonCreate() !!}
                
                
                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th>Year</th>	
                            <th>Published</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>

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
                    { data: 'published', name: 'published' },
                    { data: 'action', name: 'action' , searchable: false, "orderable":false},
                    
                ]
            });
        });

    </script>

@endsection