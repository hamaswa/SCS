<!DOCTYPE html>
<html>
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
        <h3 class="login-box-msg">{{ $user->first_name . " " . $user->last_name }}</h3>
        <form method="POST" action="{{ route('register.update', $user->id) }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Code') }}</label>
                <select class="form-control" name="code" required>
                    <option {{ $user->code=="PG"?"selected":"" }} value="PG">PG</option>
                    <option {{ $user->code=="REA"?"selected":"" }} value="REA">REA</option>
                    <option {{ $user->code=="INS"?"selected":"" }} value="INS">INS</option>
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
                    <option {{ $user->area=="KL"?"selected":"" }} value="KL">KL</option>
                    <option {{ $user->area=="JB"?"selected":"" }} value="JB">JB</option>
                    <option {{ $user->area=="PN"?"selected":"" }} value="PN">PN</option>
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
            <?php
            /*
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Email') }}</label>
                <input id="email" type="email" class="form-control"
                       name="email" value="{{ $user->email }}" required autocomplete="off">
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('User Name') }}</label>
                <input id="username" type="text" class="form-control"
                       name="username" value="{{ $user->username') }}" required autocomplete="off">
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
            */
            ?>

            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Bank Group') }}</label>
                <select name="bank" id="bank" class="form-control" required>
                    <option value=""></option>
                    <option value="ABMB" {{ $user->bank=="ABMB"?"selected":"" }}>ABMB</option>
                    <option value="HLBB" {{ $user->bank=="HLBB"?"selected":"" }}>HLBB</option>
                    <option value="MBB" {{ $user->bank=="MBB"?"selected":"" }}>MBB</option>
                    <option value="SCB" {{ $user->bank=="SCB"?"selected":"" }}>SCB</option>
                    <option value="OCBC" {{ $user->bank=="OCBC"?"selected":"" }}>OCBC</option>
                    <option value="MBSB" {{ $user->bank=="MBSB"?"selected":"" }}>MBSB</option>
                    <option value="SCB" {{ $user->bank=="SCB"?"selected":"" }}>SCB</option>
                    <option value="PBB" {{ $user->bank=="SCB"?"selected":"" }}>PBB</option>
                </select>
                {{--<input id="bank" type="text" class="form-control"--}}
                       {{--name="bank" required autocomplete="off" value="{{$user->bank}}">--}}
                @if ($errors->has('bank'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('bank') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Bank Name') }}</label>
                <input id="bank_name" type="text" class="form-control"
                       name="bank_name" required autocomplete="off" value="{{$user->bank_name}}">
                @if ($errors->has('bank_name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Account No') }}</label>
                <input id="account_no" type="text" class="form-control"
                       name="account_no" required autocomplete="off" value="{{$user->account_no}}">
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
                        <td><input type="checkbox" name="PCE" value="1" {{ ($user->PCE==1?"checked":"") }}  class="checkbox-custom" /> </td>
                        <td><input type="checkbox" name="CEILI" value="1" {{ ($user->CEILI==1?"checked":"") }} class="checkbox-custom" /></td>
                        <td><input type="checkbox" name="REN" value="1" {{ ($user->REN==1?"checked":"") }} class="checkbox-custom" /> </td>
                    </tr>
                    </tbody>
                </table>


            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Salary') }}</label>
                <input id="salary" type="text" class="form-control" name="salary"  required
                       autocomplete="off" value="{{$user->salary}}">
                @if ($errors->has('salary'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Scheme') }}</label>
                <select class="form-control" name="scheme" required>
                    <option {{ ($user->scheme=="staff"?"selected=selected":"") }} value="staff">Staff</option>
                    <option {{ ($user->scheme=="user"?"selected=selected":"") }} value="user">User</option>
                    <option {{ ($user->scheme=="agent"?"selected=selected":"") }} value="agent">Agent</option>
                </select>
                @if ($errors->has('scheme'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('scheme') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('Country') }}</label>
                <input id="country" type="text" class="form-control" name="country"  required
                       autocomplete="off" value="{{$user->country}}">
                @if ($errors->has('country'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('State') }}</label>
                <input id="state" type="text" class="form-control" name="state"
                       required autocomplete="off" value="{{$user->state}}">
                @if ($errors->has('state'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group has-feedback col-md-6 col-sm-12">
                <label>{{ __('City') }}</label>
                <input id="city" type="text" class="form-control" name="city"
                       required autocomplete="off"  value="{{$user->state}}">
                @if ($errors->has('city'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group row{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label for="role"
                       class="col-md-4 col-form-label text-md-right">{{ __('Top User') }}</label>
                <div class="form-group col-sm-6">
                    <select class="chosen-select form-control" data-placeholder="Select User"
                            id="parent_id" name="parent_id" required>
                        <option value="1" {{$user->parent_id==1?"selected=selected":""}}>
                            No Parent Needed
                        </option>
                        @foreach($users as $sub_user)
                            <option {{ ($user->parent_id==$sub_user->id?"selected=selected":"") }}
                                    value="{{$sub_user->id}}">
                            {{$sub_user->username}}
                            </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('parent_id'))
                    <span class="help-block">
        <strong>{{ $errors->first('parent_id') }}</strong>
        </span>
                @endif
            </div>

            <div class="form-group row{{ $errors->has('position_id') ? ' has-error' : '' }}">
                <label for="position"
                       class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>
                <div class="form-group col-sm-6">
                    <select class="chosen-select form-control" data-placeholder="Select Position"
                            id="position_id" name="position_id" required>
                        @foreach($positions as $position)
                            <option {{($user->position_id=$position->id?"selected=selected":"")}}
                                    value="{{$position->id}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->has('position_id'))
                    <span class="help-block">
                                <strong>{{ $errors->first('position_id') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group col-sm-6" >
                <label for="status">Status:</label>
                <label class="radio-inline">
                    <input  {{$user->status==1?"checked=checked":""}} name="status" type="radio" value="1" id="status"> Active
                </label>

                <label class="radio-inline">
                    <input name="status" {{$user->status==0?"checked=checked":""}} type="radio" value="0" id="status"> Inactive
                </label>

            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Update User') }}</button>
            </div>
        </form>
        <?php
        /**
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

        <div class="form-group row{{ $errors->has('parent_id') ? ' has-error' : '' }}">
        <label for="role"
        class="col-md-4 col-form-label text-md-right">{{ __('Top User') }}</label>
        <div class="form-group col-sm-6">
        <select class="chosen-select form-control" data-placeholder="Select User"
        id="parent_id" name="parent_id" required>
        <option value="1" {{$user->parent_id==1?"checked=checked":""}}>
        No Parent Needed
        </option>
        @foreach($users as $sub_user)
        <option {{ ($user->parent_id==$sub_user->id?"checked=checked":"") }}
        value="{{$sub_user->id}}"">
        {{$sub_user->username}}
        </option>
        @endforeach
        </select>
        </div>
        @if ($errors->has('parent_id'))
        <span class="help-block">
        <strong>{{ $errors->first('parent_id') }}</strong>
        </span>
        @endif
        </div>

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
        @if ($errors->has('position_id'))
        <span class="help-block">
        <strong>{{ $errors->first('position_id') }}</strong>
        </span>
        @endif
        </div>


        <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Update User') }}</button>
        </div>
        </form>
         */
        ?>

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

