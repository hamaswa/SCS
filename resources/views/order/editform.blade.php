@extends('layouts.layout')

@section('content')
    <div class="box">
        <div class="box-header">{{ __('Register') }}</div>

        {!! Form::model($order, ['route' => ['orders.update', $order->id], 'method' => 'patch']) !!}
        <div class="box-body">

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Order Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title" value="{{ $order->title }}" required autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>


            </div>

            <div class="form-group row">
                <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Order Amount') }}</label>

                <div class="col-md-6">
                    <input id="amount" type="text"
                           class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                           name="amount" value="{{ $order->amount }}" required autofocus>

                    @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
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
                                              name="description"  required autofocus>
                                        {{ $order->description }}
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
                        {{ __('Update Order') }}
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
