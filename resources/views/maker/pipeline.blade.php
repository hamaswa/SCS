@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="col-md-12 col-sm-12">
            <div id="message">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif


                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>

            <div class="box">
                <div class="box-header">
                    <div class="col-md-12">
                        <h4>Pipeline</h4>
                    </div>
                    <form method="post" action="{{ route("pipeline.store") }}">
                        @csrf
                        <div class="col-md-3">
                            <select class="form-control" name="status" id="">
                                <option value="Appointment">Appointment</option>
                                <option value="Appointment-Attended">Appointment-Attended</option>
                                <option value="Consent Obtained">Consent Obtained</option>
                                <option value="Documentation">Documentation</option>
                                <option value="Application">Application</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="term" placeholder="Search"/>
                        </div>

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-primary" name="pipeline_update_search" value="Search"/>
                        </div>
                    </form>

                    {{--<div class="col-md-2 pull-right">--}}
                    {{--<select class="form-control">--}}
                    {{--<option value="update">Update</option>--}}
                    {{--</select>--}}
                    {{--</div>--}}
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th></th>
                            <th>IC/Com No.</th>
                            <th>Applicant</th>
                            <th>Loan Amount</th>
                            <th>TAT</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($data)==0)
                            <tr>
                                <td colspan="7">
                                    No Data Found
                                </td>

                            </tr>
                        @endif
                        @foreach($data as $d)
                            <tr>
                                <td><input type="checkbox" name="applicant_id" value="{{$d->id}}"/></td>
                                <td>
                                    @if($d->status =="Documentation")
                                        <a href="{{route("aadata.edit",  $d->id)  }}">
                                            {{ $d->unique_id }}</a>

                                    @elseif($d->status=="Consent Obtained")
                                        <a href="{{route("aadata.create", ["id" => $d->id])  }}">
                                            {{ $d->unique_id }}</a>
                                    @else
                                        {{ $d->unique_id }}
                                    @endif
                                </td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->market_value }}</td>
                                <td></td>
                                <td>{{ $d->status }}
                                    {{--<select class="form-control" id="singalaction{{$d->id}}">--}}
                                    {{--<option value="Application" {{ ($d->status == "Application"?" selected":"") }}>Application</option>--}}
                                    {{--<option value="Appointment" {{ ($d->status == "Appointment"?" selected":"") }}>Appointment</option>--}}
                                    {{--<option value="Attended" {{ ($d->status == "Attended"?" selected":"") }}>Attended</option>--}}
                                    {{--<option value="Consent" {{ ($d->status == "Consent"?" selected":"") }}>Consent</option>--}}
                                    {{--<option value="Documentation" {{ ($d->status == "Documentation"?" selected":"") }}>Documentation</option>--}}
                                    {{--</select>--}}
                                </td>
                                <td>
                                    {{--<button class="btn bg-gray-dark updatesingle" data-id="{{$d->id}}">Update</button>--}}
                                    <button class="btn setreminder" data-id="{{$d->id}}"><i
                                                class="fa fa-calendar-o"></i></button>
                                    <button class="btn commentsModal" data-id="{{$d->id}}"><i
                                                class="fa fa-comment-o"></i></button>
                                    <a href="javascript:void(0)" data-toggle="control-sidebar"
                                       data-id="{{$d->id}}"
                                       class="btn btn-xs bg-light-blue-gradient view-applicant">View</a>
                                    @if($d->status=="Appointment")
                                        <a href="javascript:void(0)" data-aaprogramcode="{{ $d->aaprogramcode }}"
                                           data-id="{{$d->id}}" data-status="{{ $d->status }}"
                                           data-name="{{ $d->name }}" data-unique_id="{{ $d->unique_id }}"
                                           data-mobile="{{$d->mobile}}" class="btn btn-xs bg-light-blue-gradient edit">Appointment
                                            Attended</a>
                                    @elseif($d->status =="Appointment-Attended")
                                        <a href="javascript:void(0)" data-aaprogramcode="{{ $d->aaprogramcode }}"
                                           data-id="{{$d->id}}" data-status="{{ $d->status }}"
                                           data-name="{{ $d->name }}" data-unique_id="{{ $d->unique_id }}"
                                           data-mobile="{{$d->mobile}}" class="btn btn-xs bg-light-blue-gradient edit">Upload
                                            Consent</a>
                                    @elseif($d->status=="Consent Obtained")
                                        <a href="{{route("aadata.create", ["id" => $d->id])  }}"
                                           class="btn btn-xs bg-light-blue-gradient">KYC</a>
                                    @else
                                        <a onclick="alert('Will link to Next Module')"
                                           class="btn btn-xs bg-light-blue-gradient">Application</a>
                                    @endif

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <td><input type="checkbox" id="checkall" name="checkall"/></td>
                            <td colspan="2">
                                <select class="form-control select2" name="statusall">
                                    <option value="KIV appointment">KIV appointment</option>
                                    <option value="Dropped Appointment">Dropped Appointment</option>
                                    <option value="Avoid Segment Appointment">Avoid Segment Appointment</option>
                                    <option value="Archive">Archive</option>
                                    <option value="Drop Pipeline">Drop Pipeline</option>

                                </select>

                            </td>
                            <td>
                                <button class="btn bg-gray-dark" id="moveall">Move</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">{{ $data->links() }}</td>
                        </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>


            </div>
        </div>
        {{--<div class="col-md-3 col-sm-12">--}}
        {{--<div class="box">--}}
        {{--<div class="box-header">--}}
        {{--<div class="padding-5 bg-white pull-right border-light">--}}
        {{--<img src="{{ asset("img/folder.png") }}"/>--}}
        {{--</div>--}}
        {{--<div class="padding-5 bg-yellow-light pull-right border-light">--}}
        {{--<img src="{{ asset("img/left-icon.png") }}"/>--}}
        {{--</div>--}}
        {{--<div class="padding-5 bg-chocolate pull-right border-light">--}}
        {{--<img src="{{ asset("img/left-icon.png") }}"/>--}}
        {{--</div>--}}
        {{--<div class="padding-5 bg-green-gradient pull-right border-light">--}}
        {{--<img src="{{ asset("img/left-icon.png") }}"/>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
    </div>
    <div id="aa_edit_form" class="modal fade" role="dialog">
        <form id="edit-aa" name="edit-aa" action="{{ route("aadata.store") }}" method="post"
              enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <button id="btn-newaa-submit-no-consent" data-value="noconsent"
                        class="btn-newaa-submit btn btn-default pull-right" style="margin-right:20px;">Consent Not Obtained
                </button>
                <h4 id="aa_title"></h4>
            </div>
            <div class="modal-body bg-white">
                    @csrf
                    <input type="hidden" name="form" value="new_application" id="form">
                    <input type="hidden" name="applicant_status" value="new_application" id="applicant_status">
                    <div id="applicant_id"></div>
                    <div class="bg-gray-light padding-5">
                        <div class="box-body bg-gray-light">
                            <div class="form-group col-md-12 col-sm-12">
                                <label id="name_label" class="control-label">
                                    Full Name as per NRIC/Passport
                                </label>
                                <input name="name" id="name" placeholder="" class="form-control" type="text">
                                <input type="checkbox" data-verify-error="Please Verify Name"
                                       class="verify-newaa-input"> Verified

                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label id="unique_id_label" class="control-label">
                                    NRIC No./Passport No.(e.g.12345678)
                                </label>
                                <input name="unique_id" id="unique_id" placeholder="" class="form-control"
                                       minlength="12" type="number">
                                <input type="checkbox" data-verify-error="Please Verify IC"
                                       class="verify-newaa-input"> Verified
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label class="control-label">Mobile Number (e.g. 60121234567 /
                                    6512345678)</label>
                                <input name="mobile" id="mobile" placeholder="" class="form-control"
                                       minlength="10" type="number">
                                <input type="checkbox" data-verify-error="Please Verify mobile"
                                       class="verify-newaa-input"> Verified
                            </div>
                            {{--<div class="form-group col-md-6 col-sm-6 ">--}}
                            {{--<div class="form-group">--}}
                            {{--<label>Program</label>--}}
                            {{--<select class="select2 form-control" name="aaprogramcode"--}}
                            {{--id="aaprogramcode">--}}
                            {{--<option value="ABMB">ABMB</option>--}}
                            {{--<option value="REA">REA</option>--}}
                            {{--<option value="DEVP">DEVP</option>--}}
                            {{--<option value="INS">INS</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            <input type="hidden" name="status" value="Appointment-Attended"/>

                            <div class="form-group col-md-12 col-sm-12 consent-field">
                                <a class="bg-white padding-5 pull-right consent-field" href="javascript:void(0)"
                                   onclick="$('#consent').trigger('click')" title="Upload Consent">
                                    <img src="{{ asset("img/file.jpeg") }}"/></a>
                                <input type="file" class="hide" name="consent" id="consent">
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <button id="btn-newaa-submit" data-value="consent"
                                        class="btn-newaa-submit btn bg-gray-dark">Request
                                </button>



                            </div>
                        </div>
                    </div>
                <div class="clearfix"></div>
            </div>

        </div>
        </form>

    </div>

    <div id="commentsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Comments</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="commentsform">
                        <input type="hidden" id="comment_applicant_id" name="applicant_id">
                        <div class="col-lg-12"><label>Comments</label>
                            <textarea name="comments" class="form-control editor">

                        </textarea>
                        </div>
                        <div class="col-lg-12 pull-right">
                            <input value="Add Comment" name="submit" type="submit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="bellModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header Remainder</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <label>Remainder</label>
                        <textarea class="form-control">

                        </textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
@endsection

@push("scripts")
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '.editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#commentsform").submit(function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('applicantcomments.store') }}',
                    type: 'Post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: $(this).serializeArray()
                }).done(function (response) {
                    $("#commentsModal").modal('hide');
                    if (response = "success") {
                        $("#message").html("<div class=\"alert alert-success alert-block\">\n" +
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>\n" +
                            "<strong>Comment Successfully Added</strong>\n" +
                            "</div>");
                    }
                    else {
                        $("#message").html("<div class=\"alert alert-danger alert-block\">\n" +
                            "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>\n" +
                            "<strong>Error Occured while adding comment</strong>\n" +
                            "</div>");
                    }

                });
            });
            $('.select2').select2();

            $("#checkall").on("click", function (e) {
                $(':checkbox[name=applicant_id]').prop('checked', this.checked);

            });
            $('.commentsModal').on('click', function () {
                $("#comment_applicant_id").val($(this).data("id"));
                $("#commentsModal").modal('show');
            });
            $('.setreminder').on('click', function () {
                $("#reminder_applicant_id").val($(this).data("id"));
                $("#setreminder").modal('show');
            });
            $("#moveall").on("click", function (e) {
                form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{ route("pipeline.store") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(':checkbox[name=applicant_id]').each(function () {
                    if (this.checked) {
                        $(form).append($("<input type=checkbox checked name=applicant_id[] value=\"" + $(this).val() + "\">"));
                    }
                });
                $(form).append($("<input type=hidden name=statusupdate value=statusupdate />"))
                $(form).append($("select[name=statusall]"))
                div = $("<div style=\"display=hidden\"></div>")
                $(div).append(form)
                document.body.appendChild(form);
                form.submit();
            })
            $(".updatesingle").on("click", function (e) {
                e.preventDefault();
                form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{ route("pipeline.store") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(form).append($("<input type=checkbox checked name=applicant_id[] value=\"" + $(this).data("id") + "\">"));
                $(form).append($("<input type=hidden name=statusupdate value=statusupdate />"))
                $(form).append($("<input type=hidden name=statusall value=\"" + $("#singalaction" + $(this).data("id")).val() + "\">"))
                div = $("<div style=\"display=hidden\"></div>")
                $(div).append(form)
                document.body.appendChild(form);
                form.submit();

            })

            $(".btn-newaa-submit").on("click", function (e) {
                if($(this).data("value")=="consent")
                $(".verify-newaa-input").each(function () {
                    if (!($(this).prop("checked"))) {
                        alert($(this).data("verify-error"));
                        e.preventDefault();
                        return false;
                    }
                })
                $("#applicant_id").append($("<input type='hidden' name='is-consent' value='" + $(this).data("value") + "'>"))

            })
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


            $(".edit").on("click", function (e) {
                $(".btn-newaa-submit-no-consent").removeClass("hide")
                $(".verify-newaa-input").prop("checked", false);
                $("#aa_edit_form").modal('show');
                $("#aa_title").html("Request CCRIS");
                $("#name").val($(this).data("name"));//.prop("disabled",true);
                $("#form").val("");//.prop("disabled",true);
                $("#unique_id").val($(this).data("unique_id"));//.prop("disabled",true);
                $("#mobile").val($(this).data("mobile"));//.prop("disabled",true);
                $("#applicant_status").val($(this).data("status"));//.prop("disabled",true);
                $("#aaprogramcode").val($(this).data("aaprogramcode"));
                $("#applicant_id").append($("<input type='hidden' name='applicant_id' value='" + $(this).data("id") + "'>"))
                $("#btn-newaa-submit").text("Request");
                if ($(this).data("status") == "Appointment") {
                    //$("#btn-newaa-submit").text("Save Data");

                    $("#form").val("applicant_attend");//.prop("disabled",true);
                    // $("#consent").attr("disabled", true);
                    //$(".consent-field").addClass("hide");
                    $(".applicant-status").removeClass("hide");
                    $("#status").attr("disabled", false);
                }
                else if ($(this).data("status") == "Appointment-Attended") {
                    $("#btn-newaa-submit-no-consent").addClass("hide");
                    $("#form").val("applicant_consent");//.prop("disabled",true);
                    //$(".consent-field").removeClass("hide");
                    // $(".applicant-status").addClass("hide");
                    $("#status").attr("disabled", true);
                    $("#consent").attr("disabled", false);
                }

            })
        });

    </script>
@endpush