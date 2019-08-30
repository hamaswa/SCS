@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Data Entry</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>
    <section class="content">
        <div class="box">
            <div id="response"></div>
            <div class="box-header">{{ __('Register') }}</div>
            <form method="POST" id="aafields" action="{{ route('aafields.store') }}">
                @csrf
                <div class="card-body">


                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Slug') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   name="name" placeholder="slug" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>


                    </div>


                    <div class="form-group row">
                        <label for="description"
                               class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="description" placeholder="name"
                                   class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                   name="description" required autofocus
                                   value ="{{ old('description') }}"
                            />

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="description"
                               class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                        <div class="col-md-6">
                            <select id="type" class="form-control" name="type">
                                <option value="income_primary_docs">
                                    Income Primary Docs
                                </option>

                                <option value="income_support_docs">
                                    Income Supporting Docs
                                </option>


                                <option value="wealth_primary_docs">
                                    Wealth Primary Docs
                                </option>

                                <option value="wealth_support_docs">
                                    Wealth Supporting Docs
                                </option>

                                <option value="Property_primary_docs">
                                    Property Primary Docs
                                </option>

                                <option value="property_support_docs">
                                    Property Supporting Docs
                                </option>

                                <option value="facility_type">
                                    Facility Type
                                </option>

                                <option value="nature_of_business">
                                    Nature of Business
                                </option>

                                <option value="position">
                                    Applicantio KYC Position
                                </option>
                                <option value="salutation">
                                    Salutation
                                </option>
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

                            </select>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


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
            </form>
        </div>
    </section>

@endsection

@push("scripts")
    <script type="text/javascript">

        $("select").select2({allowclear:true});

        $(document).ready(function(){
            $("#submit").click(function(){

                event.preventDefault(); //prevent default action


                $.ajax({
                    url :'{{ route('aafields.store') }}',
                    type: 'POST',
                    data : $("#aafields").serialize()
                }).done(function(response){ //
                    if(response=="success"){
                        $("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +
                            "                Record Successfully Added\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>")).show();
                    }
                    else {
                        $("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +
                            "                Error Occured.\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>"))
                    }
                });
            });

        })

    </script>
@endpush
