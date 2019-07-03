@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="col-md-9 col-sm-12">
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

            <div class="box  bg-yellow-light">
                <div class="box-header">
                    <div class="col-md-12">
                        <h4>Pipeline</h4>
                    </div>
                    <form method="post" action="{{ route("pipeline.store") }}">
                        @csrf
                    <div class="col-md-3">
                        <select class="form-control" name="status" id="">
                            <option value="Appointment">Appointment</option>
                            <option value="Attended">Attended</option>
                            <option value="Consent">Consent</option>
                            <option value="Documentation">Documentation</option>
                            <option value="Application">Application</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="term" placeholder="Search"/>
                    </div>

                    <div class="col-md-3">
                        <input type="submit" class="form-control" name="pipeline_update_search" value="Search"/>
                    </div>
                </form>

                    {{--<div class="col-md-2 pull-right">--}}
                        {{--<select class="form-control">--}}
                            {{--<option value="update">Update</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th></th>
                            <th>IC/Com No.</th>
                            <th>Applicant</th>
                            <th>Market Value</th>
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
                            <td><input type="checkbox" name="applicant_id" value="{{$d->id}}" /></td>
                            <td><a href="javascript:void(0);">{{$d->unique_id}}</a></td>
                            <td>{{ $d->name }}</td>
                            <td></td>
                            <td></td>
                            <td>
                                <select class="form-control" id="singalaction{{$d->id}}">
                                    <option value="Application" {{ ($d->status == "Application"?" selected":"") }}>Application</option>
                                    <option value="Appointment" {{ ($d->status == "Appointment"?" selected":"") }}>Appointment</option>
                                    <option value="Attended" {{ ($d->status == "Attended"?" selected":"") }}>Attended</option>
                                    <option value="Consent" {{ ($d->status == "Consent"?" selected":"") }}>Consent</option>
                                    <option value="Documentation" {{ ($d->status == "Documentation"?" selected":"") }}>Documentation</option>
                                </select>
                            </td>
                            <td>
                                <button class="btn bg-gray-dark updatesingle" data-id="{{$d->id}}">Update</button>
                                <button class="btn" id="setreminder"><i class="fa fa-calendar-o"></i></button>
                                <button class="btn commentsModal" id=""><i class="fa fa-comment-o" ></i></button>
                                <button class="btn bellModal" id=""><i class="fa fa-bell-o"></i></button>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td><input type="checkbox" id="checkall" name="checkall" /></td>
                                <td colspan="2">
                                    <select class="form-control select2" name="statusall">
                                        <option value="Appointment">Appointment</option>
                                        <option value="Attended">Attended</option>
                                        <option value="Consent">Consent</option>
                                        <option value="Documentation">Documentation</option>
                                        <option value="Application">Application</option> </select>

                                </td>
                                <td><button class="btn bg-gray-dark" id="moveall">Move</button></td>
                            </tr>
                        <tr> <td colspan="7">{{ $data->links() }}</td> </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="box">
                <div class="box-header">
                    <div class="padding-5 bg-white pull-right border-light">
                        <img src="{{ asset("img/folder.png") }}"/>
                    </div>
                    <div class="padding-5 bg-yellow-light pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}"/>
                    </div>
                    <div class="padding-5 bg-chocolate pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}"/>
                    </div>
                    <div class="padding-5 bg-green-gradient pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}"/>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="commentsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header Comments</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <label>Comments</label>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
            $("#checkall").on("click",function (e) {
                    $(':checkbox[name=applicant_id]').prop('checked', this.checked);

            });
            $('.commentsModal').on('click',function(){
                $("#commentsModal").modal('show');
            });
            $('.bellModal').on('click',function(){
                $("#bellModal").modal('show');
            });
            $("#moveall").on("click",function (e) {
                form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{ route("pipeline.store") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(':checkbox[name=applicant_id]').each(function () {
                   if(this.checked){
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
            $(".updatesingle").on("click",function (e) {
                e.preventDefault();
                form = document.createElement("form");
                form.setAttribute("method", "post");
                form.setAttribute("action", "{{ route("pipeline.store") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(form).append($("<input type=checkbox checked name=applicant_id[] value=\"" + $(this).data("id") + "\">"));
                $(form).append($("<input type=hidden name=statusupdate value=statusupdate />"))
                $(form).append($("<input type=hidden name=statusall value=\"" + $("#singalaction"+$(this).data("id")).val() + "\">"))
                div = $("<div style=\"display=hidden\"></div>")
                $(div).append(form)
                document.body.appendChild(form);
                form.submit();

            })
        });
    </script>
@endpush
