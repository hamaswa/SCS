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

                <div class="box-body ">
                    <div class="col-md-8 col-sm-8 col-lg-8 no-padding">

                        <div class="col-md-12 col-sm-12 col-lg-12 table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white">

                            <tbody>
                                <tr>
                                    <td>
                                        <button id="dsr_projection" class="hide"> Dsr Projection</button>
                                        <table>
                                            <?php
                                            $id="";
                                            ?>
                                            @foreach($applicants as $la)
                                                <?php
                                                    $id .= ($id==""?"":","). $la->id;
                                                ?>
                                             <tr>
                                                 <td class="la-applicant" data-id="{{$la->id}}">
                                                     <b> {{$la->name}} </b>
                                                 </td>
                                                 <td> <input type="checkbox" class="applicants"
                                                             name="applicant_id[]" value="{{$la->id}}" {{ $la->applicant_approved==1?"checked":"" }}> </td>
                                             </tr>
                                            @endforeach

                                        </table>
                                        <input name="applicants" id="applicants" type="hidden" value="{{$id}}">
                                    </td>
                                    <td id="la-properties">


                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="la_facilities">

                        </div>

                        <table id="example5" class="table table-bordered table-hover">
                            <thead>

                            <tr>
                                <th style="width: 115px;">Facility Type</th>
                                <th style="width: 100px;">Loan Tenure (Years)
                                </th>
                                <th style="width: 100px;"> Interest Rate (%.p.a)
                                </th>
                                <th style="width: 100px;">Loan Amount (RM)</th>
                                <th>Installment</th>
                                <th style="width: 100px;">Action</th>

                            </tr>
                            </thead>
                            <tbody id="new_facilities">
                            {{--@include ("uploader.facility_edit")--}}
                            </tbody>
                            <tfoot id="facility_form">
                            <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                            >
                                <th colspan="6">
                                    Add New Facility
                                </th>
                            </tr>
                            <tr style="background-color: #c6d8f2;">
                                <td>
                                    <input type="hidden" name="la_id" id="la_id" value="{{ isset($la_serial_no)?$la_serial_no."_".$la_serial_id:"" }}">
                                    <select name="type" id="type" class="form-control select2">
                                        @foreach($capacity_data as $capacity)
                                            <option value="{{$capacity->name}}">
                                                {{ $capacity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="loan_tenure" required  id="loan_tenure" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <input type="number" name="interest_rate" id="interest_rate" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <input type="number" name="loan_amount" id="loan_amount" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <input type="number" name="loan_amount" id="loan_amount" disabled class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <button id="facility_submit" class="btn btn-success btn-xs text-white"><i class="fa fa-plus"></i></button>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="table-responsive  no-padding pull-right">
                                        <select name="la_type" id="la_type" class="form-control select2">
                                            <option value="subsale" {{ ($loan_application->bank=="subsale"?"selected":"") }}>
                                                SubSale
                                            </option>
                                            <option value="undcon" {{ ($loan_application->bank=="undcon"?"selected":"") }}>
                                                UNDcon
                                            </option>
                                            <option value="unsecured" {{ ($loan_application->bank=="unsecured"?"selected":"") }}>
                                                UNsecured
                                            </option>
                                        </select>
                                    </div>

                                </td>
                                <td class="add-button">
                                    <div class="pull-right">
                                    <button type="button" id="create_la" class="btn bg-maroon btn-flat margin">Create LA</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">

                                </td>
                                <td id="la_bank" colspan="4" class="hide">
                                    <div class="pull-right form-group">
                                        <div class="col-lg-6">
                                            <select name="bank" id="bank" class="form-control">
                                                <option value="abmb" {{ ($loan_application->bank=="abmb"?"selected":"") }}>
                                                    ABMB
                                                </option>
                                                <option value="cimb" {{ ($loan_application->bank=="cimb"?"selected":"") }}>
                                                    CIMB
                                                </option>
                                                <option value="hlbb" {{ ($loan_application->bank=="hlbb"?"selected":"") }}>
                                                    HLBB
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="button" id="assign_bank" value="Assign" class="btn btn-default">
                                        </div>
                                    </div>
                                </td></tr>
                            </tfoot>
                        </table>

                    </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 bg-chocolate"
                         id="right_side_bar">
                        <div class="tab-3"></div>
                        <div class="existing_commitment"></div>
                        <div class="new_facility"></div>
                        <div class="new_commitment"></div>


                    </div>


                </div>
            </div>
        </div>

    </div>
    <div id="dsr_dialog" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">DSR Projection</h4>
                </div>
                <div class="modal-body" id="dsr_projection_res">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        var applicant = null;
        $(document).ready(function (e) {
            $('.select2').select2({allowClear:true});
            forms=[];
            forms['facility_form'] = $("#facility_form").children().clone(true, true)

            id = $("input[name='applicant_id[]']:checked").map(function() {
                return this.value;
            }).get().join(',');
            sidebar(id);
            la_properties();
            la_facilities();
            facility_edit();

        });
        // Delete Facility

        $(document.body).on("click","#assign_bank",function(){
            $("#la_bank").removeClass("hide");
            data = "loan_amount=" + $("#la_loan_amount").val() + "&bank=" + $("#bank").val() + "&la_type=" + $("#la_type").val() +
                    "&id={{$loan_application->id}}&la=update_la";
            $.ajax({
                url: '{{ route('uploader.store') }}',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                if(response=="success"){
                    alert("LA Created Successfully. Bank Assign Successfully")
                }
            })
        })

        $(document.body).on("click", ".dsr_e_facility_chkbox", function () {
            if ($(".dsr_projection_existing_facility_total").find($(this).data("target")).length) {
                $(".dsr_projection_existing_facility_total").find($(this).data("target")).remove()
            }
            else {
                div = $("<div class='col-lg-12'></div>");
                $(div).append($($(this).data("target")).clone(true));
                $(".dsr_projection_existing_facility_total").append(div);
            }
            total = 0;
            $(".dsr_projection_existing_facility_total").find("td .installment").each(function (e) {
                //console.log((($(this).html().match(/\d+/))))
                total += (($(this).text()) * 1);
            })
            $("#dsr_existing_facility_total").val(total);
            calculate_dsr();
        })

        $(document.body).on("click", ".dsr_n_facility_chkbox", function () {
            if ($(".dsr_projection_new_facility_total").find($(this).data("target")).length) {
                $(".dsr_projection_new_facility_total").find($(this).data("target")).remove()
            }
            else {
                div = $("<div class='col-lg-12'></div>");
                $(div).append($($(this).data("target")).clone(true));
                $(".dsr_projection_new_facility_total").append(div);
            }
            total = 0;
            $(".dsr_projection_new_facility_total").find("td .installment").each(function (e) {
                //console.log((($(this).html().match(/\d+/))))
                total += (($(this).text()) * 1);
            })
            $("#dsr_new_facility_total").val(total);
            calculate_dsr()
        })

        $(document.body).on("click", ".dsr_income_chkbox", function () {
            if ($(".dsr_projection_income_total").find($(this).data("target")).length) {
                $(".dsr_projection_income_total").find($(this).data("target")).parent("div").remove()
            }
            else {
                div = $("<div class='col-lg-12'></div>");
                $(div).append($($(this).data("target")).clone(true));
                $(".dsr_projection_income_total").append(div);
            }
            total = 0;
            $(".dsr_projection_income_total").find(".income_net").each(function (e) {
                total += (($(this).text() * 1));
            })
            //console.log(total)
            $("#dsr_income_total").val(total);
            calculate_dsr()
        })

        function calculate_dsr() {
            income_total = $("#dsr_income_total").val();
            if (!income_total) {
                income_total = 1;
            }
            new_facility_total = $("#dsr_new_facility_total").val();
            if (!new_facility_total) {
                new_facility_total = 0;
            }

            existing_facility_total = $("#dsr_existing_facility_total").val()

            if (!existing_facility_total) {
                existing_facility_total = 0;
            }

            $("#dsr").val(Math.round(((new_facility_total - existing_facility_total) / income_total) * 100, 2));
        }

        $(document.body).on("click", "#dsr_projection", function (e) {
            $.ajax({
                url: '{{ route('dsr_projection') }}',
                type: 'POST',
                data: "applicant_id=" + $("#applicants").val() + "&la_id=" + $("#la_id").val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
                },
            }).done(function (response) {
                $("#dsr_projection_res").html($(response))
                $("#dsr_dialog").modal('show');
            })

        })

        $(document.body).on("click","#create_la",function(){
            $("#la_bank").removeClass("hide");
            $("#bank").click();
        })
        $(document.body).on("click","#facility_delete",function(e){

            that = $(this);
            $.ajax({
                url: '{{ route('delete_facility') }}',
                type: 'POST',
                data: "id="+$(this).data("id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                if(response=="success"){
                    that.parent("td").parent("tr").remove();
                    sidebar($("input[name='applicant_id[]']:checked").val())

                }
            })

        })
        //Add and Update New facility
        $(document.body).on("click","#facility_submit",function (e) {
            loan_amount=$(this).parent("td").parent("tr").find("#loan_amount").val();
            const principal = parseFloat(loan_amount);

            interest_rate=$(this).parent("td").parent("tr").find("#interest_rate").val();
            const calculatedInterest = parseFloat(interest_rate / 100 / 12);

            loan_tenure=$(this).parent("td").parent("tr").find("#loan_tenure").val();
            const calculatedPayments = parseFloat(loan_tenure) * 12;
            const x = Math.pow(1 + calculatedInterest, calculatedPayments);
            const installment = Math.round((principal * x * calculatedInterest) / (x - 1),2);



            //installment =  Math.round(total_repay/ (loan_tenure*12),2);
            data = $(this).parent("td").parent("tr").find(":input").serialize()
                    + "&installment=" + installment
                    + "&applicant_id=" +
                        $("input[name='applicant_id[]']:checked").map(function() {
                            return this.value;
                        }).get().join(',');
            submit_facility(data)

        });

        $(document.body).on("click",'.la_property',function(e) {
            $.ajax({
                url: '{{ route("attach_property") }}',
                type: 'POST',

                data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val() + "&property_id=" + $(this).data("id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            }).done(function (response) {
                $(".property_"+response).addClass("red");
            })
        })

        $(document.body).on("click",".la-applicant",function (e) {
            sidebar($(this).data("id"));
        })

        $(document.body).on("change",".applicants",function (e) {
            applicant = $("input[name='applicant_id[]']:checked").serialize()
            $.ajax({
                url: "{{ route("select_applicant") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='applicant_id[]']:checked").serialize() +
                "&la_id=" + $("#la_id").val(),
                success: function (response) {
                },
                error: function () {
                }
            });
            if(applicant==""){
                // $("#la-properties").html("");
                $("#la_facilities").html("");
                $("#new_facilities").html("");
                id = $("input[name='applicants']").val();
                sidebar(id);
            }
            else {
                //  la_properties();
                la_facilities();
                facility_edit();
                id = $("input[name='applicant_id[]']:checked").map(function() {
                    return this.value;
                }).get().join(',');
                sidebar(id);
            }

        })

        $(document.body).on("click",".facility_covered",function (e) {
            applicant_id = "{{$applicant->id}}";
            $.ajax({
                url: "{{ route("cover_facility") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='facility_covered[]']:checked").serialize()
                +"&la_id="+$("#la_id").val()
                +"&applicant_id="+ applicant_id,
                success: function (response) {
                    //$("#la-properties").html("").append($(response));
                },
                error: function () {
                }
            });

            id = $("input[name='applicant_id[]']:checked").map(function() {
                return this.value;
            }).get().join(',');
            sidebar(id);
        })

        function sidebar(id) {
            $("#right_side_bar").html($(" <div class=\"tab-3\"></div>\n" +
                "                        <div class=\"existing_commitment\"></div>\n" +
                "                        <div class=\"new_facility\"></div>\n" +
                "                        <div class=\"new_commitment\"></div>"));
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
                url: "{{ route("applicant_sidebar") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + id,
                success: function (response) {
                    $("#tab-3").html(response);
                    $("#right_side_bar .tab-3").html($("#tab-3").clone(true));

                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("new_facility") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + id + "&la_id="+ $("#la_id").val(),
                success: function (response) {
                    if(response!="") {
                        $("#dsr_projection").removeClass("hide");
                        $("#new_facility").html("").append($(response));
                        $("#right_side_bar .new_facility").html($(response));
                        $.ajax({
                            url: "{{ route("new_commitment") }}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            data: "applicant_id=" + id + "&la_id=" + $("#la_id").val(),
                            success: function (response) {
                                $("#new_commitment").html("").append($(response));
                                $("#right_side_bar .new_commitment").html($(response));

                            },
                            error: function () {
                            }
                        });
                    }
                    else {
                        $("#dsr_projection").addClass("hide");
                    }



                    },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("existing_commitment") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + id,
                success: function (response) {
                    $("#existing_commitment").html("").append($(response));
                    $("#right_side_bar .existing_commitment").html($(response));

                },
                error: function () {
                }
            });
        }

        function submit_facility(form_data) {
            $.ajax({
                url: '{{ route('add_new_facility') }}',
                type: 'POST',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("#new_facilities").html("").append(response);
                $("#facility_form").html("").append($(forms["facility_form"]).clone(true, true))
                $(".applicants").trigger("change");


            })

        }

        function la_properties()
        {
        $.ajax({
            url: "{{ route("la_properties") }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: "la_applicant_id={{$applicant->id}}&applicant_id=" + $("#applicants").val() + "&la_id=" + $("#la_id").val() + "&property_id=" + $(this).data("id"),
            success: function (response) {
                $("#la-properties").html("").append($(response));
            },
            error: function () {
            }
        });
        }
        function la_facilities()
        {
            $.ajax({
                url: "{{ route("la_facilities") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val(),
                success: function (response) {
                    $("#la_facilities").html("").append($(response));
                },
                error: function () {
                }
            });
        }
        function facility_edit() {

            $.ajax({
                url: "{{ route("facility_edit") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val(),
                success: function (response) {
                    $("#new_facilities").html("").append($(response));
                    $('.select2').select2({allowClear: true});

                },
                error: function () {
                }
            });
        }

    </script>
@endpush