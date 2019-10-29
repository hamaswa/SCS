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


    if (!isset($applicant_data)) {
        if(isset($applicant)){
        $applicant_data = $applicant;
        }
    }
    if (isset($applicant_data)) {
        $income = $applicant_data->applicantIncome;

        $wealth = $applicant_data->applicantWealth;

        $properties = $applicant_data->applicantProperty;

        $comments = $applicant_data->applicantComments;
    }


    ?>

<div class="wrapper" id="app">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a class="logo" href="{{ url('/') }}">
{{--            {{ config('app.name', 'Laravel') }}--}}
            <img src="{{asset('img/logo.png')}}" class="img-responsive" />
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
            <ul class="sidebar-menu" data-widget="tree">
                <!-- Optionally, you can add icons to the links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{--@else--}}
                    {{--@if (Route::has('register'))--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Add User') }}</a>--}}
                    {{--</li>--}}
                    {{--@endif--}}
                @else
                    @if(request()->user()->hasRole("admin3"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("register.create") }}">Add User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("users.index") }}">Users</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("aafields.index") }}">Dropdown Options</a>
                        </li>
                    @endif
                    @if(request()->user()->hasRole("processor") or request()->user()->hasRole("maker"))
                            <li class="treeview">
                                <a href="#"><span> Pipeline</span>
                                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("aadata.index") }}">New AA</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("pipeline.index") }}">Pipeline Status</a>
                                    </li>
                                </ul>
                            </li>

                    @endif
                    @if(request()->user()->hasRole("data_entry"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("housingloan.index") }}">Facility Info</a>
                        </li>
                    @endif
                    @if(!request()->user()->hasRole("admin1") and !request()->user()->hasRole("admin1") and !request()->user()->hasRole("admin1"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("members.index") }}">Facility Info</a>
                        </li>
                    @endif
                    @if(request()->user()->hasRole("maker"))
                            <li class="treeview">
                                <a href="#"><span> Maker</span>
                                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("maker.index") }}">Maker</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route("new_aa") }}">New AA</a>
                                    </li>
                                </ul>
                            </li>
                    @endif
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route("aafields.create") }}">AA Fields</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route("aa.create") }}">NE AA</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route('users.index') }}">Users</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link" href="{{ route('orders.index') }}">Orders</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link " href="{{ route('departments.index') }}">Departments</a>--}}
                {{--</li>--}}


            @endguest
            <!--li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li-->
            </ul>
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
                <div id="tab-1" class="bg-green-gradient">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white text-black">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th colspan="4" class="text-center">Document</th>
                            </tr>
                            <tr class="bg-aqua">
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($applicant_data))
                            @if(isset($applicant_data->applicantDocuments))
                                @foreach($applicant_data->applicantDocuments as $document)
                                    <tr>
                                        <td>{{ date("Y-m-d",strtotime($document->created_at))}}</td>
                                        <td>{{ $document->doc_name }}</td>
                                        <td>{{$document->doc_status}}</td>
                                        <td><a href="{{ route("download")}}?id={{$document->id}}">view</a></td>
                                    </tr>
                                @endforeach
                            @endif
                                @endif

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
            <div id="control-sidebar-theme-demo-options-tab" class="tab-pane active tap-width">
                <div id="tab-2" class="bg-yellow-light">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th colspan="4" class="text-center">All Comments</th>
                            </tr>
                            <tr class="bg-aqua">
                                <th>Date</th>
                                <th>Status</th>
                                <th>By</th>
                            </tr>

                            </thead>
                            <tbody>
                            @if(isset($comments))
                                @foreach($comments as $comment)
                                    <tr>
                                        <td>{{ date("Y-m-d",strtotime($comment->created_at))}}</td>
                                        <td></td>
                                        <td>{{$comment->user->first_name}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b>Comments:</b><br>{!! $comment->comments !!}</td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane active tap-width" id="control-sidebar-settings-tab">
                <div id="tab-3" class="bg-chocolate border-shadlebrown">
                    <strong class="applicant padding-5"></strong>
                    <div class="table-responsive" id="incomekyc_right">
                        @include("maker.right_info_income")
                    </div>
                    <div class="table-responsive" id="wealthkyc_right">
                        @include("maker.right_info_wealth")
                    </div>

                    <div class="table-responsive" id="propertykyc_right">
                        <table class="table table-bordered table-striped table-hover bg-white">
                            <thead class="bg-light-blue">
                            <tr class="bg-light-blue-gradient">
                                <th colspan="3" class="text-center">Property</th>
                            </tr>
                            <tr class="bg-aqua">
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
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>


    <!-- modal income sources -->
    <div id="addIncomeSource" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('bussiness.storeIncomeSource') }}" method="post">
                @csrf
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Income Source</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="business_forms" value="business_forms" />
                    <input type="hidden" name="applicant_id" id="business_applicant_id"
                           value="{{ isset($applicant_data)?$applicant_data->id:""}}" />

                    <div class="col-md-4 col-sm-12 form-group ">
                        <label class="control-label">Income Source</label>
                        <select id="income_business_type" name="business_type" class="form-control" name="">
                            <option value="Business"> Business </option>
                            <option value="Salaried"> Salaried </option>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-6 col-sm-12 clearfix for_business">
                        <div class="col-md-11 col-sm-11 no-padding">
                            <label class="control-label">Shareholding</label>
                            <input name="business_shareholding" id="business_shareholding" placeholder="" class="form-control for_business" type="text">
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <h2>%</h2>
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 for_business">
                        <label class="control-label">Business Turnover (Monthly)</label>
                        <input name="business_turnover" id="business_turnover" placeholder="" class="form-control for_business" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label">Nature of Business</label>
                        <input name="business_nature" id="business_nature" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label">Position</label>
                        <input name="business_position" id="business_position" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label"><em class="text-danger">*</em>Email</label>
                        <input name="business_email" id="business_email" placeholder="" class="form-control" type="email">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label>Company Name</label>
                        <input type="text" name="bussiness_company_name" value="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label>Date Joined</label>
                        <input type="date" name="bussiness_date_established" value="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label>office Phone no.</label>
                        <input type="text" name="bussiness_office_phone_no" value="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label>Office Address</label>
                        <textarea name="bussiness_office_address" class="form-control"></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-left" name="saveIncomeSource">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
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
    $(document).on('click', '.showSearchBox',function() {
        $(".searchBox").removeClass('hide');
        $(this).removeClass('showSearchBox');
        $(this).addClass('hideSearchBox');
        $(this).text('-Applicant');
    });
    $(document).on('click', '.hideSearchBox',function() {
        $(".searchBox").addClass('hide');
        $(this).removeClass('hideSearchBox');
        $(this).addClass('showSearchBox');
        $(this).text('+Applicant');
    });
    $(document).on('change', '#income_business_type',function() {
        if($(this).val()=="Business"){
            $(".for_business").show();
        }
        else {
            $(".for_business").val("").hide();
        }
    })
</script>

</body>
</html>