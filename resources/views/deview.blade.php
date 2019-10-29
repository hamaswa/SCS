@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    {{--<section class="content-header">--}}
    {{--<h1>Data Entry</h1>--}}
    {{--<ol class="breadcrumb">--}}
    {{--<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>--}}
    {{--<li class="active">Here</li>--}}
    {{--</ol>--}}
    {{--</section>--}}
    <section class="content">
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
        <div class="col-sm-12 col-md-9 de-table-bor">
            <form id="searchapplicant" name="searchapplicant" method="post" action="{{ route("housingloan.index") }}">
                @csrf
                <div class="col-md-12">
                    <h4>Existing AA</h4>
                </div>
                <div class="col-md-4">
                    <select class="form-control select2" name="searchfield" id="searchfield">
                        <option value="unique_id">Applicant ID/Company No</option>
                        <option value="name">Applicant Name/Company Name</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Search"/>
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" name="submit" value="Search"/>
                </div>
            </form>
        </div>
    @if(!isset($applicantdata)  OR count($applicantdata)==0)

            <div class="col-sm-12 col-md-12 de-table-bor">
                    {{--<div class="box-header">--}}
                    {{--<a class="btn btn-primary" href="{{ route("housingloan.create") }}">Create</a>--}}
                    {{--</div>--}}
                    <div class="box-body">
                        <div id="response"></div>
                        <div class="margin-bottom padding-5 border-black-1">

                            <div class="pull-right"><a href="{{ route("housingloan.create") }}"> </a>
                            </div>
                            <div class="table-responsive">
                            <table id="example5" class="table table-bordered table-hover bg-white">
                                <thead>
                                <tr class="bg-light-blue-gradient">
                                    <th>CCRIS</th>
                                    <th>Facility</th>
                                    <th>Facility Date</th>
                                    <th>Capacity</th>
                                    <th>Facility Limit</th>
                                    <th>Facility Outstanding</th>
                                    <th>Installment</th>
                                    <th>MIA</th>
                                    <th>CONDUCT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="9">No Applicants Found</td>
                                </tr>

                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>

        @else

        @foreach($applicantdata as $data)
                <div class=" mar-lr row">
                    <div class="col-sm-12 col-md-10 de-table-bor row">

                        <div class="box-body">
                            <div id="response"></div>
                            <div class="col-sm-12 pull-right">
                                <form id="searchapplicant" method="post" action="{{ route("downloadpdf") }}">
                                    @csrf

                                    <input type="hidden" class="form-control" name="aacategory" value="{{$data->aacategory}}"/>
                                    <input type="hidden" class="form-control" name="name" value="{{$data->name}}"/>
                                    <input type="hidden" class="form-control" name="unique_id" value="{{$data->unique_id}}"/>

                                    <div class="col-md-4 pull-right">
                                        {{--<button type="submit" name="submit" value="Download Ctos Report" class="bg-white padding-5 pull-right" title="CTOS Report Download">--}}
                                            {{--<img src="{{ asset("img/save.jpeg") }}"/>--}}
                                        {{--</button>--}}
                                        {{--<input type="submit" class="btn btn-default form-control" name="submit" value="Download Ctos Report"/>--}}
                                    </div>
                                </form>
                            </div>
                            <div class="margin-bottom padding-5 border-black-1">
                                <label>{{ $data->name }}</label>
                                <div class="clearfix"></div>
                                <span>CREDIT FACILITY INFORMATION</span>
                                <div class="pull-right">
                                    <a class="btn btn-default" href="{{ route("housingloan.create") }}?applicant_id={{ $data->id }}">Add
                                        Facility Info</a>
                                </div>
                                <table id="example5" class="table table-bordered table-hover bg-white">
                                    <thead>
                                    <tr class="bg-light-blue-gradient">
                                        <th>CCRIS</th>
                                        <th>Facility</th>
                                        <th>Facility Date</th>
                                        <th>Capacity</th>

                                        <th>Facility Limit</th>
                                        <th>Facility Outstanding</th>
                                        <th>Instalment</th>
                                        <th>MIA</th>
                                        <th>CONDUCT</th>
                                        <td>Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data->facilityInfo as $k => $v)

                                        <tr>
                                            <td>
                                                {{ $v->csris }}
                                            </td>
                                            <td>
                                                <input type="hidden" name="id" value="{{$v->id}}">
                                                {{strtoupper($v->type) }}

                                            </td>
                                            <td>
                                                <input type="date" id="facilitydate" required name="facilitydate"
                                                       placeholder="dd/mm/yyyy" class="form-control facilitydate"
                                                       data-inputmask="'alias': 'dd/mm/yyyy'"
                                                       value="{{$v->facilitydate}}">
                                            </td>


                                            <td>
                                                @if($v->type!='crdtcard')
                                                    <form>
                                                    <div class="form-group">
                                                        <label>
                                                            <input type="radio" checked="true" name="capacity"
                                                                   id='account' value="own"
                                                                   {{ (strtolower($v->capacity)=="own"?" checked":"") }} class="minimal"
                                                                   checked="">
                                                            OWN
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="capacity" value="ja"
                                                                   {{ ((strtolower($v->capacity)=="joint" or strtolower($v->capacity)=='partner')?"checked ":"") }} id="account"
                                                                   class="minimal">
                                                            JA
                                                        </label>

                                                    </div>
                                                    </form>
                                                @endif
                                            </td>
                                            <td>
                                                <input name="facilitylimit" id="facilitylimit"
                                                       value="{{$v->facilitylimit}}" required type="number" min="0"
                                                       class="form-control my-colorpicker1"
                                                       style="background-color: #fff;">


                                            </td>
                                            <td>
                                                <input type="number" name="facilityoutstanding"
                                                       value="{{$v->facilityoutstanding}}" required
                                                       id="facilityoutstanding" class="form-control my-colorpicker1"
                                                       style="background-color: #fff;">

                                            </td>
                                            <td>
                                                <input type="text"
                                                       {{ ($v->type=='crdtcard'? 'readonly':'') }} value=" {{$v->installment}}"
                                                       name="installment" id="installment"
                                                       class="form-control my-colorpicker1"
                                                       style="background-color: #fff;">

                                            </td>


                                            <td>
                                                <select id="mia" class="form-control" name="mia">
                                                    <option value="0" {{ ($v->mia=="0"?"selected":"") }}>0</option>
                                                    <option value="1" {{ ($v->mia=="1"?"selected":"") }}>1</option>
                                                    <option value="2" {{ ($v->mia=="2"?"selected":"") }}>2</option>
                                                    <option value="3" {{ ($v->mia=="3"?"selected":"" )}}>3</option>
                                                </select>


                                            </td>
                                            <td>
                                                <select id="conduct" class="form-control" name="conduct">
                                                    <option value="0" {{ ($v->conduct=="0"?"selected":"") }}>0</option>
                                                    <option value="1" {{ ($v->conduct=="1"?"selected":"") }}>1</option>
                                                    <option value="2" {{ ($v->conduct=="2"?"selected":"") }}>2</option>
                                                    <option value="3" {{ ($v->conduct=="3"?"selected":"") }}>3</option>
                                                </select>


                                            </td>
                                            <td><a class="btn btn-default update_facility">Update</a>
                                                {!! Form::open(['route' => ['housingloan.destroy', $v->id], 'method' => 'delete']) !!}
                                                <div class='btn-group'>


                                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'onclick' => "return confirm('Are you sure?')"
                                                    ]) !!}
                                                </div>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="9">
                                            <label>CURRENT COMMITMENT</label>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2 col-sm-12 no-padding no-margin">
                        <div class="box">
                            <div class="box-body bg-yellow-light  left-box  detail-box">
                                <strong>{{$data->name}}</strong>
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover bg-white margin-bottom">
                                    <thead>

                                    <tr class="bg-light-blue-gradient">
                                        <th>Facility</th>
                                        <th>Current DSR</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data->facilityInfo as $k=>$v)
                                        <tr>
                                            <td>

                                                {{strtoupper($v->type) }}

                                            </td>

                                            <?php
                                            $v->installment = intval(preg_replace('/[^\d.]/', '', $v->installment));
                                            ?>
                                            <td>
                                                @switch($v->type)


                                                    @case("crdtcard")
                                                    {{ $v->facilityoutstanding * .05}}
                                                    @break

                                                    @case("ovrdraft")
                                                    {{ ($v->facilitylimit * .07) / 12 }}
                                                    @break
                                                    @case("ohrpcrec")
                                                    @if($v->installment!="")
                                                        @if(strtolower($v->capacity)=='own')
                                                            {{ $v->installment }}
                                                        @else
                                                            {{ $v->installment/2 }}
                                                        @endif
                                                    @endif
                                                    @break
                                                    @default
                                                    @if($v->installment!="")
                                                        @if(strtolower($v->capacity)=='own')
                                                            {{ $v->installment }}
                                                        @else
                                                            {{ $v->installment/2 }}
                                                        @endif
                                                    @endif
                                                    @break

                                                @endswitch
                                            </td>
                                        </tr>

                                    @endforeach


                                    </tbody>

                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $applicantdata->links() }}

        @endif
    </section>

@endsection

@push("scripts")
    <script type="text/javascript">


        $(document).ready(function () {
            $(".update_facility").click(function () {
                event.preventDefault(); //prevent default action
                submit = true;
                $(".has-error").removeClass("has-error");

                // if ($("#facilitylimit").val() == "") {
                //     $("#facilitylimit").parent("div").addClass("has-error")
                //     submit = false;
                //
                // }
                // if ($("#facilityoutstanding").val() == "") {
                //     $("#facilityoutstanding").parent("div").addClass("has-error")
                //     submit = false;
                // }
                // if ($("#facilitydate").val() == "") {
                //     $("#facilitydate").parent("div").addClass("has-error")
                //     submit = false;
                // }
                // if ($("#installment").val() == "") {
                //     $("#installment").parent("div").addClass("has-error")
                //     submit = false;
                // }
                // if (submit == false) {
                //     return false;
                // }

                data = $(this).parent("td").parent("tr").find(":input").serializeArray();
                for(d in data){
                    if(data[d]['name']=='_method'){
                        data[d]['value']="patch";
                    }

                }


                form = document.createElement("form");
                form.action = '{{ route('housingloan.update',1) }}'
                form.method = 'POST';
                $(this).parent("td").parent("tr").find(":input").each(function (e) {
                    $(form).append($(this));
                })
                $(form).find("input[name=_method]").attr("id","_method").val("patch");
                $(document.body).append(form)
                form.submit();



                {{--$.ajax({--}}
                    {{--url: '{{ route('housingloan.update',1) }}',--}}
                    {{--type: 'POST',--}}
                    {{--data: data,--}}
                    {{--headers: {--}}
                        {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
                    {{--},--}}
                {{--}).done(function (response) { //--}}
                    {{--if (response == "success") {--}}
                        {{--$("#facilitydate,#facilitylimit,#facilityoutstanding,#installment,#csris").val("");--}}
                        {{--$("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +--}}
                            {{--"                Record Successfully Added\n" +--}}
                            {{--"                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +--}}
                            {{--"\n" +--}}
                            {{--"            </div>")).show();--}}
                    {{--}--}}
                    {{--else {--}}
                        {{--$("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +--}}
                            {{--"                Error Occured.\n" +--}}
                            {{--"                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +--}}
                            {{--"\n" +--}}
                            {{--"            </div>"))--}}
                    {{--}--}}
                {{--});--}}
            });


        })

    </script>
@endpush
