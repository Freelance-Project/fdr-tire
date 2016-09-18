@extends('backend.layouts.layout')
@section('content')

  @include('backend.common.errors')
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
                   {!! Form::model($model) !!} 

                      <div class="form-group">
                        <label>Title</label>
                        {!! Form::text('title' , null ,['class' => 'form-control','readonly'=>true]) !!}
                      </div>
                      
                      <table class = 'table'>
                          <thead>
                            <tr>
                              <th>-</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                          <tbody>
                          
                            @foreach($actions as $row)
                              <tr>
                                  <td><input  {{ $cek($row->id) }} type = 'checkbox' value = '{{ $row->id }}' name = 'action[]' />{{ $cek($row) }}</td>
                                  <td>{{ $row->title }}</td>
                              </tr>
                            @endforeach
                          
                          </tbody>

                      </table>

                      <button type="submit" class="btn btn-primary">{{ !empty($model->id) ? 'Update' : 'Save' }}</button>
                    
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection