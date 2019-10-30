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
                    <div class="col-md-2 col-sm-2 col-lg-2 table-responsive  no-padding">
                        <select name="la_type" id="la_type" class="form-control select2">
                            <option value="subsale"  {{ ($loan_application->bank=="subsale"?"selected":"") }}>
                            SubSale
                            </option>
                            <option value="undcon"  {{ ($loan_application->bank=="undcon"?"selected":"") }}>
                                UNDcon
                            </option>
                            <option value="unsecured"  {{ ($loan_application->bank=="unsecured"?"selected":"") }}>
                                UNsecured
                            </option>
                        </select>
                    </div>
                    <div class="col-md-10 col-sm-10 col-lg-10 table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white">

                            <tbody>
                                <tr>
                                    <td>
                                        <table>
                                            @foreach($applicants as $la)
                                             <tr>
                                                 <td class="la-applicant" data-id="{{$la->id}}">
                                                     <b> {{$la->name}} </b>
                                                 </td>
                                                 <td> <input type="checkbox" class="applicants"
                                                             name="applicant_id[]" value="{{$la->id}}" {{ $la->applicant_approved==1?"checked":"" }}> </td>
                                             </tr>
                                            @endforeach
                                        </table>
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
                                @include ("uploader.facility_edit")
                            </tbody>
                            <tfoot id="facility_form">
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
                                    <button id="facility_submit" class="btn btn-default">Add</button>
                                </td>

                            </tr>
                            <tr>
                                <td class="add-button" colspan="6">
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
                    <div class="col-md-4 col-sm-4 col-lg-4" id="right_side_bar">

                    </div>


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
            //sidebar({{$applicant->id}});
            $(".applicants").trigger("change");
            $(".la_property").trigger("click")

        });
        // Delete Facility

        $(document.body).on("click","#assign_bank",function(){
            $("#la_bank").removeClass("hide");
           data = "bank=" +  $("#bank").val() + "&la_type="+$("#la_type").val() +
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
                    + "&applicant_id=" + applicant;
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
            if(applicant==""){
                $("#la-properties").html("");
                $("#la_facilities").html("");
                $("#new_facilities").html("");
                sidebar({{$applicant->id}});
            }
            else {
                $.ajax({
                    url: "{{ route("la_properties") }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val() + "&property_id=" + $(this).data("id"),
                    success: function (response) {
                        $("#la-properties").html("").append($(response));
                    },
                    error: function () {
                    }
                });
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
                $.ajax({
                    url: "{{ route("facility_edit") }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val(),
                    success: function (response) {
                        $("#new_facilities").html(response);
                    },
                    error: function () {
                    }
                });
            }
            if($("input[name='applicant_id[]']:checked").serialize()!=="") {
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
            }
            applicant = $("input[name='applicant_id[]']:checked").val();
            if(applicant=="") {
                applicant ={{$applicant->id}}
            }
            sidebar(applicant)
        })

        $(document.body).on("click",".facility_covered",function (e) {
            applicant_id = $(this).data("id");
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
                    $("#la-properties").html("").append($(response));
                },
                error: function () {
                }
            });
            sidebar(applicant_id);
        })

        function sidebar(id) {
            $("#right_side_bar").html("");
            $("#tab-3").html();
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
                    $("#right_side_bar").append($("#tab-3").clone(true));

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
                        $("#new_facility").html("").append($(response));
                        $("#right_side_bar").append($(response));
                        $.ajax({
                            url: "{{ route("new_commitment") }}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            },
                            data: "applicant_id=" + id + "&la_id=" + $("#la_id").val(),
                            success: function (response) {
                                $("#new_commitment").html("").append($(response));
                                $("#right_side_bar").append($(response));

                            },
                            error: function () {
                            }
                        });
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
                    $("#right_side_bar").append($(response));

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

    </script>
@endpush