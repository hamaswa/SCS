@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="box">
            <div id="response"></div>
            <div class="box-header"></div>
            <form method="POST" id="aafields" action="{{ route('aafields.store') }}">
                @csrf
                <div class="card-body">


                    <div class="form-group col-md-4 col-sm-12">
                        <label for="name" class="">{{ __('Name') }}</label>
                        <input id="name" type="text"
                               class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>


                    <div class="form-group col-md-4 col-sm-12">
                        <label for="description">{{ __('Description') }}</label>
                        <input id="description" placeholder="Description"
                               class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                               name="description" required autofocus
                               value="{{ old('description') }}"/>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="description" class="">{{ __('Type') }}</label>
                        <select id="type" class="form-control" name="type">
                            <option value="salary_p">Primary Income Monthly Fixed</option>
                            <option value="business_p">Primary Income Monthly Variable</option>
                            <option value="incometax_p">Primary Income Annual Tax Declared</option>
                            <option value="iif_p">Primary Industry Income Factor</option>
                            <option value="monthlyrental_p">Primary Income Monthly Rental</option>
                            <option value="air_p">Primary Income Annual Investment Return</option>
                            <option value="salary_s">Supporting Income Monthly Fixed</option>
                            <option value="business_s">Supporting Income Monthly Variable</option>
                            <option value="incometax_s">Supporting Income Annual Tax Declared</option>
                            <option value="iif_s">Supporting Industry Income Factor</option>
                            <option value="monthlyrental_s">Supporting Income Monthly Rental</option>
                            <option value="air_s">Supporting Income Annual Investment Return</option>

                            <option value="saving_p">Primary Wealth Saving</option>
                            <option value="epf_p">Primary Wealth EPF Account Balance</option>
                            <option value="tpf_p">Primary Wealth Total Fixed Deposits</option>
                            <option value="tsv_p">Primary  Wealth Total Shares Value</option>
                            <option value="utv_p">Primary Wealth Unit Trust Value</option>

                            <option value="saving_s">Supporting Wealth Saving</option>
                            <option value="epf_s">Supporting Wealth EPF Account Balance</option>
                            <option value="tpf_s">Supporting Wealth Total Fixed Deposits</option>
                            <option value="tsv_s">Supporting  Wealth Total Shares Value</option>
                            <option value="utv_s">Supporting Wealth Unit Trust Value</option>

                            <option value="Business">Business</option>
                            <option value="Salaried">Salaried</option>

                            <option value="Property_primary_docs">
                                Property Primary Docs
                            </option>

                            <option value="property_support_docs">
                                Property Supporting Docs
                            </option>

                            <option value="com_income_primary_docs">
                                Company Income Primary Docs
                            </option>

                            <option value="com_income_types">
                                Company Income Type
                            </option>

                            <option value="com_income_support_docs">
                                Company Income Supporting Docs
                            </option>


                            <option value="wealth_primary_docs">
                                Company Wealth Primary Docs
                            </option>

                            <option value="com_wealth_type">
                                Company Wealth Type
                            </option>

                            <option value="com_wealth_support_docs">
                                Company Wealth Supporting Docs
                            </option>

                            <option value="com_Property_primary_docs">
                                Company Property Primary Docs
                            </option>

                            <option value="com_property_support_docs">
                                Company Property Supporting Docs
                            </option>

                            <option value="facility_type">
                                Facility Type
                            </option>

                        </select>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-footer">
                    <button type="submit" id="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection

@push("scripts")
    <script type="text/javascript">

        $("select").select2({allowclear: true});

        $(document).ready(function () {
            $("#submit").click(function () {

                event.preventDefault(); //prevent default action


                $.ajax({
                    url: '{{ route('aafields.store') }}',
                    type: 'POST',
                    data: $("#aafields").serialize()
                }).done(function (response) { //
                    if (response == "success") {
                        $("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +
                            $("#description").val() + " Successfully Added\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>")).show();
                        $("#aafields")[0].reset();
                    }
                    else {
                        $("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +
                            $("#description").val() + " Not Added. Error Occured.\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>"))
                    }
                });
            });

        })

    </script>
@endpush
