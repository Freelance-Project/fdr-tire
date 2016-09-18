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
                         <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Parent</th>
                                    <th>Title</th>
                                    <th>Controller</th>
                                    <th>Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model->whereParentId(null)->orderBy('order','asc')->get() as $row)
                                    <tr>
                                        <td>This Parent</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ $row->controller }}</td>
                                        <td>{{ $row->order }}</td>
                                        <td>{!! helper::buttons($row->id) !!}</td>
                                    </tr>

                                    @foreach($row->childs as $child)

                                        <tr>
                                            <td style = 'padding-left:40px;'>{{ $row->title }}</td>
                                            <td>{{ $child->title }}</td>
                                            <td>{{ $child->controller }}</td>
                                            <td>{{ $child->order }}</td>
                                            <td>{!! helper::buttons($child->id) !!}</td>
                                        </tr>

                                    @endforeach

                                @endforeach
                            </tbody>
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
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>

@endsection