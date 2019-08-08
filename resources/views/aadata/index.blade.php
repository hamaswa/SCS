@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="msg">
            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="box">
                <div class="box-header">
                    <form id="searchapplicant" name="searchapplicant" method="post"
                          action="{{ route("pipeline.index") }}">
                        @csrf
                        <div class="col-md-12">
                            <h4>Existing AA</h4>
                        </div>
                        {{--<div class="col-md-4">--}}
                        {{--<select class="form-control select2" name="searchfield" id="searchfield">--}}
                        {{--<option value="unique_id">Applicant ID</option>--}}
                        {{--<option value="name">Applicant Name</option>--}}
                        {{--<option value="unique_id">Company No</option>--}}
                        {{--<option value="name">Company Name</option>--}}
                        {{--</select>--}}
                        {{--</div>--}}
                        <div class="col-md-5">
                            <input type="number" class="form-control" name="search" placeholder="Search NRIC"/>
                            <span class="col-lg-12 col-md-12 col-sm-12">
                                e.g. 791219107629 (exclude special character or symbols)
                            </span>
                        </div>
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-primary" name="submit" value="Search"/>
                        </div>
                    </form>
                </div>
                <div class="box-body ">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th>AII LA</th>
                                <th>Applicant / Company Name</th>
                                <th>IC No. / Company No.</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(isset($data))
                                @if(count($data)==0)
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No Data Found
                                        </td>

                                    </tr>
                                @endif
                                @foreach($data as $d)
                                    {{--$d->aasource}}/{{$d->aabranch}}/{{$d->aacategory}}/--}}
                                    <tr data-id="{{$d->id}}" data-status="{{ $d->status }}" data-name="{{ $d->name }}"
                                        data-unique_id="{{ $d->unique_id }}" data-mobile="{{$d->mobile}}"
                                        class="applicant-row">
                                        <td>{{$d->serial_no}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->unique_id}}</td>
                                        <td>
                                            {{ $d->status }}
                                        </td>
                                        <td>
                                            {{--                                    @if(! $d->status=="Appointment" and !$d->status =="Appointment-Attended" and !$d->status=="Consent Obtained")--}}
                                            <a href="javascript:void(0)" data-toggle="control-sidebar"
                                               data-id="{{$d->id}}"
                                               class="btn btn-xs bg-light-blue-gradient view-applicant">View</a>
                                            {{--@if($d->status=="Appointment")--}}
                                            {{--<a href="javascript:void(0)" data-aaprogramcode="{{ $d->aaprogramcode }}" data-id="{{$d->id}}" data-status ="{{ $d->status }}" data-name="{{ $d->name }}" data-unique_id="{{ $d->unique_id }}" data-mobile="{{$d->mobile}}" class="btn btn-xs bg-light-blue-gradient edit">Edit</a>--}}
                                            {{--@elseif($d->status =="Appointment-Attended")--}}
                                            {{--<a href="javascript:void(0)" data-aaprogramcode="{{ $d->aaprogramcode }}" data-id="{{$d->id}}" data-status ="{{ $d->status }}" data-name="{{ $d->name }}" data-unique_id="{{ $d->unique_id }}" data-mobile="{{$d->mobile}}" class="btn btn-xs bg-light-blue-gradient edit">Upload Consent</a>--}}
                                            {{--@elseif($d->status=="Consent Obtained")--}}
                                            {{--<a href="{{route("aadata.create", ["id" => $d->id])  }}" class="btn btn-xs bg-light-blue-gradient edit">KYC</a>--}}
                                            {{--@else--}}
                                            {{--@endif--}}
                                            {{--<a href="javascript:void(0)" class="btn btn-xs bg-light-blue-gradient">Import</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="bg-light-blue-gradient">
                                    <td colspan="5">No </td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div>
                    @if(isset($data))
                        <div>
                            {{ $data->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="col-md-12 col-sm-12 col-lg-12 bg-white">
                <form id="newaa" name="newaa" action="{{ route("aadata.store") }}" method="post"
                      enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="form" value="new_application" id="form">
                    <input type="hidden" name="applicant_status" value="new_application" id="applicant_status">
                    <div id="applicant_id"></div>
                    <h3 id="aa_title">Create AA</h3>

                    {{--<div class="col-md-3">--}}
                    {{--<label>AA Source</label>--}}
                    {{--<select class="select2 form-control" name="aasource">--}}
                    {{--<option value="AS">AS</option>--}}
                    {{--<option value="PS">PS</option>--}}
                    {{--<option value="BK">BK</option>--}}
                    {{--<option value="DV">DV</option>--}}

                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                    {{--<label>AA Branch</label>--}}
                    {{--<select class="select2 form-control" name="aabranch">--}}
                    {{--<option value="KL">KL</option>--}}
                    {{--<option value="JB">JB</option>--}}
                    {{--<option value="PN">PN</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-3">--}}
                    {{--<label>AA Category</label>--}}
                    {{--<select class="select2 form-control" name="aacategory">--}}
                    {{--<option value="Ind">Indiviual</option>--}}
                    {{--<option value="Com">Company</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}

                    <div class="col-lg-12 ">
                        <div class="box">
                            <div class="col-md-12 col-sm-12 bg-gray-light padding-5">
                                <div class="box-body bg-gray-light">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label id="name_label" class="control-label">
                                            Full Name as per NRIC/Passport
                                        </label>
                                        <input name="name" id="name" placeholder="" class="form-control" type="text">


                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label id="unique_id_label" class="control-label">
                                            NRIC No./Passport No.(e.g.12345678)
                                        </label>
                                        <input name="unique_id" id="unique_id" placeholder="" class="form-control"
                                               minlength="12" type="number">

                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label class="control-label">Mobile Number (e.g. 60121234567 /
                                            6512345678)</label>
                                        <input name="mobile" id="mobile" placeholder="" class="form-control"
                                               minlength="10" type="number">

                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                            <label>Program</label>
                                            <select class="select2 form-control" name="aaprogramcode"
                                                    id="aaprogramcode">
                                                <option value="ABMB">ABMB</option>
                                                <option value="REA">REA</option>
                                                <option value="DEVP">DEVP</option>
                                                <option value="INS">INS</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--<div class="form-group col-md-6 col-sm-6 hide applicant-status">--}}
                                    {{--<div class="form-group">--}}
                                    {{--<label>Appointment-Attedent</label>--}}
                                    {{--<input type="checkbox" class="verify-newaa-input"> Verified--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="form-group col-md-12 col-sm-12 consent-field hide">--}}
                                    {{--<a class="bg-white padding-5 pull-right consent-field" href="javascript:void(0)" onclick="$('#consent').trigger('click')" title="Upload Consent">--}}
                                    {{--<img src="{{ asset("img/file.jpeg") }}"/></a>--}}
                                    {{--<input type="file" class="hide" name="consent" id="consent">--}}
                                    {{--</div>--}}
                                    <div class="form-group col-lg-12">
                                        <button id="btn-newaa-submit" class="btn bg-gray-dark pull-right">Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        <?php /*
        <div class="col-md-3 col-sm-12 no-padding no-margin">
            <div class="box">
                <div class="box-header">
                    <div class="padding-5 bg-white pull-right border-light">
                        <img src="{{ asset("img/folder.png") }}" class="img-responsive width-30" onclick="hideData()" />
                    </div>
                    <div class="padding-5 bg-chocolate pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('overview')" class="img-responsive width-30" />
                    </div>
                    <div class="padding-5 bg-green-gradient pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('view_existing')" class="img-responsive width-30" />
                    </div>
                    <div class="padding-5 bg-yellow-light pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('all_comments')" class="img-responsive width-30" />
                    </div>
                </div>
                <div id="overview" class="box-body bg-chocolate min-height left-box hide detail-box">
                    <h4 class="text-center">Overview</h4>
                    <strong>MR ABC</strong>
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Income</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Gross</th>
                            <th>Net</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Fixed</td>
                            <td>3454</td>
                            <td>345</td>
                        </tr>
                        <tr>
                            <td>Rental</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        <tr>
                            <td>IIF</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="bg-yellow-light">
                            <th>Total</th>
                            <th>432</th>
                            <th>234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">New Instalment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>HL</th>
                            <th>TL</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>43543</td>
                            <td>3454</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        <tr>
                            <td>345435</td>
                            <td>345</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        <tr>
                            <td>4354</td>
                            <td>345</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">New Commitment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR(%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>PL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>HL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>CC</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="bg-yellow-light">Total</th>
                            <th class="bg-yellow-light">432</th>
                            <th class="bg-green">234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Existing Commitment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR(%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>PL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>HL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>CC</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="bg-yellow-light">Total</th>
                            <th class="bg-yellow-light">432</th>
                            <th class="bg-green">234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Property</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>MV</th>
                            <th>OS</th>
                            <th>CO</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td>345</td>
                        </tr>
                        <tr class="text-red">
                            <td>324</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        
                        </tbody>
                    </table>
                </div>
                <div id="view_existing" class="box-body bg-green-gradient min-height left-box hide detail-box">
                    <table class="table table-bordered table-striped table-hover bg-white text-black">
                        <thead>
                            <tr class="bg-light-blue-gradient">
                                <th colspan="4" class="text-center">Document</th>
                            </tr>
                            <tr class="bg-aqua">
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Company Reg KYC</td>
                                <td>Mandatory</td>
                                <td><a href="javascript:void(0)">view</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>latest payslip</td>
                                <td>Updated</td>
                                <td><a href="javascript:void(0)">view</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="all_comments" class="box-body bg-yellow-light min-height left-box hide detail-box">
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">All Comments</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Date</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>By</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td>Incomplete</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Open</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="bg-red-gradient">
                            <td></td>
                            <td>KIV</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="bg-green">
                            <td></td>
                            <td>KIV<br><small>replied</small></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        */ ?>
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        $(document).on("click", ".view-applicant", function (e) {
            id = $(this).data("id");
            $.ajax({
                url: "{{ route("comments") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + id,
                success: function (response) {
                    $("#tab-2").html(response);
                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("documents") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + id,
                success: function (response) {
                    $("#tab-1").html(response);
                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("incomedata") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + id,
                success: function (response) {
                    $("#tab-3").html(response);
                },
                error: function () {
                }
            });
        });
        $(document).ready(function () {
            $('.select2').select2();
            {{--$("#newaa").on("submit",function (e) {--}}
            {{--if($("#applicant_status").val()=="Appointment"){--}}
            {{--$.ajax({--}}
            {{--url : "{{ route("aadata.store") }}",--}}
            {{--type:"POST",--}}
            {{--headers: {--}}
            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
            {{--},--}}
            {{--data: $("#newaa").serializeArray(),--}}
            {{--success:function (response) {--}}
            {{--response = JSON.parse(response)--}}
            {{--if(response.status =="Appointment-Attended"){--}}
            {{--$("#applicant_status").val("Appointment-Attended")--}}
            {{--$("#form").val("applicant_consent");//.prop("disabled",true);--}}
            {{--$(".consent-field").removeClass("hide");--}}
            {{--$(".applicant-status").addClass("hide");--}}
            {{--$("#status").attr("disabled",true);--}}
            {{--$("#consent").attr("disabled",false);--}}
            {{--}--}}
            {{--msg= "";--}}
            {{--if(response.error){--}}
            {{--msg = " <div class=\"alert alert-success\">\n" +--}}
            {{--"                    <p>" + response.success + "</p>\n" +--}}
            {{--"                </div>";--}}
            {{--}--}}
            {{--else if(response.success){--}}
            {{--msg = " <div class=\"alert alert-success\">\n" +--}}
            {{--"                    <p>" + response.success + "</p>\n" +--}}
            {{--"                </div>";--}}
            {{--}--}}
            {{--$(".msg").html($(msg));--}}
            {{--},--}}
            {{--error: function () {--}}
            {{--}--}}
            {{--})--}}
            {{--}--}}
            {{--})--}}
            $(".edit").on("click", function (e) {
                $("#aa_title").html("Edit Profile");
                $("#name").val($(this).data("name"));//.prop("disabled",true);
                $("#form").val("");//.prop("disabled",true);
                $("#unique_id").val($(this).data("unique_id"));//.prop("disabled",true);
                $("#mobile").val($(this).data("mobile"));//.prop("disabled",true);
                $("#applicant_status").val($(this).data("status"));//.prop("disabled",true);
                $("#aaprogramcode").val($(this).data("aaprogramcode"));
                $("#applicant_id").append($("<input type='hidden' name='applicant_id' value='" + $(this).data("id") + "'>"))
                $("#btn-submit").text("Proceed");
                if ($(this).data("status") == "Appointment") {
                    $("#form").val("applicant_attend");//.prop("disabled",true);
                    $("#consent").attr("disabled", true);
                    $(".consent-field").addClass("hide");
                    $(".applicant-status").removeClass("hide");
                    $("#status").attr("disabled", false);
                }
                else if ($(this).data("status") == "Appointment-Attended") {
                    $("#form").val("applicant_consent");//.prop("disabled",true);
                    $(".consent-field").removeClass("hide");
                    $(".applicant-status").addClass("hide");
                    $("#status").attr("disabled", true);
                    $("#consent").attr("disabled", false);
                }
            })
        });
        function showData(id) {
            $('.detail-box').addClass('hide');
            $("#" + id).removeClass('hide');
        }
        function hideData() {
            $('.detail-box').addClass('hide');
        }
    </script>
@endpush