@extends('layouts.app')

@section('content')

    <div class="box">
        <div class="box-header">{{ __('Register') }}</div>
        <form method="POST" action="{{ route('register') }}">
            <div class="box-body">
                @csrf

                    <div class="form-group row {{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control"
                                    name="country" id="country" title="Country">
                                <option>-- select --</option>
                                <option {{ old('country')=='IN'?'selected':"" }} value="IN">Indonesia</option>
                                <option {{ old('country')=='MY'?'selected':"" }} value="MY">Malaysia</option>
                                <option {{ old('country')=='SG'?'selected':"" }} value="SG">Singapore</option>
                            </select></div>
                    </div>
                    <div class="form-group row{{ $errors->has('memberid') ? ' has-error' : '' }}">
                        <label for="memberid"
                               class="col-md-4 col-form-label text-md-right">{{ __('Member II') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control"
                                    style="width:210px;" type="text" title="Member ID"
                                    name="memberid" id="memberid" maxlength="45" value="{{ old("memberid") }}" />
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control " name="type"
                                    id="type" title="Type">
                                <option value="2">IES Member</option>
                                <option value="3">Tele-Marketer</option>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="enabletelemarkaccess"
                               class="col-md-4 col-form-label text-md-right">{{ __('Telemark Access') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control {{ $errors->has('enabletelemarkaccess') ? ' is-invalid' : '' }}"
                                    name="enabletelemarkaccess" id=enabletelemarkaccess"
                                    title="Telemark Access">
                                <option selected="selected" style="font-weight:bold;" value="Y">Allowed</option>
                                <option value="N">Disallowed</option>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="username"
                               class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                    style="width:210px;" type="text" title="Email Username"
                                    name="username" required value="{{ old("username") }}" id="username" maxlength="90">
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                        <div class="col-md-6"><input type="password"
                                                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                     style="width:210px;" title="Password" name="password"
                                                     id="password" maxlength="150">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="row">
                        <h4 align="center">Personal Details</h4>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upline ID') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('uplineid') ? ' is-invalid' : '' }}"
                                    style="width:210px;" type="text" title="Upline ID"
                                    name="uplineid" value="{{ old("uplineid") }}" id="uplineid" maxlength="30"></div>
                    </div>
                    <div class="form-group row">
                        <label for="bankgroup"
                               class="col-md-4 col-form-label text-md-right">{{ __('Bank Group') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control{{ $errors->has('bankgroup') ? ' is-invalid' : '' }}"
                                    name="bankgroup" id="bankgroup" title="Bank Group">
                                <option>-- select --</option>
                                <option value="ABMB">ABMB</option>
                                <option value="Al-Rajhi">Al-Rajhi</option>
                                <option value="AMB">AMB</option>
                                <option value="CIMB">CIMB</option>
                                <option value="CTB">CTB</option>
                                <option value="HLB">HLB</option>
                                <option value="HSBC">HSBC</option>
                                <option value="MBB">MBB</option>
                                <option value="MBSB">MBSB</option>
                                <option value="OCBC">OCBC</option>
                                <option value="PBB">PBB</option>
                                <option value="RHB">RHB</option>
                                <option value="SC">SC</option>
                                <option value="UOB">UOB</option>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="rankid" class="col-md-4 col-form-label text-md-right">{{ __('Rank') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control {{ $errors->has('rankid') ? ' is-invalid' : '' }}" name="rankid"
                                    id="rankid" title="Rank">
                                <option>-- select --</option>
                                <option value="1">Advisor</option>
                                <option value="2">Executive Advisor</option>
                                <option value="3">Business Associate</option>
                                <option value="4">Associate Partner</option>
                                <option value="5">Partner</option>
                                <option value="6">Company</option>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                        <div class="col-md-6"><input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                     type="text" title="Full Name" name="name"
                                                     id="name" required value="{{ old("name") }}" maxlength="150">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif</div>
                    </div>
                    <div class="form-group row">
                        <label for="nric" class="col-md-4 col-form-label text-md-right">{{ __('New IC') }}</label>
                        <div class="col-md-6"><input class="form-control{{ $errors->has('nric') ? ' is-invalid' : '' }}"
                                                     style="width:160px;" value="{{old('nric')}}" type="text" title="Country" name="nric"
                                                     id="nric" maxlength="45"></div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>
                        <div class="col-md-6"><input class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}"
                                                     style="width:160px;" readonly="" type="text" title="DOB"
                                                     name="dob"  value="{{old('dob')}}" id="dob" maxlength="10">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}"
                                    style="width:160px;"  value="{{old('nric')}}" type="text" title="Country"
                                    name="gender" id="gender" maxlength="6"></div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    style="width:400px;"  value="{{old('address')}}" type="text" title="Country" name="address"
                                    id="address" maxlength="150"></div>
                    </div>

                    <div class="form-group row">
                        <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                    style="width:160px;"  value="{{old('postcode')}}" type="text" title="Country"
                                    name="postcode" id="postcode" maxlength="50"></div>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                        <div class="col-md-6"><input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                                     style="width:160px;"  type="text" title="Country" name="city"
                                                     id="city" maxlength="135"></div>
                    </div>
                    <div class="form-group row">
                        <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                    style="width:160px;" type="text" title="Country" name="state"
                                    id="state" maxlength="135"></div>
                    </div>
                    <div class="row">
                        <h4 align="center">Contact Details</h4>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}"
                                    style="width:250px;" type="text" title="Country"
                                    name="mobile" id="mobile" maxlength="45"></div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    style="width:250px;" type="text" title="Email" name="email"
                                    id="email" maxlength="150"></div>
                    </div>
                    <div class="form-group row">
                        <label for="altemail"
                               class="col-md-4 col-form-label text-md-right">{{ __('Alternate Email') }}</label>
                        <div class="col-md-6"><input
                                    class="form-control{{ $errors->has('altemail') ? ' is-invalid' : '' }}"
                                    style="width:250px;" type="text" title="Alternative Email"
                                    name="altemail" id="altemail" maxlength="150"></div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-6"><select
                                    class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status"
                                    id="status" title="Status">
                                <option value="0">Inactive</option>
                                <option selected="selected" style="font-weight:bold;" value="1">Active</option>
                            </select></div>
                    </div>
                    <div class="form-group row">
                        <h4 align="center">Proxy Detail</h4>
                    </div>
                    <div class="form-group row">
                        <label for="insuranceid"
                               class="col-md-4 col-form-label text-md-right">{{ __('Insurance ID') }}</label>
                        <div class="col-md-6"><input class="form-control" style="width:250px;" type="text"
                                                     title="Insurance ID"
                                                     name="insuranceid" id="insuranceid" maxlength="60"></div>
                    </div>
                    <div class="form-group row">
                        <label for="bankpayee"
                               class="col-md-4 col-form-label text-md-right">{{ __('Payee Name') }}</label>
                        <div class="col-md-6"><input class="form-control" style="width:250px;" type="text"
                                                     title="Payee Name"
                                                     name="bankpayee" id="bankpayee" maxlength="120"></div>
                    </div>
                    <div class="form-group row">
                        <label for="bankaccount"
                               class="col-md-4 col-form-label text-md-right">{{ __('Bank Account No') }}</label>
                        <div class="col-md-6"><input class="form-control" style="width:250px;" type="text"
                                                     title="Bank Account No"
                                                     name="bankaccount" id="bankaccount" maxlength="90"></div>
                    </div>
                    <div class="form-group row">
                        <label for="banktype"
                               class="col-md-4 col-form-label text-md-right">{{ __('Bank Type') }}</label>
                        <div class="col-md-6"><input class="form-control" style="width:250px;" type="text"
                                                     title="Bank Type"
                                                     name="banktype" id="banktype" maxlength="50"></div>
                    </div>


            <!--

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

                                <input name="status" class="form-control" type="checkbox" data-toggle="toggle"
                                       data-onstyle="success" data-on="Active" data-off="Inactive">

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

                    -->


            </div>
            <div class="box-footer">
                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-4">
                        <button type="submit" class="btn btn-primary pull-right">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@push("scripts")
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@endpush
