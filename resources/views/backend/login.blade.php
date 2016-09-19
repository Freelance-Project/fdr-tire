@extends('backend.layouts.login')
@section('content') 
          
    <div class="container">
    <div class="text-center">
      <h3>Content Management System</h3>
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
                {!! Form::open(['class'=>'form-signin']) !!}
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your username and password
                </p>
                {!! Form::text('username' , null ,  ['placeholder' => 'Username','class' => 'form-control'] ) !!}
                {!! Form::password('password' ,  ['placeholder' => 'Password','class' => 'form-control'] ) !!}
                <button class="btn text-muted text-center btn-danger" type="submit">Sign in</button>
            
              {!! Form::close() !!}
        </div>
        <div id="forgot" class="tab-pane">
                {!! Form::open(['class'=>'form-signin']) !!}
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                {!! Form::text('email' , null ,  ['placeholder' => 'Email','class' => 'form-control'] ) !!}
                <div style = 'margin-top:10px;color:red;'> {{ @$errors->first('email') }} </div>
                <p>&nbsp;</p>
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            
              {!! Form::close() !!}
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab">Login</a></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a></li>
        </ul>
    </div>


</div>
           
@endsection
@section('script')
    
    @if(@$errors->any() || Session::has('message'))

       <script type="text/javascript">
            swal({
              type : "error",
              title: "Error",
              text: "User not Found!",
              html: true
            });
        </script>

    @endif

@endsection