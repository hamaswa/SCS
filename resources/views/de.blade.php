@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <h1>Data Entry</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <section class="content">
            <div class="col-lg-12 right-side"><b>{{ $applicant->name }}</b></div>
            <div id="facility_view">
                @include("facility_info_view")
            </div>
            <form id="de" name="de">
                @csrf
                <div class="row mar-lr">
                <div class="col-sm-2 two-width">
                    {{--<div class="btn-group">--}}
                        {{--<button type="button" class="btn btn-default btn-flat">{{ $button }}</button>--}}
                        {{--<button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<span class="caret"></span>--}}
                            {{--<span class="sr-only">Toggle Dropdown</span>--}}
                        {{--</button>--}}
                        {{--<ul class="dropdown-menu" id="facility_menu" role="menu">--}}
                            {{--<li><a href="{{ route("housingloan.create") }}?applicant_id={{ $applicant_id }}">Housing Loan</a></li>--}}
                            {{--<li><a href="{{ route("termloan.create") }}?applicant_id={{ $applicant_id }}">Term Loan</a></li>--}}
                            {{--<li><a href="{{ route("creditcard.create") }}?applicant_id={{ $applicant_id }}">Credit Card</a></li>--}}
                            {{--<li><a href="{{ route("hirepurchase.create") }}?applicant_id={{ $applicant_id }}">Hire Purchase</a></li>--}}
                            {{--<li><a href="{{ route("overdraft.create") }}?applicant_id={{ $applicant_id }}">Overdraft</a></li>--}}
                            {{--<li><a href="{{ route("personalloan.create") }}?applicant_id={{ $applicant_id }}">Personal Loan</a></li>--}}

                        {{--</ul>--}}

                    {{--</div>--}}
                    <input type="hidden" value="{{ $applicant_id }}" name="applicant_id">

                    <select name="type" id="type">
                        @foreach($capacity_data as $capacity)
                            <option value="{{$capacity->name}}">
                                {{ $capacity->description }}
                            </option>
                        @endforeach
                    </select>
                    {{--<div class="Third-width">--}}
                    {{--<div class="form-group" id="csris">--}}
                    {{--<div class="checkbox">--}}
                    {{--<label>--}}

                    {{--<input name="csris[]" value="ssa" type="checkbox">--}}
                    {{--SAA--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    {{--<div  class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input  name="csris[]" value="akpk" type="checkbox">--}}
                    {{--AKPK--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--<div class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input  name="csris[]" value="trade" type="checkbox">--}}
                    {{--TRADE--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    {{--<div  class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input name="csris[]" value="courtcase" type="checkbox">--}}
                    {{--COURT CASE--}}
                    {{--</label>--}}
                    {{--</div>--}}

                    {{--<div  class="checkbox">--}}
                    {{--<label>--}}
                    {{--<input name="csris[]" value="bankruptcy" type="checkbox">--}}
                    {{--BANKRUPTCY--}}
                    {{--</label>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                </div>
                <div class="col-sm-10 de-table-bor">
                    <div class="first-table">
                        <div class="box-body">
                            <div id="response"></div>
                            <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 115px;">Facility Date</th>
                                    <th style="width: 100px;">STS</th>
                                    <th style="width: 100px;">Capacity</th>
                                    <th style="width: 100px;">Facility Limit</th>
                                    <th style="width: 100px;">Facility Outstanding</th>
                                    <th style="width: 100px;">Installment</th>
                                    <th style="width: 102px;">Col Type</th>
                                    <th style="width: 102px;">MIA</th>
                                    <th style="width: 102px;">CONDUCT</th>
                                    <th style="width: 102px;">Adverse Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: #c6d8f2;">
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input type="date" id="facilitydate" required name="facilitydate" placeholder="dd/mm/yyyy" class="form-control"
                                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">

                                            <select name="sts" id="sts">
                                                <option value="O">O</option>
                                                <option value="K">K</option>
                                                <option value="T">T</option>
                                            </select>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group" id="capacity">
                                            <label>
                                                <input type="radio" checked="true" name="capacity" id='account' value="own" class="minimal" checked="">
                                                OWN
                                            </label>
                                            <label>
                                                <input type="radio" name="capacity" value="ja" id="account" class="minimal">
                                                JA
                                            </label>

                                        </div>
                                    </td>


                                    <td>
                                        <div class="form-group">
                                            <input name="facilitylimit" id="facilitylimit" required type="number" min="0" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="number" name="facilityoutstanding" required  id="facilityoutstanding" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="installment" id="installment" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <select name="col_type" id="col_type">
                                            <option value="00">00</option>
                                            <option value="11">11</option>
                                            <option value="22">22</option>
                                        </select>

                                    </td>
                                    <td>
                                        <div class="form-group">
                                           <select id="mia" class="form-control" name="mia">
                                               <option value="0">0</option>
                                               <option value="1">1</option>
                                               <option value="2">2</option>
                                               <option value="3">3</option>
                                           </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <select id="conduct" class="form-control" name="conduct">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                </td>
                                    <td>
                                        <select name="adverse_remark" id="adverse_remark">
                                            <option value="amla">AMLA</option>
                                            <option value="courtcase">Court Case</option>
                                            <option value="bankruptcy">Bankruptcy</option>
                                        </select>
                                    </td>
                                </tr>
                        <tr>
                            <td class="add-button">
                                <button type="button" id="submit" class="btn bg-maroon btn-flat margin">ADD</button>
                            </td>
                        </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>

@endsection
@push("scripts")
<script type="text/javascript">
    $("#type").on("change",function (e) {
        $("#account").trigger("change");
        $("#capacity").find(":input").prop("disabled",false)

        if($(this).val()=='CRDTCARD'){
            $("#capacity").find(":input").prop("disabled",true)
        }


    })

    $("#facility_menu").click(function(e){
        if($("#facilitydate").val()!="" || $("#facilitylimit").val()!="" || $("#facilityoutstanding").val()!=""){
           if(!confirm("You have Incomplete From. Are you sure to quit?")){
               e.preventDefault();
           }
        }
    })

    $("#account, #facilitylimit, #facilityoutstanding").on("change click",function(e){
        type = $("#type").val();
        switch (type){
            case 'CRDTCARD':
                installment = $("#facilityoutstanding").val() * .05
                $("#installment").val(installment)
                break;
            case 'OVRDRAFT':
                installment = ($("#facilitylimit").val() * .05)/12
                $("#installment").val(installment)
                break;
        }
    })
    // $('#facilitydate').datepicker({
    //     format: 'yyyy-mm-dd'
    // });
    $("#mia,#conduct,#type").select2({allowclear:true});

    $(document).ready(function() {
        $("#submit").click(function () {
            submit=true;
            $(".has-error").removeClass("has-error");

            if( $("#facilitylimit").val()==""){
                $("#facilitylimit").parent("div").addClass("has-error")
                submit=false;

            }
            if( $("#facilityoutstanding").val()==""){
                $("#facilityoutstanding").parent("div").addClass("has-error")
                submit=false;
            }
            if( $("#facilitydate").val()==""){
                $("#facilitydate").parent("div").addClass("has-error")
                submit=false;
            }
            if( $("#installment").val()==""){
                $("#installment").parent("div").addClass("has-error")
                submit=false;
            }
            if(submit==false){
                return false;
            }


            event.preventDefault(); //prevent default action


            $.ajax({
                beforeSend: function() {
                    $('#loader').show();
                },
                url: '{{ route('housingloan.store') }}',
                type: 'POST',
                data: $("#de").serialize()
            }).done(function (response) { //
                if (response == "error")
                 {
                    $("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +
                        "                Error Occured.\n" +
                        "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                        "\n" +
                        "            </div>"))
                }
                else {
                    $("#facilitydate,#facilitylimit,#facilityoutstanding,#installment").val("");
                    $("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +
                        "                Record Successfully Added\n" +
                        "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                        "\n" +
                        "            </div>")).show();
                }
                $("#facility_view").html("").append($(response));
            });
        });
        $(".update_facility").click(function () {
            event.preventDefault(); //prevent default action
            submit = true;
            $(".has-error").removeClass("has-error");

            // if ($("#facilitylimit").val() == "") {
            //     $("#facilitylimit").parent("div").addClass("has-error")
            //     submit = false;
            //
            // }
            // if ($("#facilityoutstanding").val() == "") {
            //     $("#facilityoutstanding").parent("div").addClass("has-error")
            //     submit = false;
            // }
            // if ($("#facilitydate").val() == "") {
            //     $("#facilitydate").parent("div").addClass("has-error")
            //     submit = false;
            // }
            // if ($("#installment").val() == "") {
            //     $("#installment").parent("div").addClass("has-error")
            //     submit = false;
            // }
            // if (submit == false) {
            //     return false;
            // }

            data = $(this).parent("td").parent("tr").find(":input").serializeArray();
            for(d in data){
                if(data[d]['name']=='_method'){
                    data[d]['value']="patch";
                }

            }


            form = document.createElement("form");
            form.action = '{{ route('housingloan.update',1) }}'
            form.method = 'POST';
            $(this).parent("td").parent("tr").find(":input").each(function (e) {
                $(form).append($(this));
            })
            $(form).find("input[name=_method]").attr("id","_method").val("patch");
            $(document.body).append(form)
            form.submit();
            form.remove();



            {{--$.ajax({--}}
            {{--url: '{{ route('housingloan.update',1) }}',--}}
            {{--type: 'POST',--}}
            {{--data: data,--}}
            {{--headers: {--}}
            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
            {{--},--}}
            {{--}).done(function (response) { //--}}
            {{--if (response == "success") {--}}
            {{--$("#facilitydate,#facilitylimit,#facilityoutstanding,#installment,#csris").val("");--}}
            {{--$("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +--}}
            {{--"                Record Successfully Added\n" +--}}
            {{--"                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +--}}
            {{--"\n" +--}}
            {{--"            </div>")).show();--}}
            {{--}--}}
            {{--else {--}}
            {{--$("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +--}}
            {{--"                Error Occured.\n" +--}}
            {{--"                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +--}}
            {{--"\n" +--}}
            {{--"            </div>"))--}}
            {{--}--}}
            {{--});--}}
        });


    })

</script>
@endpush

