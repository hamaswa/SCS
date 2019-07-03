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
            <div class="col-lg-12 skin-blue">

                <legend class="text-center padding-5"><label for="">NO AA</label>
                    <input type="text" disabled value="{{$inputs['aasource']}}/{{$inputs['aacategory']}}/{{$inputs['aabranch']}}/{{$inputs['serial_no']}}">

                </legend>

                {{--<legend><a id="form-upload" class="btn btn-app">--}}
                        {{--<i class="fa fa-upload"></i> Upload Form</a>--}}
                    {{--<div style="display:none"><input type="file" name="doc" id="upload"></div>--}}
                    {{--<a class="btn btn-app"><i class="fa fa-refresh"></i> Refresh</a>--}}
                    {{--<a class="btn btn-app" id="d_pdf"><i class="fa fa-download"></i> CTOS Report</a>--}}
                {{--</legend>--}}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 skin-blue">
                <form id="applicantform" name="applicantform">
                    @csrf
                    <input type="hidden" value="{{$inputs['aasource']}}" name="aasource">
                    <input type="hidden" value="{{$inputs['aabranch']}}" name="aabranch">
                    <input type="hidden" value="{{$inputs['aaallocation']}}" name="aaallocation">
                    <input type="hidden"  value="{{$inputs['serial_no']}}" name="serial_no">
                    <input type="hidden" id="applicant_id" name="applicant_id">
                    <input type="hidden" name="formname" value="applicantform">
                    @include('aadata.applicantkyc')
                </form>
                <form id="incomeform" name="incomeform">
                    @csrf
                    <input type="hidden" name="formname" value="incomeform">
                    <input type="hidden" name="income_id" value="" id="income_id">
                    @include('aadata.incomekyc')
                </form>
                <form id="wealthform" name="wealthform">
                    @csrf
                    <input type="hidden" name="formname" value="wealthform">
                    <input type="hidden" name="wealth_id" id="wealth_id">
                    @include('aadata.wealthkyc')
                </form>
                <form id="propertyform" name="propertyform">
                    <input type="hidden" name="property_id" id="property_id">
                    @include('aadata.propertykyc')
                </form>
            </div>

            </form>

        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">

        $("#incometype").change(function (e) {
            $("#incomekyc .box .incometype").addClass("hide");
            id = $(this).val();
            $("#incomekyc").find("#" + id).removeClass("hide").show();
        })
        $(document).ready(function () {
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
            });

            $("#createaa").click(function () {
                event.preventDefault(); //prevent default action

                $.ajax({
                    url: '{{ route('applicantkyc.store') }}',
                    type: 'POST',
                    data: $("#applicantform").serialize()
                }).done(function (response) {
                    response = JSON.parse(response);
                    if (response.error) {
                    }
                    else {
                        $(".applicant").text($("#name").val());
                        $("#nextincomekyc").removeClass("hide");
                        $("#applicant_id").val(response.applicant_id);
                        $("#applicantkyc").addClass("hide");
                        $("#incomekyc").removeClass("hide");
                        $.ajax({
                            url: '{{ route('pipeline.store') }}',
                            type: 'POST',
                            data: $("#applicantform").serialize()+"&formname=APICall&applicant_id="+ response.applicant_id
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
            $("#nextwealthkyc").on("click",function(){
                $.ajax({
                url: '{{ route('incomekyc.store') }}',
                type: 'POST',
                data: $("#incomeform").serialize() + "&applicant_id="+ $("#applicant_id").val()
                }).done(function (response) {
                response = JSON.parse(response);
                if(response.error){
                }
                else {
                    $("#income_id").val(response.income_id)
                }
                })

            });

        })

        $("#nextpropertykyc").on("click",function () {
            $.ajax({
            url: '{{ route('wealthkyc.store') }}',
            type: 'POST',
            data: $("#wealthform").serialize() + "&applicant_id="+ $("#applicant_id").val()
            }).done(function (response) {
            response = JSON.parse(response);
            if(response.error){
            }
            else {
                $("#wealth_id").val(response.wealth_id)
            }
            })
        })

        $("#submitpropertykyc").on("click",function (e) {
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
                $("#property_id").val(response.property_id)
                document.location.href = "{{ route("aadata.index") }}"
            }
            })
        })

    </script>
@endpush
