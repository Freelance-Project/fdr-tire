@extends('backend.layouts.layout')
@section('content')

<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1> Admin Dashboard </h1>
        </div>
    </div>
      <hr />

     <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chart
                </div>
                 {!! Chart::display("chart", $charts) !!}
            </div>
        </div>

        <div class="col-lg-4">

            <div class="chat-panel panel panel-primary">
                <div class="panel-heading">
                    <i class="icon-comments"></i>
                    Last Activities
                </div>
                <table class = 'table table-bordered'>
                    <tbody>
                        @foreach($last as $row)
                            
                            <tr class = "{{ $row->id % 2 == 0 ? 'success' : 'danger' }}">
                                <td>{{ $row->action }}</td>
                                <td>{{ Carbon\Carbon::parse($row->created_at)->format("d F ,Y H:i:s") }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

@endsection