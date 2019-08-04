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
