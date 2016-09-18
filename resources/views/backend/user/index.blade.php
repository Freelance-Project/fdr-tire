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
                    <div class="table-responsive">
                         {!! helper::buttonCreate() !!}
                
                
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <table class = 'table' id = 'table'>
                            <thead>
                                <tr>
                                    <th width = ''>Role</th>
                                    <th width = ''>Name</th>
                                    <th width = ''>Email</th>
                                    <th width = ''>Action</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ urlBackendAction("data") }}',
                columns: [
                    { data: 'role', name: 'role' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'action', name: 'action' , searchable: false},
                    
                ]
            });
        });

    </script>

@endsection