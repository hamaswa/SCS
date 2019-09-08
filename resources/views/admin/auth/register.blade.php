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
        <h3 class="login-box-msg">{{ __('Register') }}</h3>
        <form method="POST" action="{{ route('register.store') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Code') }}</label>
                <select class="form-control" name="code" required>
                    <option value=""></option>
                    <option value="PG">PG</option>
                    <option value="REA">REA</option>
                    <option value="INS">INS</option>
                </select>

                @if ($errors->has('code'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Area') }}</label>
                <select class="form-control" name="area" required>
                    <option value=""></option>
                    <option value="KL">KL</option>
                    <option value="JB">JB</option>
                    <option value="PN">PN</option>
                </select>

                @if ($errors->has('area'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                @endif
            </div>


            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('First Name') }}</label>
                <input id="first_name" type="text" class="form-control" name="first_name"
                       value="{{ old('first_name') }}">

                @if ($errors->has('first_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Last Name') }}</label>
                <input id="last_name" type="text" class="form-control" name="last_name"
                       value="{{ old('last_name') }}" required autocomplete="off">

                @if ($errors->has('last_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control"
                       name="email" value="{{ old('email') }}" required autocomplete="off">
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('User Name') }}</label>
                <input id="username" type="text" class="form-control"
                       name="username" value="{{ old('username') }}" required autocomplete="off">
                @if ($errors->has('username'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control"
                       name="password" required autocomplete="off">
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Confirm Password') }}</label>
                <input id="confirm_password" type="password" class="form-control"
                       name="confirm_password" required autocomplete="off">
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Bank Group') }}</label>
                <select name="bank" id="bank" class="form-control" required>
                    <option value=""></option>
                    <option value="ABMB">ABMB</option>
                    <option value="HLBB">HLBB</option>
                    <option value="MBB">MBB</option>
                    <option value="SCB">SCB</option>
                    <option value="OCBC">OCBC</option>
                    <option value="MBSB">MBSB</option>
                    <option value="SCB">SCB</option>
                    <option value="PBB">PBB</option>
                </select>
                {{--<input id="bank" type="text" class="form-control"--}}
                       {{--name="bank" required autocomplete="off">--}}
                @if ($errors->has('bank'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Bank Name') }}</label>
                <input id="bank_name" type="text" class="form-control"
                       name="bank_name" required autocomplete="off">
                @if ($errors->has('bank_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Account No') }}</label>
                <input id="account_no" type="text" class="form-control"
                       name="account_no" required autocomplete="off">
                @if ($errors->has('account_no'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('account_no') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="bg-light-blue-gradient">
                        <th>PCE</th>
                        <th>CEILI</th>
                        <th>REN</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="checkbox" name="PCE" value="1" checked class="checkbox-custom" /> </td>
                        <td><input type="checkbox" name="CEILI" value="1" checked class="checkbox-custom" /></td>
                        <td><input type="checkbox" name="REN" value="1" class="checkbox-custom" /> </td>
                    </tr>
                    </tbody>
                </table>


            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Salary') }}</label>
                <input id="salary" type="text" class="form-control" name="salary" value="" required
                       autocomplete="off">
                @if ($errors->has('salary'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Scheme') }}</label>
                <select class="form-control" name="scheme" required>
                    <option value="staff">Staff</option>
                    <option value="user">User</option>
                    <option value="agent">Agent</option>
                </select>
                @if ($errors->has('scheme'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('scheme') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Country') }}</label>
                <input id="country" type="text" class="form-control" name="country" value="" required
                       autocomplete="off">
                @if ($errors->has('country'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('State') }}</label>
                <input id="state" type="text" class="form-control" name="state" value="" required autocomplete="off">
                @if ($errors->has('state'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('City') }}</label>
                <input id="city" type="text" class="form-control" name="city" value="" required autocomplete="off">
                @if ($errors->has('city'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                @endif
            </div>
            {{--<div class="form-group has-feedback col-md-6 col-sm-12">--}}
                {{--<label>{{ __('Zipcode') }}</label>--}}
                {{--<input id="zipcode" type="text" class="form-control" name="zipcode" value="" required--}}
                       {{--autocomplete="off">--}}
                {{--@if ($errors->has('zipcode'))--}}
                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('zipcode') }}</strong>--}}
                                    {{--</span>--}}
                {{--@endif--}}
            {{--</div>--}}

            <div class="form-group row{{ $errors->has('position_id') ? ' has-error' : '' }}">
                <label for="position"
                       class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                <div class="form-group col-sm-6">
                    <select class="chosen-select form-control" data-placeholder="Select Position"
                            id="position_id" name="position_id" required>
                        @foreach($positions as $position)
                            <option value="{{$position->id}}"  {{ $position->id==3?"selected=selected":"" }}>{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('role'))
                    <span class="help-block">
                                <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6" >
                <label for="status">Status:</label>
                <label class="radio-inline">
                    <input checked="checked" name="status" type="radio" value="1" id="status"> Active
                </label>

                <label class="radio-inline">
                    <input name="status" type="radio" value="0" id="status"> Inactive
                </label>

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

