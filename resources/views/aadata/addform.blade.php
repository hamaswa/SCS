@extends('layouts.app')

@section('content')
    {{--<section class="content-header">--}}
        {{--<h1>Pipeline</h1>--}}
        {{--<ol class="breadcrumb">--}}
            {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
            {{--<li class="active">Here</li>--}}
        {{--</ol>--}}
    {{--</section>--}}

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <legend class="text-center padding-5"><label for="">NO AA</label>
                    <input type="text" disabled value="{{$applicant->serial_no}}">

                </legend>

                {{--<legend><a id="form-upload" class="btn btn-app">--}}
                        {{--<i class="fa fa-upload"></i> Upload Form</a>--}}
                    {{--<div style="display:none"><input type="file" name="doc" id="upload"></div>--}}
                    {{--<a class="btn btn-app"><i class="fa fa-refresh"></i> Refresh</a>--}}
                    {{--<a class="btn btn-app" id="d_pdf"><i class="fa fa-download"></i> CTOS Report</a>--}}
                {{--</legend>--}}
            </div>
            {{--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 skin-blue">--}}

                {{--<div class="col-xs-9">--}}
                    {{--<!-- Tab panes -->--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane active" id="application-v">--}}
                            {{--<form id="business_form" name="business_form">--}}
                                {{--@csrf--}}
                                {{--<input type="hidden" value="{{$inputs['aasource']}}" name="aasource">--}}
                                {{--<input type="hidden" value="{{$inputs['aabranch']}}" name="aabranch">--}}
                                {{--<input type="hidden" value="{{$inputs['aaallocation']}}" name="aaallocation">--}}
                                {{--<input type="hidden"  value="{{$inputs['serial_no']}}" name="serial_no">--}}
                                {{--<input type="hidden" id="applicant_id" name="applicant_id">--}}
                                {{--<input type="hidden" name="formname" value="business_form">--}}
                                {{--@include('aadata.applicantkyc')--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="income-v">--}}
                            {{--<form id="incomeform" name="incomeform">--}}
                                {{--@csrf--}}
                                {{--<input type="hidden" name="formname" value="incomeform">--}}
                                {{--<input type="hidden" name="income_id" value="" id="income_id">--}}
                                {{--@include('aadata.incomekyc')--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane" id="wealth-v"></div>--}}
                        {{--<div class="tab-pane" id="property-v"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}




            {{--</div>--}}
            <div class="container"> <!-- style="overflow:hidden" -->


                <div class="row">
                    <div class="col-md-12" style="overflow:auto">
                        <div id="MyAccountsTab" class="tabbable tabs-left">
                            <!-- Account selection for desktop - I -->
                            <ul  class="nav nav-tabs col-md-1 col-sm-12 col-xs-12">
                                <li class="active">
                                    <div id="BK" data-target="#lA" data-toggle="tab">
                                        <div class="ellipsis">
                                            <span class="account-type mobile-view-text">Applic<div class="clearfix">ation</div></span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="IK" data-target="#lB" data-toggle="tab">
                                        <div>
                                            <span class="account-type">Income</span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="WK" class="wk" data-target="#lC" data-toggle="tab">
                                        <div>
                                            <span class="account-type">Wealth</span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="PK" data-target="#lD">
                                        <div>
                                            <span class="account-type">Property</span><br/>
                                            <span class="account-amount">KYC</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tab-content col-md-11">
                                <div class="tab-pane active" id="lA"><!--style="padding-left: 60px; padding-right:100px"-->
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <input type="hidden" id="applicant_id" value="{{ $applicant->id }}" name="applicant_id">
                                        <form id="business_form" name="business_form">
                                            @csrf
                                            <input type="hidden" name="formname" value="business_form">
                                            <input type="hidden" id="business_id" name="business_id">
                                            @include('aadata.businesskyc');
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lB">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="incomeform" name="incomeform">
                                            @csrf
                                            <input type="hidden" name="formname" value="incomeform">
                                            <input type="hidden" name="income_id" value="" id="income_id">
                                            @include('aadata.incomekyc');
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lC">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="wealthform" name="wealthform">
                                            @csrf
                                            <input type="hidden" name="formname" value="wealthform">
                                            <input type="hidden" name="wealth_id" id="wealth_id">
                                            @include('aadata.wealthkyc')
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lD">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="propertyform" name="propertyform">
                                            <input type="hidden" name="property_id" id="property_id">
                                            @include('aadata.propertykyc')
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Account selection for desktop - F -->
                        </div>
                    </div>
                </div>
            </div>
            </form>

        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">
        $(".tab-action").on('click',function(){
            var mainId = $(this).attr('data-id');
            $(".tab-action-main").addClass('hide');
            $("#"+mainId).removeClass('hide');
        });

        $(document).ready(function () {
            $(".applicant").text("{{ $applicant->name }}");
            $('.select2').select2();

            $(".d_pdf").click(function (e) {
                form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{ route("downloadpdf") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(form).append($("#name").clone())
                $(form).append($("#unique_id").clone())
                type = document.createElement("input");
                type.setAttribute("name", "aacategory");
                type.value = $("#aacategory").val()
                $(form).append($(type))
                div = $("<div style=\"display=hidden\"></div>")
                $(div).append(form)
                document.body.appendChild(form);
                form.submit();
                form.remove();
            });

            $("#createaa").click(function () {
                event.preventDefault(); //prevent default action

                $.ajax({
                    url: '{{ route('applicantkyc.store') }}',
                    type: 'POST',
                    data: $("#business_form").serialize()
                }).done(function (response) {
                    response = JSON.parse(response);
                    if (response.error) {
                    }
                    else {
                        $(".applicant").text($("#name").val());
                       // $("#nextincomekyc").removeClass("hide");
                        $("#applicant_id").val(response.applicant_id);
                       // $("#applicantkyc").addClass("hide");
                       // $("#incomekyc").removeClass("hide");
                        $.ajax({
                            url: '{{ route('pipeline.store') }}',
                            type: 'POST',
                            data: $("#business_form").serialize()+"&formname=APICall&applicant_id="+ response.applicant_id
                        }).done(function (response) {
                            response = JSON.parse(response);
                            if (response.error) {
                            }
                            else {

                            }
                        });

                    }
                })
            });
        })

        function  submitpropertykyc() {
            let data = {};
            data['form']  = forms;
            data['formname']  = 'propertyform';
            data['applicant_id'] = $("#applicant_id").val()
            $.ajax({
                url: '{{ route('propertykyc.store') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: data
            }).done(function (response) {
                response = JSON.parse(response);
                if(response.error){
                }
                else {

                    $("#property_id").val(response.property_id);
                    //document.location.href = "{{ route("aadata.index") }}"
                }
            })
        }

        function  submitbusinesskyc() {
            let data = {};
            data['business_forms']  = business_forms;
            data['formname']  = 'business_forms';
            data['applicant_id'] = $("#applicant_id").val();
            $.ajax({
                url: '{{ route('businesskyc.store') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: data
            }).done(function (response) {
                response = JSON.parse(response);
                console.log(response);
                if(response.error){
                }
                else {
                    if(!isNaN(response.business_id)){
                        $("#IK").attr("data-toggle","tab");
                    }
                    $("#business_id").val(response.business_id);
                }
            })
        }

    </script>
@endpush
