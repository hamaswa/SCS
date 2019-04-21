@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="mobile"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text"
                                           class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                           name="mobile" value="{{ old('mobile') }}" required autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                           name="address" value="{{ old('address') }}" required autofocus>

                                    @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                           name="username" value="{{ old('username') }}" required>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>
                                </div>
                            </div>

                            @if(auth()->check() and auth()->user()->hasRole('administrator'))

                                <div class="form-group row{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <label for="status"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                    <div class="form-group col-sm-6">
                                        <label class="radio-inline">
                                            {!! Form::radio('status', "1", null, array("checked" => true)) !!} Active
                                        </label>

                                        <label class="radio-inline">
                                            {!! Form::radio('status', "0", null) !!} Inactive
                                        </label>
                                    </div>
                                    @if ($errors->has('status'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="form-group row{{ $errors->has('role') ? ' has-error' : '' }}">
                                    <label for="role"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                                    <div class="form-group col-sm-6">
                                        <select class="chosen-select form-control" data-placeholder="Select Role"
                                                id="role_id" name="role" required>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            @endif

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
