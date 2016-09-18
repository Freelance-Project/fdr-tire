@extends('backend.layouts.layout')

@section('content')

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
                   Elfinder
                </div>
                <div class="panel-body">

                    <div id = 'elfinder'>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
  
  

  <script type="text/javascript" charset="utf-8">
      var validation_upload = "<?php echo sha1(date('Y-m-d').env('APP_SALT'))?>";
      $().ready(function() {
          var urlImage = '{{ url("/backend/elfinder/php/connector.minimal.php") }}';
          var elf = $('#elfinder').elfinder({
              url :  urlImage + '?token='+validation_upload ,
          }).elfinder('instance');             
      });
  </script>

@endsection