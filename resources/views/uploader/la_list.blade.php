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
                        <span> AA NO </span> <span> </span>

                        <table id="example5" class="table table-bordered table-hover">
                            <thead>

                            <tr>
                                <th>
                                    LA
                                </th>
                                <th>
                                    Loan Amount
                                </th>
                                <th>
                                    Private
                                </th>
                                <th>
                                    Public
                                </th>
                                <th>
                                    Own
                                </th>
                                <th>
                                    Remarks
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>
                            </thead>
                            <tbody id="new_facilities">
                            @foreach($loan_applications as $loan_application)
                                <tr>
                                    <th>
                                        {{$loan_application->la_type}}/{{$loan_application->bank}}
                                        /{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}

                                    </th>
                                    <th>
                                        {{ $loan_application->loan_amount }}
                                    </th>
                                    <th>
                                        <input name="private" value="private" type="radio">
                                    </th>
                                    <th>
                                        <input name="public" value="public" type="radio">
                                    </th>
                                    <th>
                                        <input name="own" value="own" type="radio">
                                    </th>
                                    <th>
                                        Remarks
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
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
            $('.select2').select2({allowClear: true});
            forms = [];
            forms['facility_form'] = $("#facility_form").children().clone(true, true)

            id = $("input[name='applicant_id[]']:checked").map(function () {
                return this.value;
            }).get().join(',');
            sidebar(id);
            la_properties();
            la_facilities();
            facility_edit();

        });
        // Delete Facility

        $(document.body).on("click", "#assign_bank", function () {
            $("#la_bank").removeClass("hide");
            data = "bank=" + $("#bank").val() + "&la_type=" + $("#la_type").val() +
                "&id={{$loan_application->id}}&la=update_la";
            $.ajax({
                url: '{{ route('uploader.store') }}',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                if (response == "success") {
                    alert("LA Created Successfully. Bank Assign Successfully")
                }
            })
        })

        $(document.body).on("click", "#create_la", function () {
            $("#la_bank").removeClass("hide");
            $("#bank").click();
        })
        $(document.body).on("click", "#facility_delete", function (e) {

            that = $(this);
            $.ajax({
                url: '{{ route('delete_facility') }}',
                type: 'POST',
                data: "id=" + $(this).data("id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                if (response == "success") {
                    that.parent("td").parent("tr").remove();
                    sidebar($("input[name='applicant_id[]']:checked").val())

                }
            })

        })
        //Add and Update New facility
        $(document.body).on("click", "#facility_submit", function (e) {
            loan_amount = $(this).parent("td").parent("tr").find("#loan_amount").val();
            const principal = parseFloat(loan_amount);

            interest_rate = $(this).parent("td").parent("tr").find("#interest_rate").val();
            const calculatedInterest = parseFloat(interest_rate / 100 / 12);

            loan_tenure = $(this).parent("td").parent("tr").find("#loan_tenure").val();
            const calculatedPayments = parseFloat(loan_tenure) * 12;
            const x = Math.pow(1 + calculatedInterest, calculatedPayments);
            const installment = Math.round((principal * x * calculatedInterest) / (x - 1), 2);


            //installment =  Math.round(total_repay/ (loan_tenure*12),2);
            data = $(this).parent("td").parent("tr").find(":input").serialize()
                + "&installment=" + installment
                + "&applicant_id=" +
                $("input[name='applicant_id[]']:checked").map(function () {
                    return this.value;
                }).get().join(',');
            submit_facility(data)

        });

        $(document.body).on("click", '.la_property', function (e) {
            $.ajax({
                url: '{{ route("attach_property") }}',
                type: 'POST',

                data: $("input[name='applicant_id[]']:checked").serialize() + "&la_id=" + $("#la_id").val() + "&property_id=" + $(this).data("id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                }
            }).done(function (response) {
                $(".property_" + response).addClass("red");
            })
        })

        $(document.body).on("click", ".la-applicant", function (e) {
            sidebar($(this).data("id"));
        })

        $(document.body).on("change", ".applicants", function (e) {
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
            if (applicant == "") {
                $("#la-properties").html("");
                $("#la_facilities").html("");
                $("#new_facilities").html("");
                id = $("input[name='applicants']").val();
                sidebar(id);
            }
            else {
                la_properties();
                la_facilities();
                facility_edit();
                id = $("input[name='applicant_id[]']:checked").map(function () {
                    return this.value;
                }).get().join(',');
                sidebar(id);
            }

        })

        $(document.body).on("click", ".facility_covered", function (e) {
            applicant_id = $(this).data("id");
            $.ajax({
                url: "{{ route("cover_facility") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='facility_covered[]']:checked").serialize()
                + "&la_id=" + $("#la_id").val()
                + "&applicant_id=" + applicant_id,
                success: function (response) {
                    $("#la-properties").html("").append($(response));
                },
                error: function () {
                }
            });

            id = $("input[name='applicant_id[]']:checked").map(function () {
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
                data: "applicant_id=" + id + "&la_id=" + $("#la_id").val(),
                success: function (response) {
                    if (response != "") {
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

        function la_properties() {
            $.ajax({
                url: "{{ route("la_properties") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='applicant_id[]']:checked").serialize() +
                "&la_id=" + $("#la_id").val() + "&property_id=" + $(this).data("id"),
                success: function (response) {
                    $("#la-properties").html("").append($(response));
                },
                error: function () {
                }
            });
        }

        function la_facilities() {
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