<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="UTF-8" />
    
    <title>{{ helper()->backendName }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <link rel="stylesheet" href="{{ asset(null) }}backend/assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset(null) }}backend/assets/css/main.css" />
    <link rel="stylesheet" href="{{ asset(null) }}backend/assets/css/theme.css" />
    <link rel="stylesheet" href="{{ asset(null) }}backend/assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="{{ asset(null) }}backend/assets/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="{{ asset(null) }}backend/assets/css/layout2.css" rel="stylesheet" />
       <link href="{{ asset(null) }}backend/assets/plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="{{ asset(null) }}backend/assets/plugins/timeline/timeline.css" />
    <!-- END PAGE LEVEL  STYLES -->
    
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset(null) }}backend//elfinder/css/elfinder.min.css">
     <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->


    <script src="{{ asset(null) }}backend/assets/plugins/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
     <script src="{{ asset(null) }}backend/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset(null) }}backend/assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- PAGE LEVEL SCRIPTS -->
<script type="text/javascript" src="{{ asset(null) }}backend/elfinder/js/elfinder.min.js"></script>
<script src="{{ asset(null) }}backend/ckeditor/ckeditor.js"></script>
   
</head>

    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body class="padTop53 " >

    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        

        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    <a href="index.html" class="navbar-brand">
                    Content Management System FDR TIRE
                        
                        </a>
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">



                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->