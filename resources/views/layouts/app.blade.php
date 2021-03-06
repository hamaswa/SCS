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
<?php

if (isset($applicant)) {
    $income = $applicant->applicantIncome;
    $wealth = $applicant->applicantWealth;
    $properties = $applicant->applicantProperty;
}
if((request()->segment(1)) != 'pipeline' && (request()->segment(1)) != 'aadata'){
?>
<style>
    .skin-blue .main-header .navbar {
        background-color: #3c8dbc !important;
        background-image: none;
    }
</style>
<?php } ?>
<div class="wrapper" id="app">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
            {{--            {{ config('app.name', 'Laravel') }}--}}
            <img src="{{asset('img/logo.png')}}" class="img-responsive"/>
        </a>
        <!--a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels ->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- logo for regular state and mobile devices ->
          <span class="logo-lg"><b>Admin</b>LTE</span>
        </a-->

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    @auth
                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown">
                                {{ Auth::user()->first_name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">


                                <li class="user-footer">

                                    <div class="pull-right">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>


                            </ul>
                        </li>
                @endauth
                <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>

                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">

                </div>


            </div>


            <!-- Sidebar Menu -->
        @include("layouts.sidebar_menu")

            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


    @yield('content')


    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <aside class="control-sidebar">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="tab-toggle bg-gray-light">
                <a href="javascript:void(0)" data-status="show" data-tab-id="control-sidebar-theme-demo-options-tab"
                   class="switchDetail bg-gray-light">
                    {{--<img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30 pull-left" />--}}

                    <h3 class="no-margin text-center">
                        <strong id="document-icon" class="pull-left sidebar-top-icon">&lt;</strong> DOCUMENT
                    </h3>
                </a>
            </li>
            <li class="tab-toggle bg-gray-light">
                <a href="javascript:void(0)" data-status="show" data-tab-id="control-sidebar-home-tab"
                   class="switchDetail bg-gray-light">
                    {{--<img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30 pull-left" />--}}

                    <h3 class="no-margin text-center">
                        <strong id="comment-icon" class="pull-left sidebar-top-icon">&lt;</strong> COMMENT
                    </h3>
                </a>
            </li>
            <li class="tab-toggle bg-gray-light">
                <a href="javascript:void(0)" data-status="show" data-tab-id="control-sidebar-settings-tab"
                   class="switchDetail bg-gray-light">
                    {{--<img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30 pull-left" />--}}

                    <h3 class="no-margin text-center">
                        <strong id="overview-icon" class="pull-left sidebar-top-icon">&lt;</strong>OVERVIEW
                    </h3>
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tab-data">
            <!-- Home tab content -->
            <div class="tab-pane active tap-width" id="control-sidebar-home-tab">
                <div id="tab-1">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white text-black table-condensed">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th colspan="4" class="text-center">Document</th>
                            </tr>
                            <tr class="bg-gray-dark">
                                <th>Date</th>
                                <th>Name</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($applicant->applicantDocuments))
                                @foreach($applicant->applicantDocuments as $document)
                                    <tr>
                                        <td>{{ date("Y-m-d",strtotime($document->created_at))}}</td>
                                        <td>{{ $document->doc_name }}</td>
                                        <td>{{$document->guide_lines}}</td>
                                        <td><a href="{{ route("download")}}?id={{$document->id}}">view</a></td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active tap-width">
                <div id="tab-2">
                </div>
            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane active tap-width" id="control-sidebar-settings-tab">
                <div id="tab-3">
                    <strong class="applicant padding-5"></strong>
                    <div class="table-responsive" id="incomekyc_right">
                        @include("aadata.right_info_income")
                    </div>
                    <div class="table-responsive" id="wealthkyc_right">
                        @include("aadata.right_info_wealth")
                    </div>

                    <div class="table-responsive" id="propertykyc_right">
                        <table class="table table-bordered table-striped table-hover bg-white table-condensed">
                            <thead class="bg-light-blue">
                            <tr class="bg-light-blue-gradient">
                                <th colspan="3" class="text-center">Property</th>
                            </tr>
                            <tr class="bg-gray-dark">
                                <th>MV</th>
                                <th>OS</th>
                                <th>CO</th>
                            </tr>
                            </thead>
                            <tbody id="propertyright" class="propertyright">
                            <?php
                            $total_mv = 0;
                            $total_os = 0;
                            $total_co = 0;

                            ?>
                            @if(isset($properties))
                                @foreach($properties as  $property)
                                    <?php
                                    $total_mv += $property->property_market_value;
                                    $total_os += $property->property_loan_outstanding;

                                    ?>
                                    <tr>
                                        <td>{{$property->property_market_value}}</td>
                                        <td>{{$property->property_loan_outstanding}}</td>
                                        <td>{{ ($property->property_market_value * (0.9) - $property->property_loan_outstanding*1) }}</td>
                                    </tr>
                                @endforeach
                                <tr class='bg-green'>
                                    <td colspan=3>Total</td>
                                </tr>
                                <tr class=bg-green>
                                    <td>{{$total_mv}}</td>
                                    <td>{{$total_os}}</td>
                                    <td>{{ $total_mv * (0.9) - $total_os }}</td>
                                </tr>
                            @endif

                            </tbody>

                        </table>
                    </div>


                </div>
                <div id="tab-4" class="">
                    <div class="table-responsive" id="new_facility">

                    </div>
                    <div class="table-responsive" id="existing_commitment">
                    </div>

                    <div class="table-responsive" id="new_commitment">
                    </div>
                </div>

            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>

</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script src="{{asset("js/app.js")}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="{{asset("js/bootstrap-datepicker.min.js")}}"></script>
<script src="{{asset("js/bootstrap-rating.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("js/adminlte.min.js")}}"></script>
<!-- Select2 js -->
<script src="{{asset("js/select2.js")}}"></script>
@stack('scripts')
<script>
    $(document).ready(function () {
        if ($(window).width() < 990) {
            $('body').removeClass('sidebar-open');
            $('.mobile-view-text').text('Application');
        }
    });

    function showRightSidebar() {
        $('.show-right-detail').removeClass('hide');
    }

    $(document).on('click', '.switchDetail', function () {
        var id = $(this).attr('data-tab-id');
        var status = $(this).attr('data-status');
        if (status == 'show') {
            $("#" + id).removeClass('active');
            $(this).attr('data-status', 'hide');
            $(this).find('.sidebar-top-icon').html('&gt;');
            $(this).css('width', '180px');
            var total = $(".tab-data").find('.active').length;
            if (total == 3 || total == 0) {
                $('.switchDetail').removeAttr('style');
                $(".tab-toggle").removeAttr('style');
                $(".tab-toggle").removeClass('minimize-width');
                $(".tab-toggle").removeClass('expand-width');
                // if(total == 0){
                //     $('.control-sidebar').removeClass('control-sidebar-open');
                // }
            } else {
                $(".tab-toggle").css('width', '20px');
                $(this).parent().addClass('minimize-width');
                $(this).parent().removeClass('expand-width');
                $(this).parent().removeAttr('style');
                if ($('.minimize-width')) {
                    $('.minimize-width').removeAttr('style');
                }
            }
            var total_width = 1290 / total;
            if ($('.tap-width').hasClass('active')) {
                $('.tap-width').css('width', total_width);
            }

        } else {
            $("#" + id).addClass('active');
            $(this).attr('data-status', 'show');
            $(this).find('.sidebar-top-icon').html('&lt;');
            $('.switchDetail').css('width', '180px');
            $(this).removeAttr('style');
            var total = $(".tab-data").find('.active').length;
            var total_width = 1290 / total;

            if (total == 3 || total == 0) {
                $('.switchDetail').removeAttr('style');
                $(".tab-toggle").removeAttr('style');
                $(".tab-toggle").removeClass('minimize-width');
                $(".tab-toggle").removeClass('expand-width');

            } else {
                // $(".tab-toggle").css('width','20px');
                $(this).parent().addClass('expand-width');
                $(this).parent().removeClass('minimize-width');
                $(this).parent().css('width', '20px');
                if ($('.minimize-width')) {
                    $('.minimize-width').removeAttr('style');
                } else {
                    $(".tab-toggle").removeAttr('style');
                }
            }
            var total_width = 1290 / total;
            if ($('.tap-width').hasClass('active')) {
                $('.tap-width').css('width', total_width);
            }
        }

    });
</script>

</body>
</html>