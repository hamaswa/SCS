@extends('admin.layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">{{ __('Edit User') }}</div>

        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}
        <div class="box-body">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name" value="{{ $user->name }}" required autofocus>

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
                           name="mobile" value="{{ $user->mobile }}" required autofocus>

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
                           name="address" value="{{ $user->address }}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
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
                           name="email" value="{{ $user->email }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            @if(auth()->check() and auth()->user()->hasRole('administrator'))

                <div class="form-group row{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status"
                           class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                    <div class="form-group col-sm-6">
                        <label class="radio-inline">
                            @if($user->status==1)
                                {!! Form::radio('status', "1", null, array("checked" => true)) !!} Active
                            @else
                                {!! Form::radio('status', "1", null) !!} Active
                            @endif
                        </label>

                        <label class="radio-inline">
                            @if($user->status==0)
                                {!! Form::radio('status', "0", null, array("checked" => true)) !!} Inactive
                            @else
                                {!! Form::radio('status', "0", null) !!} Inactive
                            @endif
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
                                <option value="{{$role->id}}" {{ in_array($role->id,$user->roles()->get()->pluck('id')->toArray())?" selected":"" }}>{{$role->name}}</option>

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


        </div>
        <div class="box-footer">
            <div class="form-group row mb-0">
                <div class="col-md-10 offset-md-4">
                    <button type="submit" class="btn btn-primary pull-right">
                        {{ __('Update User') }}
                    </button>
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>

@endsection
