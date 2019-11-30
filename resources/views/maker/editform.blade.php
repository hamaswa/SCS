@extends('maker.layouts.app')

@section('content')

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <legend class="text-center padding-5"><label for="">NO AA</label>
                    <input type="text" disabled value="{{$applicant->serial_no}}">
                    @if(request()->input("action")=="kiv_remarks")
                    <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#remarksModal">Add Remarks</button>
                    @endif
                </legend>


            </div>

            <div class="container"> <!-- style="overflow:hidden" -->


                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-error">
                        {{ $errors->first() }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12" style="overflow:auto">
                        <div id="MyAccountsTab" class="tabbable tabs-left">
                            <!-- Account selection for desktop - I -->
                            <ul class="nav nav-tabs col-md-1 col-sm-12 col-xs-12">
                                <li class="active ">
                                    <div id="BK" data-target="#lA" data-toggle="tab" class="tab-action">
                                        <div class="ellipsis">
                                            <span class="account-type mobile-view-text">Applic<div class="clearfix">ation</div></span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="IK" data-target="#lB" data-toggle="tab" class="tab-action">
                                        <div>
                                            <span class="account-type">Income</span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="WK" class="wk tab-action" data-target="#lC" data-toggle="tab">
                                        <div>
                                            <span class="account-type">Wealth</span><br/>
                                            <span class="account-amount">KYC</span><br/>
                                        </div>
                                    </div>
                                </li>
                                <li style="cursor: pointer;">
                                    {{--i removed word "tab" in data-doggle="tab" to disabled it--}}
                                    <div id="PK" data-target="#lD" data-toggle="tab" class="tab-action">
                                        <div>
                                            <span class="account-type">Property</span><br/>
                                            <span class="account-amount">KYC</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <input type="hidden" id="la_applicant_id" value="{{ $la_applicant_id }}"
                                   name="la_applicant_id">
                            <div class="tab-content col-md-11">
                                <div class="tab-pane active" id="lA">
                                    <!--style="padding-left: 60px; padding-right:100px"-->
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <input type="hidden" id="applicant_id" value="{{ $applicant_data->id }}"
                                               name="applicant_id">
                                        @if($applicant->aacategory=="I")
                                            @include('maker.applicantkyc');
                                        @else
                                            @include("maker.company_aa_info")
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="lB">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="incomeform" name="incomeform">
                                            @csrf
                                            <input type="hidden" name="formname" value="incomeform">
                                            <input type="hidden" name="income_id" value="" id="income_id">
                                            @if($applicant->aacategory=="I")
                                                @include('maker.incomekyc',['income'=>$applicant_data->applicantIncome])
                                            @else
                                                @include("maker.company_incomekycedit");
                                            @endif
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lC">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="wealthform" name="wealthform">
                                            @csrf
                                            <input type="hidden" name="formname" value="wealthform">
                                            <input type="hidden" name="wealth_id" id="wealth_id">
                                            @if($applicant->aacategory=="I")
                                                @include('maker.wealthkyc',['wealth'=>$applicant_data->applicantWealth])
                                            @else
                                                @include('maker.company_wealthkycedit')
                                            @endif
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="lD">
                                    <div class="row" style="line-height: 14px; margin-bottom: 34.5px">
                                        <form id="propertyform" name="propertyform">
                                            <input type="hidden" name="id" id="property_id">
                                            @include('maker.propertykycedit',['properties'=>$applicant_data->applicantProperty])

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
    <div id="remarksModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">KIV</h4>
                </div>
                <div class="modal-body">
                    <div class="col-sm-12 bg-gray-light rounded padding-10">
                        <div class="col-sm-4 form-group">
                            <label>Category</label>
                            <select name="kiv_category" id="" class="form-control">
                                <option value="Applicant">Applicant</option>
                                <option value="Income">Income</option>
                                <option value="Wealth">Wealth</option>
                                <option value="Property">Property</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="col-sm-8 form-group">
                            <label>Remarks</label>
                            <textarea class="form-control" rows="5" name="remarks"></textarea>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" id="update_kiv" class="btn btn-primary">Update</button>
                </div>
            </div>

        </div>
    </div>

@endsection

@push("scripts")
    <script type="text/javascript">
        $(".tab-action").on('click', function () {
            document.cookie = "maker_active_tab="+this.id;
        });

        $(document.body).on("click", "#update_kiv", function (e) {
            $(".msg").html("");
            $.ajax({
                url: "{{ route("checker.kiv") }}",
                type: 'post',
                data: $("#remarksModal").find(":input").serialize() + "&applicant_id=" + $("#applicant_id").val() + "&la_applicant_id=" + $("#la_applicant_id").val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
                },
            }).done(function (response) {
                if (response = "success") {
                    $(".msg").html("<div class=\"alert alert-success\">\n" +
                        "                    <p>Remarks Added successfully</p>\n" +
                        "            </div>")
                    window.location = href + "?action=kiv_remarks";
                }
                else {
                    $(".msg").html("<div class=\"alert alert-error\">\n" +
                        "                    <p>Error Occured. Please contact administrator</p>\n" +
                        "                </div>")
                }

            })

        })

        $(document).on("change", "select", function(){
            var val = $(this).val(); //get new value
            //find selected option
            $("option", this).removeAttr("selected").filter(function(){
                return $(this).attr("value") == val;
            }).first().attr("selected", "selected"); //add selected attribute to selected option
        });

        $(document).ready(function () {
            checkActiveTab(document.cookie);
            $(".applicant").text("{{ $applicant_data->name }}");
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
                div = $("<div style=\"display=none\"></div>")
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
                            data: $("#business_form").serialize() + "&formname=APICall&applicant_id=" + response.applicant_id
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
        });

        function checkActiveTab(){
            if(getCookie('maker_active_tab')!="") {
              //  $("#" + getCookie('maker_active_tab')).trigger('click');
            }
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for(var i = 0; i <ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }

        function submitpropertykyc() {
            let data = {};
            data['form'] = forms;
            data['formname'] = 'propertyform';
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
                if (response.error) {
                }
                else {
                    $("#property_id").val(response.property_id);
                    //document.location.href = "{{ route("aadata.index") }}"
                }
            })
        }

        function submitbusinesskyc() {
            let data = {};
            data['business_forms'] = business_forms;
            data['formname'] = 'business_forms';
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
                if (response.error) {
                }
                else {
                    if (!isNaN(response.business_id)) {
                        $("#IK").attr("data-toggle", "tab");
                    }
                    $("#business_id").val(response.business_id);
                }
            })
        }

    </script>
@endpush
