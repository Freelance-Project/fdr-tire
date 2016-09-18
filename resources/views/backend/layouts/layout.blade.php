@include('backend.layouts.header')

@include('backend.layouts.menu')

        <div id="content">
            @yield('content')
        </div>  


@include('backend.layouts.footer')

@include('backend.elfinder')
@if(Session::has('infos'))
<script type="text/javascript">
    swal({
        type: 'warning',
        title : 'Warning',
        text : '{{ Session::get("infos") }}',
    });
</script>

@endif

@yield('script')
</body>

    <!-- END BODY -->
</html>
