@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">{{ __('Add Department') }}</div>

        <form method="POST" action="{{ route('departments.store') }}">
        <div class="box-body">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>

                    <div class="col-md-6">
                        <input id="title" type="text"
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
                    <label for="description"
                           class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-6">
                                    <textarea id="description"
                                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              name="description" required autofocus>
                                        {{ old('description') }}
                                    </textarea>

                        @if ($errors->has('address'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


      </div>
            <div class="box-footer">
                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-4">
                        <button type="submit" class="btn btn-primary pull-right">
                            {{ __('Add Department') }}
                        </button>
                    </div>
                </div>
            </div>
    </form>
    </div>
@endsection
