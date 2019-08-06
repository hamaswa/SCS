<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("css/font-awesome.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("css/ionicons.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("css/AdminLTE.min.css") }}">
    <!-- iCheck -->
    {{--<link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">--}}
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <link rel="stylesheet" href="{{ asset("css/skins/skin-blue.min.css") }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width:600px;">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <h3 class="login-box-msg">{{ __('Register') }}</h3>

        <form method="POST" action="{{ route('register') }}">
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('First Name') }}</label>
                <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus autocomplete="off">

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Last Name') }}</label>
                <input id="last_name" type="text" class="form-control" name="last_name" value="" required autocomplete="off" >

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="off" >

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('User Name') }}</label>
                <input id="username" type="text" class="form-control" name="username" value="" required autocomplete="off">

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label >{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required autocomplete="off">

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Confirm Password') }}</label>
                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required autocomplete="off">

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Country') }}</label>
                <input id="country" type="text" class="form-control" name="country" value="" required autocomplete="off">
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('State') }}</label>
                <input id="state" type="text" class="form-control" name="state" value="" required autocomplete="off">
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('City') }}</label>
                <input id="city" type="text" class="form-control" name="city" value="" required autocomplete="off">
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Zipcode') }}</label>
                <input id="zipcode" type="text" class="form-control" name="zipcode" value="" required autocomplete="off">
            </div>
            <div class="form-group col-md-12 col-sm-12">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label  class="form-check-label" for="remember">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <input type="checkbox">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->

                <!-- /.col -->
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<script src="{{asset("js/app.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("js/adminlte.min.js")}}"></script>
<!-- jQuery 3 -->
{{--<script src="../../bower_components/jquery/dist/jquery.min.js"></script>--}}
<!-- Bootstrap 3.3.7 -->
{{--<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>--}}


</body>
</html>

<?php
/*
@extends('admin.layouts.app')

@section('content')
    <section class="content">
        <div class="box login-box center-block">
            <div class="box-header">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
        <div class="login-box-body">


                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                    <div class="col-md-6">
                        <input id="username" type="username" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>



        </div>
            <div class="box-fotter">
                <div class="form-group row mb-0">
                    <div class="col-md-12 offset-md-4">
                        <button type="submit" class="btn btn-primary center-block">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link center-block" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            </form>
    </div>
    </section>
@endsection
*/
?>