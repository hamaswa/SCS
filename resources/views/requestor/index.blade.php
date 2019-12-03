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
                <div class="box-body table-responsive">
                    <span> AA NO </span> <span> </span>

                    <table id="example5" class="table table-bordered table-hover">
                        <thead>

                        <tr>
                            <th>
                                LA
                            </th>
                            <th>
                                Applicant
                            </th>
                            <th>
                                Loan Amount
                            </th>
                            <th>Rating</th>

                            <th>
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody id="new_facilities">
                        @if(count($loan_applications)==0)
                            <tr>
                                <td colspan="7">No Data Found</td>
                            </tr>
                        @endif
                        @foreach($loan_applications as $loan_application)
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="{{$loan_application->id}}">
                                    <input type="hidden" name="applicant_id"
                                           value="{{$loan_application->applicant_id}}">
                                    <input type="hidden" name="la_id"
                                           value="{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}">
                                    <a href="#" data-property="{{ $loan_application->property_id }}"
                                       data-applicants="{{$loan_application->applicants}}"
                                       id="sidebar">{{$loan_application->la_type}}/{{$loan_application->bank}}
                                        /{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}
                                    </a>

                                </td>
                                <td>
                                    {{ $loan_application->name }}
                                </td>
                                <th>
                                    {{ $loan_application->loan_amount }}
                                </th>
                                <td>
                                    ******
                                </td>


                                <th>

                                    <button id="request_la" name="request_la" value="Submit"
                                            data-applicant_id="{{$loan_application->applicant_id}}"
                                            data-la_id="{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}"
                                            class="btn btn-success btn-xs">Request
                                    </button>

                                </th>

                            </tr>
                        @endforeach
                        <tr>
                            {{$loan_applications->links()}}
                        </tr>
                        </tbody>
                    </table>

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
        });

        $(document.body).on("click", "#add_kiv", function (e) {
            href = $(this).data("href");
            if (confirm("Are you sure to add KIV?")) {
                $.ajax({
                    url: "{{ route("checker.add_kiv") }}",
                    type: 'post',
                    data: 'la_id=' + $(this).data("la_id") + "&la_applicant_id=" + $(this).data("la_applicant_id"),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
                    },
                }).done(function (response) {
                    if (response = "success") {
                        $(".msg").html("<div class=\"alert alert-success\">\n" +
                            "                    <p>Status Successfully marked as KIV</p>\n" +
                            "                </div>")
                        window.location = href + "?action=kiv_remarks";
                    }
                    else {
                        $(".msg").html("<div class=\"alert alert-error\">\n" +
                            "                    <p>Error Occured. Please contact administrator</p>\n" +
                            "                </div>")
                    }

                })

            }
        })

        $(document.body).on("click", "#request_la", function (e) {
            $(".msg").html("");
            $.ajax({
                url: "{{ route("requestor.request") }}",
                type: 'post',
                data: 'la_id=' + $(this).data("la_id") + "&applicant_id=" + $(this).data("applicant_id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
                },
            }).done(function (response) {
                if (response != "error") {
                    $(".msg").html("<div class=\"alert alert-success\">\n" +
                        "                    <p>" + response + "</p>\n" +
                        "            </div>")
                    alert(response);
                    window.location = window.location;//"{{route("requestor.index")}}";
                }
                else {
                    $(".msg").html("<div class=\"alert alert-error\">\n" +
                        "                    <p>Error Occured. Please contact administrator</p>\n" +
                        "                </div>")
                }

            })

        })
        $(document.body).on("click", "#sidebar", function (e) {
            id = $(this).data("applicants");
            console.log(id);
            sidebar(id);
        })

        function sidebar(id) {
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
                data: "id=" + id + "&property_id=" + $(this).data("property"),
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

    </script>
@endpush