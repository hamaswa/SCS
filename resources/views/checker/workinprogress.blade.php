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
                            <th>
                                HolderID
                            </th>

                            <th>
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody id="new_facilities">
                        @foreach($loan_applications as $loan_application)
                            <tr>
                                <td>
                                    <input type="hidden" name="id" value="{{$loan_application->id}}">
                                    <input type="hidden" name="applicant_id"
                                           value="{{$loan_application->applicant_id}}">
                                    <input type="hidden" name="la_id"
                                           value="{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}">
                                    <a href="#" data-applicants="{{$loan_application->applicants}}"
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

                                <th>
                                    {{ $loan_application->username }}
                                </th>


                                <th>

                                    <button id="show_la_update_model"
                                            data-la_applicant_id="{{$loan_application->la_applicant_id}}"
                                            data-la_id="{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}"
                                            class="btn btn-success btn-xs">Request
                                    </button>

                                </th>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>
    </div>

    <div id="update_wip_modal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update</h4>
                </div>
                <div class="modal-body" id="update_la_form">
                    <div class="form-group">
                        <input type="hidden" name="la_id">
                        <input type="hidden" name="la_applicant_id">

                        <input type="text" name="loan_amount">
                    </div>
                    <div class="form-group">
                        <select name="status">
                            <option value="approved">Approved</option>
                            <option value="declined">Declined</option>
                            <option value="appeal">Appeal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="remarks">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <input type="button" id="update_la" value="Update">

                    </div>
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
            $('.select2').select2({allowClear: true});
        });


        $(document.body).on("click", "#show_la_update_model", function (e) {
            $("#update_wip_modal").modal("show");
            $("#update_wip_modal").find("input[name=la_id]").val($(this).data("la_id"));
            $("#update_wip_modal").find("input[name=la_applicant_id]").val($(this).data("la_applicant_id"));
        })
        $(document.body).on("click", "#update_la", function (e) {
            $.ajax({
                url: "{{ route("checker.update",["id"=>0]) }}",
                type: 'post',
                data: "_method=PATCH&" + $("#update_wip_modal").find("input,textarea,select").serialize() + "&applicant_id=" + $("#update_wip_modal").find("input[name=la_applicant_id]").val(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
                },
            }).done(function (response) {
                if (response = "success") {
                    ///
                }
                else {
                    ///
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