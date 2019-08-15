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
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="width:600px;">

    <!-- /.login-logo -->
    <div class="login-box-body">
        <h3 class="login-box-msg">{{ __('User Update') }}</h3>
        <form method="POST" action="{{ route('register.update',$user->id) }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('First Name') }}</label>
                <input id="first_name" type="text" class="form-control" name="first_name"
                       value="{{ $user->first_name }}">

                @if ($errors->has('first_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Last Name') }}</label>
                <input id="last_name" type="text" class="form-control" name="last_name"
                       value="{{ $user->last_name }}" required autocomplete="off">

                @if ($errors->has('last_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Email') }}</label>
                <input id="email" type="email" disabled class="form-control"
                       name="email" value="{{ $user->email }}" required autocomplete="off">
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            {{--<div class="form-group has-feedback col-md-6 col-sm-12">--}}
                {{--<label>{{ __('User Name') }}</label>--}}
                {{--<input id="username" type="text" class="form-control"--}}
                       {{--name="username" value="{{ $user->username }}" required autocomplete="off">--}}
                {{--@if ($errors->has('username'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('username') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}

            {{--</div>--}}
            {{--<div class="form-group has-feedback col-md-6 col-sm-12">--}}
                {{--<label>{{ __('Password') }}</label>--}}
                {{--<input id="password" type="password" class="form-control"--}}
                       {{--name="password" required autocomplete="off">--}}
                {{--@if ($errors->has('password'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}

            {{--</div>--}}
            {{--<div class="form-group has-feedback col-md-6 col-sm-12">--}}
                {{--<label>{{ __('Confirm Password') }}</label>--}}
                {{--<input id="confirm_password" type="password" class="form-control"--}}
                       {{--name="confirm_password" required autocomplete="off">--}}
                {{--@if ($errors->has('confirm_password'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('confirm_password') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Country') }}</label>
                <input id="country" type="text" class="form-control" name="country"
                       value="{{$user->country}}" required
                       autocomplete="off">
                @if ($errors->has('country'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('State') }}</label>
                <input id="state" type="text" class="form-control" name="state" value="{{ $user->state }}" required autocomplete="off">
                @if ($errors->has('state'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('City') }}</label>
                <input id="city" type="text" class="form-control" name="city" value="{{$user->city}}" required autocomplete="off">
                @if ($errors->has('city'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                @endif
            </div>
            {{--<div class="form-group has-feedback col-md-6 col-sm-12">--}}
                {{--<label>{{ __('Zipcode') }}</label>--}}
                {{--<input id="zipcode" type="text" class="form-control" name="zipcode" value="{{$user->zipcode}}" required--}}
                       {{--autocomplete="off">--}}
                {{--@if ($errors->has('zipcode'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('zipcode') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}

            <div class="form-group row{{ $errors->has('poistion_id') ? ' has-error' : '' }}">
                <label for="role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                <div class="form-group col-sm-6">
                    <select class="chosen-select form-control" data-placeholder="Select Position"
                            id="position_id" name="position_id" required>
                        @foreach($positions as $position)
                            <option {{ ($position->id==$user->position_id?"checked=checked":"") }} value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('role'))
                    <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Update User') }}</button>
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

