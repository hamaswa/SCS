<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>  <!-- Tell the browser to be responsive to screen width -->


    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link href="{{asset("css/bootstrap-datepicker.min.css")}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("css/AdminLTE.min.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <link rel="stylesheet" href="{{ asset("css/skins/skin-blue.min.css") }}">

    <!-- Select2 Style -->
    <link rel="stylesheet" href="{{asset("css/select2.css")}}"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('style')

</head>

<body class="hold-transition skin-blue sidebar-open">

<div class="wrapper" id="app">



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


    @yield('content')


    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="{{asset("js/app.js")}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{asset("js/bootstrap-datepicker.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("js/adminlte.min.js")}}"></script>
<!-- Select2 js -->
<script src="{{asset("js/select2.js")}}"></script>
@stack('scripts')
</body>
</html>