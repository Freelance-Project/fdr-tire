@extends('backend.layouts.layout')
@section('content')

@include('backend.common.flashes')
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
                
                        {!! helper::buttonCreate() !!}
                
                
                <p>&nbsp;</p>
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th>Title</th>
							<th>Brand</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    
    <script type="text/javascript">
        
        $(document).ready(function(){
            $.fn.dataTable.ext.errMode = 'none';
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data") }}',
                columns: [
					{ data: 'name', name: 'name', render: function(data, type, full, meta){ return '<a href="update/'+full.id+'">'+data+'</a>';}},
                    { data: 'brand', name: 'motor_brand_id' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action' , searchable: false, "orderable":false},
                    
                ]
            });
        });

    </script>

@endsection