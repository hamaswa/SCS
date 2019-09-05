@extends('layouts.layout')

@section('content')
    <div class="box">
        <div class="box-header">{{ __('Register') }}</div>

        {!! Form::model($select, ['route' => ['aafields.update', $select->id], 'method' => 'patch']) !!}
        <div class="card-body">


             <div class="form-group row">
                <label for="description"
                       class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="description" placeholder="name"
                           class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                           name="description" required autofocus
                           value ="{{ $select->description }}"
                    />

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>


            {{--<div class="form-group row">--}}
                {{--<label for="description"--}}
                       {{--class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>--}}

                {{--<div class="col-md-6">--}}
                    {{--<select id="type" class="form-control" name="type">--}}
                        {{--<option value="income_primary_docs" {{ ($select->type=="income_primary_docs")?"selected=selected":"" }}>--}}
                            {{--Income Primary Docs--}}
                        {{--</option>--}}

                        {{--<option value="income_support_docs" {{ ($select->type=="income_support_docs")?"selected=selected":"" }}>--}}
                            {{--Income Supporting Docs--}}
                        {{--</option>--}}


                        {{--<option value="wealth_primary_docs" {{ ($select->type=="wealth_primary_docs")?"selected=selected":"" }}>--}}
                            {{--Wealth Primary Docs--}}
                        {{--</option>--}}

                        {{--<option value="wealth_support_docs" {{ ($select->type=="wealth_support_docs")?"selected=selected":"" }}>--}}
                            {{--Wealth Supporting Docs--}}
                        {{--</option>--}}

                        {{--<option value="Property_primary_docs" {{ ($select->type=="Property_primary_docs")?"selected=selected":"" }}>--}}
                            {{--Property Primary Docs--}}
                        {{--</option>--}}

                        {{--<option value="property_support_docs" {{ ($select->type=="property_support_docs")?"selected=selected":"" }}>--}}
                            {{--Property Supporting Docs--}}
                        {{--</option>--}}

                        {{--<option value="facility_type" {{ ($select->type=="facility_type")?"selected=selected":"" }}>--}}
                            {{--Facility Type--}}
                        {{--</option>--}}

                        {{--<option value="nature_of_business">--}}
                        {{--Nature of Business--}}
                        {{--</option>--}}

                        {{--<option value="position">--}}
                        {{--Applicantio KYC Position--}}
                        {{--</option>--}}
                        {{--<option value="salutation">--}}
                        {{--Salutation--}}
                        {{--</option>--}}
                        {{--<option value="aasource">--}}
                        {{--AASource--}}
                        {{--</option>--}}
                        {{--<option value="aabranch">--}}
                        {{--AABranch--}}
                        {{--</option>--}}
                        {{--<option value="aacategory">--}}
                        {{--AACategory--}}
                        {{--</option>--}}
                        {{--<option value="aatype">--}}
                        {{--AAType--}}
                        {{--</option>--}}

                    {{--</select>--}}

                    {{--@if ($errors->has('description'))--}}
                        {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('description') }}</strong>--}}
                                    {{--</span>--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}


        </div>
        <div class="box-footer">
            <div class="form-group row mb-0">
                <div class="col-md-10 offset-md-4">
                    <button type="submit" id="submit" class="btn btn-primary pull-right">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
