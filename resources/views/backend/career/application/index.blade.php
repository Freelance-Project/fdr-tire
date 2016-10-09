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
                   Data Tire Safety
                </div>
                <div class="panel-body">

                    @include('backend.common.errors')

                <a href="{{ urlBackendAction('export/xls') }}">Export Excel</a> &nbsp;&nbsp; <a href="{{ urlBackendAction('export/csv') }}">Export CSV</a>
                
                <div class="panel-body">
                
                        {!! helper::buttonCreate() !!}
                
                <p>&nbsp;</p>

                <table class = 'table' id = 'table'>
                    <thead>
                        <tr>
                            <th>Id Number</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Religion</th>
                            <th>Phone</th>
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
            $("#export-excel").click(function(){

            });
            $.fn.dataTable.ext.errMode = 'none';
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data") }}',
                columns: [
                    { data: 'id_number', name: 'id_number' },
                    { data: 'fullname', name: 'fullname' },
                    { data: 'email', name: 'email' },
                    { data: 'address', name: 'address' },
                    { data: 'religion', name: 'religion' },
                    { data: 'phone', name: 'phone' },
                    { data: 'action', name: 'action' , searchable: false, "orderable":false},
                    
                ]
            });
        });

    </script>

@endsection