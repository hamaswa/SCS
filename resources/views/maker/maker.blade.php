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
                        <table class="table table-bordered table-striped table-hover bg-white table-condensed">
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
                                @if($d->status !="Incomplete") @continue @endif
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
                                            <a href="{{route("maker.edit", ["id" => $d->id])  }}">
                                                {{ $d->unique_id }}</a>
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
                                               data-mobile="{{$d->mobile}}"
                                               class="btn btn-xs bg-light-blue-gradient edit">Appointment
                                                Attended</a>
                                        @elseif($d->status =="Appointment-Attended")
                                            <a href="javascript:void(0)" data-aaprogramcode="{{ $d->aaprogramcode }}"
                                               data-id="{{$d->id}}" data-status="{{ $d->status }}"
                                               data-name="{{ $d->name }}" data-unique_id="{{ $d->unique_id }}"
                                               data-mobile="{{$d->mobile}}"
                                               class="btn btn-xs bg-light-blue-gradient edit">Upload
                                                Consent</a>
                                        @elseif($d->status=="Consent Obtained" and $d->aacategory=="I")
                                            <a href="{{route("aadata.create", ["id" => $d->id])  }}"
                                               class="btn btn-xs bg-light-blue-gradient">KYC</a>

                                        @elseif($d->status =="Incomplete")
                                            <a href="{{route("maker.edit", ["id" => $d->id])  }}"
                                               class="btn btn-xs bg-light-blue-gradient">Maker View</a>
                                        @endif

                                        @if($d->aacategory=="I")
                                            @if($d->status=="Documentation" )
                                                @if(request()->user()->hasRole("maker"))
                                                    <a href="{{ route("maker.newla", $d->id) }}"
                                                       class="btn btn-xs bg-light-blue-gradient">Import</a>


                                                @endif
                                            @endif
                                        @else
                                            @if($d->status=="Consent Obtained" or $d->status=="Documentation" )
                                                @if(request()->user()->hasRole("maker"))
                                                    <a href="{{ route("maker.newla", $d->id) }}"
                                                       class="btn btn-xs bg-light-blue-gradient">Import</a>


                                                @endif
                                            @endif
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
        @include("layouts.consent_form")
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
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
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
                form.remove();
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
                form.remove();

            })

            $(".btn-newaa-submit").on("click", function (e) {
                if ($(this).data("value") == "consent")
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
                    url: "{{ route("applicant_sidebar") }}",
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
