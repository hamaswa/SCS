<fieldset id="applicantkyc" class="tab-action-main">

    <div class="col-sm-12 col-md-10 col-lg-10 col-lg-offset-1 border-light no-padding">
        <div class="box">
            <div class="box-body bg-gray-light">

                <div class="bg-gray-light padding-5">

                    <div id="applicant_buttons" class="col-md-12 col-lg-12 col-sm-12">
                        {{--<div class="applicants pull-left">--}}
                            {{--<div class="btn-group margin-bottom border-black-1" id="btn-air">--}}
                                {{--<button type="button" class="btn btn-default btn-flat la_aa"--}}
                                        {{--data-la="{{$applicant->id}}"--}}
                                        {{--data-id="{{$applicant->id}}">{{$applicant->name}}</button>--}}
                                {{--<button type="button" class="btn btn-default btn-flat dropdown-toggle"--}}
                                        {{--data-toggle="dropdown"--}}
                                        {{--aria-expanded="false">--}}
                                    {{--<i class="fa fa-list"></i>--}}
                                    {{--<span class="sr-only">Toggle Dropdown</span>--}}
                                {{--</button>--}}
                                {{--<ul class="dropdown-menu position-relative" id="" role="menu">--}}
                                    {{--<li><a href="#" class="">Edit</a></li>--}}
                                    {{--<li><a href="#" class="deleteInd">Delete</a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        @if(isset($attached_applicants))
                            @foreach($attached_applicants as $applicant_sub)
                                <div class="applicants form-group pull-left">
                                    <div class="btn-group margin-bottom border-black-1"
                                         id="btn-air">
                                        <button type="button" class="btn btn-default btn-flat la_aa"
                                                data-la="{{$applicant->id}}"
                                                data-id="{{$applicant_sub->id}}">{{$applicant_sub->name}}</button>
                                        <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-expanded="false">
                                            <i class="fa fa-list"></i>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>

                                        <ul class="dropdown-menu position-relative" id="" role="menu">
                                         @if($applicant->id!=$applicant_sub->id)
                                            <li><a href='javascript:void(0)' data-la="{{$la_applicant_id}}"
                                                   data-id="{{$applicant_sub->id}}" class="deleteInd">Delete</a>
                                            </li>
                                         @endif
                                        </ul>
                                    </div>
                                </div>

                            @endforeach
                        @endif
                        <div class="btn-group margin-bottom border-black-1" id="btn-air">
                            <button type="button" class="btn btn-default btn-flat showSearchBox">
                                +Applicant
                            </button>
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                    data-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="fa fa-list"></i>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="searchBox" class="hide searchBox">
                        <div class="col-md-6 form-group">
                            <input class="form-control" name="attachAA" id="attachAASearch">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="submit" class="attachAASearch btn btn-primary">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    @if(isset($businesses))
                        <div id="businesses" class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <?php
                            $i = 0;
                            $b = $s = 1;
                            ?>
                            @foreach($businesses as $business)
                                <?php
                                if ($business->business_type == 'Salaried')
                                    $i_no = $s++;
                                else
                                    $i_no = $b++;
                                ?>
                                <div class="btn-group margin-bottom border-black-1 businesskyc-action-btn">
                                    <button type="button" data-number='{{$i}}'
                                            class="btn btn-default btn-flat editbusiness">{{  $business->business_type."".$i_no }}</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                            data-toggle="dropdown"/>

                                    <i class="fa fa-list"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu position-relative" id="" role="menu">
                                        {{--<li><a href="#" id='business{{$i}}' data-number='{{$i}}' class='editbusiness'>Edit</a></li>--}}
                                        <li><a href="javascript:void(0)" class='delbusiness' data-number='{{ $i }}'>Delete</a>
                                        </li>
                                    </ul>
                                </div>
                                <?php $i++ ?>
                            @endforeach
                            <div class="btn-group margin-bottom border-black-1" id="btn-air">
                                <button type="button" class="btn btn-default btn-flat" data-toggle="modal"
                                        data-target="#addIncomeSource">
                                    +IncomeSource
                                </button>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                        data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-list"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>

                            </div>
                        </div>
                    @endif

                </div>

                <form action="{{ route("la.store") }}" method="post">
                    @csrf
                    <input type="hidden" name="update_ind" value="update_ind">
                    <input type="hidden" name="la_applicant_id" value="{{$la_applicant_id}}">
                    <input type="hidden" name="aacategory" value="{{$applicant_data->aacategory}}">
                    <input type="hidden" name="applicant_id"
                           value="{{isset($applicant_data->id)?$applicant_data->id:"0"}}">
                    <div class="col-sm-12 col-md-3 form-group">
                        <label>Salutation</label>
                        <input type="text" name="salutation" id="salutation"
                               value="{{(isset($applicant_data->salutation)?$applicant_data->salutation:"")}}"
                               class="form-control" autocomplete="off"/>
                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label>Residency Status</label>
                        <input type="text" name="residency_status" id="residency_status"
                               value="{{(isset($applicant_data->residency_status)?$applicant_data->residency_status:"")}}"
                               class="form-control" autocomplete="off"/>

                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label class="clearfix">Applicant Status</label>
                        <select name="applicant_status" id="applicant_status" class="form-control">
                            <option value="Male" {{(isset($applicant_data->applicant_status) && $applicant_data->applicant_status == "Male" ?"selected":"")}}>
                                Male
                            </option>
                            <option value="Female" {{(isset($applicant_data->applicant_status) && $applicant_data->applicant_status == "Female" ?"selected":"")}}>
                                Female
                            </option>
                        </select>

                    </div>
                    <div class="col-sm-12 col-md-3 form-group">
                        <label class="clearfix">Employment Status</label>
                        <input type="text" name="employment_status" id="employment_status"
                               value="{{(isset($applicant_data->employment_status)?$applicant_data->employment_status:"")}}"
                               class="form-control" autocomplete="off"/>
                    </div>

                    <div class="col-sm-12 col-md-6  form-group">
                        <label>Full Name as Per NRIC / Passport</label>
                        <input type="text" value="{{$applicant_data->name}}" name="name" class="form-control"
                               autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-6  form-group">
                        <label>NRIC No. / Passport No.</label>
                        <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id"
                               class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-6  form-group">
                        <label>Mobile No.</label>
                        <input type="text" value="{{$applicant_data->mobile}}" name="mobile" class="form-control"
                               autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-6  form-group">
                        <label>Email</label>
                        <input type="email" name="email"
                               value="{{(isset($applicant_data->email)?$applicant_data->email:(isset($businesses[0]) ? $businesses[0]['business_email']: ''))}}"
                               class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-6  form-group">
                        <label>Residential Address</label>
                        <textarea name="address"
                                  class="form-control">{{(isset($applicant_data->address)?$applicant_data->address:"")}}</textarea>
                    </div>


                    <?php /*
                        <div class="col-md-6 col-sm-12 bg-gray-light padding-5">
                            <div class="col-sm-12 col-md-12 form-group">
                                <label>Company Name</label>
                                <input type="text" name="company_name" value="{{(isset($applicant_data->company_name)?$applicant_data->company_name:"")}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-sm-12 col-md-12 form-group">
                                <label>Position</label>
                                <input type="text" name="position" value="{{(isset($applicant_data->position)?$applicant_data->position:(isset($businesses[0]) ? $businesses[0]->business_position: ''))}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-sm-12 col-md-6 form-group">
                                <label>Nature of Business</label>
                                <input type="text" name="nature_of_business" value="{{(isset($applicant_data->nature_of_business)?$applicant_data->nature_of_business:(isset($businesses[0]) ? $businesses[0]->business_nature: ''))}}" name="nature_of_business" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-sm-12 col-md-6 form-group">
                                <label>Date Joined</label>
                                <input type="date" name="date_established" value="{{(isset($applicant_data->date_established)?$applicant_data->date_established:"")}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-sm-12 col-md-12 form-group">
                                <label>office Phone no.</label>
                                <input type="text" name="office_phone_no" value="{{(isset($applicant_data->office_phone_no)?$applicant_data->office_phone_no:"")}}" class="form-control" autocomplete="off">
                            </div>
                            <div class="col-sm-12 col-md-12 form-group">
                                <label>Office Address</label>
                                <textarea name="office_address" class="form-control">{{(isset($applicant_data->office_address)?$applicant_data->office_address:"")}}</textarea>
                            </div>
                        </div>
                        */ ?>

                    <div class="col-sm-12 col-md-12 col-lg-12 form-group pull-right">
                        <input type="submit" value="Update" class="btn btn-default">
                    </div>

                </form>

            </div>

        </div>

        {{--<div class="box-footer">--}}
        {{--<input type="submit" class="btn btn-adn">--}}
        {{--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Upload Consent</button>--}}
        {{--</div>--}}
    </div>

    {{--<div class="col-sm-12 col-md-4 col-lg-4">--}}
    {{--<div class="box border-light">--}}
    {{--@include("layouts.consent_form")--}}
    {{--</div>--}}

    {{--</div>--}}

    <div id="aa_attach_form" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="aa_title"></h4>
            </div>
            <div class="modal-body bg-white" id="aa_attach_form_body">

            </div>

        </div>
    </div>

    <div id="showBussinessModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="bussiness_modal_title"></h4>
            </div>
            <div class="modal-body bg-gray-light" id="bussiness_modal_body">
                <form id="business_form" action="{{ route('bussiness.storeIncomeSource') }}" method="post" class="hide">
                    @csrf
                    <input type="hidden" id="id" name="bussiness_id" value="">
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label">Nature of Business</label>
                        <input name="business_nature" id="business_nature" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label">Position</label>
                        <input name="business_position" id="business_position" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label class="control-label"><em class="text-danger">*</em>Email</label>
                        <input name="business_email" id="business_email" class="form-control" type="email">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Company Name</label>
                        <input type="text" name="bussiness_company_name" id="bussiness_company_name" value=""
                               class="form-control" autocomplete="off">
                    </div>

                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Date Joined</label>
                        <input type="date" name="bussiness_date_established" id="bussiness_date_established" value=""
                               class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>office Phone no.</label>
                        <input type="text" name="bussiness_office_phone_no" id="bussiness_office_phone_no" value=""
                               class="form-control" autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Office Address</label>
                        <textarea name="bussiness_office_address" id="bussiness_office_address"
                                  class="form-control"></textarea>
                    </div>
                    <div class="col-sm-12 col-md-12 form-group">
                        <button type="submit" name="updateIncomeSource" class="btn btn-success">Update</button>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="form-group clearfix business_doc_form border-light padding-top-25" id="business_doc_form">
                    <div class="form-group col-md-3 col-sm-12">
                        <label class="control-label">Income Source</label>
                        <select id="business_type" name="business_type" class="form-control">
                            <option value="Business"
                            > Business
                            </option>
                            <option value="Salaried"
                            > Salaried
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-3 col-sm-12 primary_docs">
                        <label class="control-label">Primary Docs</label>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'type'=>'Buseness',
                        'options'=>$options,
                        'default'=>"Select Primary Document",])


                    </div>
                    <div class="form-group col-md-3 col-sm-12 support_docs">
                        <label class="control-label">Supporting Docs</label>

                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'type'=>'Salaried',
                        'options'=>$options,
                        'default'=>"Select Supporting Document",])

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                       <textarea name="guide_lines" class="form-control editor">

                        </textarea></div>
                    <div class="form-group col-md-3 col-sm-12 pull-right margin-top-15">
                        <input type="file" class="form-control btn btn-primary" name="business_doc[]" multiple
                               id="business_doc"/>
                    </div>
                </div>
            </div>

        </div>
    </div>

</fieldset>

@push("scripts")
    <script type="text/javascript">
        $(document).ready(function (e) {
            $("#business_type").change();
        })
        $('#business_doc[type="file"]').change(function (e) {
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype", "multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            form.setAttribute("target", "_blank");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#business_doc_form").clone(true));
            $(form).append($("#applicant_id").clone(true));

            div = $("<div style=\"display=hidden\"></div>")

            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            form.remove();
            $("#wealth_doc_form").find("option:selected").prop("selected", false)
            $("#showBussinessModal").modal('hide');
        });

        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })

        $(document.body).on("click", ".la_aa", function (e) {
            form = document.createElement("form");
            form.setAttribute("method", "get");
            form.setAttribute("action", "{{ route("maker.index")}}/" + $(this).data("id") + "/edit");
            $(form).append($("#la_applicant_id").clone())
            $(form).append($("<input name='applicant_id' value=" + $(this).data("id") + ">"))
            type = document.createElement("input");
            type.setAttribute("name", "aacategory");
            type.value = "I";
            $(form).append($(type))
            div = $("<div style=\"display=none\"></div>")
            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            form.remove();

        });


        $("#business_type").on('change', function (e) {
            if ($(this).val() == "Business") {
                $(".for_business").show();
            }
            else {
                $(".for_business").val("").hide();
            }

            type = $(this).val();
            getDocs(type, "primary_docs", "primary_docs", ".primary_docs", "Primary Docs")
            getDocs(type, "support_docs", "support_docs", ".support_docs", "Supporting Docs")

            function getDocs(type, name, id, target, label) {
                $.ajax({
                    url: "{{ route("selectoptions") }}",
                    type: "POST",
                    data: "type=" + type + "&name=" + name + "&id=" + id + "&label=" + label,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    if (response == "")
                        alert("No Document types found");
                    else
                        $(target).html("").append(response);
                });
            }
        })

        $(document.body).on("click", ".deleteInd", function (e) {
            that = this;
            $.ajax({
                url: '{{ route('deleteAA') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + $(this).data("id") + "&la_applicant_id=" + $("#la_applicant_id").val()
            }).done(function (response) {
                response = JSON.parse(response)
                if (response.error) {

                } else {
                    $(that).parent("li").parent("ul").parent("div").parent(".applicants").remove();
                    alert(response.success);

                }
            })
        })
        $(document.body).on("click", "#aa_attach", function () {
            $.ajax({
                url: '{{ route('attachAA') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + $(this).data("id") + "&la_applicant_id=" + $("#applicant_id").val()
            }).done(function (response) {
                response = JSON.parse(response);

                if (response.error) {

                }
                else {
                    html = "<div class=\"applicants form-group pull-left\">\n" +
                        "                                <div class=\"btn-group margin-bottom border-black-1 incomekyc-action-btn\" id=\"btn-air\">\n" +
                        "                                    <button type=\"button\" class=\"btn btn-default btn-flat la_aa\"\n" +
                        "                                            data-la=\"" + response.applicant.id + "\"\n" +
                        "                                                    data-id=\"" + response.applicant.id + "\">" + response.applicant.name + "</button>\n" +
                        "                                    <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\"\n" +
                        "                                            data-toggle=\"dropdown\"\n" +
                        "                                            aria-expanded=\"false\">\n" +
                        "                                        <i class=\"fa fa-list\"></i>\n" +
                        "                                        <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                        "                                    </button>\n" +
                        "                                     <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                        "                                       {{--<li><a href=\"#\"  data-value=\"air\" class=\"editincome\">Edit</a></li>--}}\n" +
                        "                                       <li><a href=\"#\" data-la=\"{{$la_applicant_id}}\" data-id=\"" + response.applicant.id + "\" class=\"deleteInd\">Delete</a></li>\n" +
                        "                                    </ul>" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>";

                    $("#applicant_buttons").append($(html));
                    $(".message").append("<div class=\"alert alert-success\">\n" +
                        "                        <p>Applicant Successfully Attached</p>\n" +
                        "                    </div>");
                    $("#aa_attach_form").modal("hide");
                }
            })
        })
        $(document.body).on("click", ".attachAASearch", function (e) {
            e.preventDefault();
            var url = '{{ route("maker.create_aa", ":applicant_maker_id") }}';
            url = url.replace(':applicant_maker_id', $("#applicant_id").val());
            $.ajax({
                url: '{{ route('attachAASearch') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "unique_id=" + $("#attachAASearch").val() + "&la_applicant_id=" + $("#applicant_id").val()
            }).done(function (response) {
                if (response == "nodata") {
                    html = "<table class='table'><tr><td>No Data Found. Create New Application</td></tr>\n" +
                        "<tr><td>" +
                        "<li class='nav-item'>" +
                        "<a class='nav-link' target='_blank' id=\"new_aa\" href='" + url + "'>New AA</a>" +
                        "</li>" +
                        "                </td></tr></table>";
                    $("#aa_attach_form_body").html(html);
                    $("#aa_attach_form").modal('show');
                }
                else {

                    $("#aa_attach_form_body").html(response);
                    $("#aa_attach_form").modal('show');

                }


            })
        })
        $(document.body).on("click","#new_aa",function(e){
            $("#aa_attach_form_body").html("");
            $("#aa_attach_form").modal('hide');
        })
        // let business_forms = [];
        let business_forms = <?php isset($businesses) ? print_r(json_encode(json_decode($businesses, true))) : []; ?>;
        $(document.body).on("click", "#add_business", function () {

            let form = {};
            $("#business_form")
                .serializeArray()
                .map(input => form[input.name] = input.value);
            business_forms.push(form);
            $("#business_form").trigger("reset")
            businessActionButtions();
        });


        $(document.body).on("click", ".editbusiness", function () {
            $("#business_doc").val('');
            $("#bussiness_modal_title").text($(this).text());
            $("#showBussinessModal").modal('show');
            $("#business_form").removeClass('hide');
            form = business_forms[$(this).data('number')];
            console.log(form);
            $("form#business_form :input").each(function () {
                $(this).val(form[$(this).attr('id')]);
            })
            $("form#business_form").find('input[name=_token]').val('{{ csrf_token() }}');
            //$("#business_owner_type option[value="+form['business_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            //$("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\"" + $(this).data('number') + "\" id=\"update_business\">Update Business</button>"))
        });

        $(document.body).on("click", "#update_business", function (e) {
            let form = {};
            $("#business_form")
                .serializeArray()
                .map(input => form[input.name] = input.value);
            business_forms[$(this).data("id")] = form;
            $("#business_form").trigger("reset")
            businessActionButtions();
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_business\">Add business</button>"))
        });
        $(document.body).on("click", ".delbusiness", function (e) {
            form = business_forms[$(this).data('number')];
            business_forms.splice($(this).data('number'), 1);
            businessActionButtions();

            $.ajax({
                url: '<?php echo e(route('bussiness.delete')); ?>',
                type: 'post',
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                // },
                data: {
                    '_token': "{{ csrf_token() }}",
                    'id': form.id
                }

            }).done(function (response) {

            })
        });

        function businessActionButtions() {
            $("#businesses").html("");
            business_type = $("#business_type :selected").val();
            i = 0;
            s = 0;
            b = 0;
            business_forms.forEach(function (form) {
                n = 0;
                if (form.business_type == "Business") {
                    b++;
                    n = b;
                }
                else {
                    s++;
                    n = s;
                }
                business_action_buttons = " <div class=\"btn-group margin-bottom border-black-1 businesskyc-action-btn\">\n" +
                    "                        <button type=\"button\"  data-number='" + i + "'  class=\"btn btn-default btn-flat editbusiness\"> " + form.business_type + n + "</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href='javascript:void(0)' class='delbusiness' data-number='" + i + "'>Delete</a></li>\n" +
                    "                        </ul></div>"
                $("#businesses").append($(business_action_buttons));

                i++;
            })
            $("#businesses").append('<div class="btn-group margin-bottom border-black-1" id="btn-air">\n' +
                '                                    <button type="button" class="btn btn-default btn-flat" data-toggle="modal" data-target="#addIncomeSource">\n' +
                '                                        +IncomeSource</button>\n' +
                '                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"\n' +
                '                                            data-toggle="dropdown"\n' +
                '                                            aria-expanded="false">\n' +
                '                                        <i class="fa fa-list"></i>\n' +
                '                                        <span class="sr-only">Toggle Dropdown</span>\n' +
                '                                    </button>\n' +
                '                                </div>');
        }

        $("#business_form").submit(function (e) {

            $.ajax({
                url: '<?php echo e(route('bussiness.storeIncomeSource')); ?>',
                type: 'POST',
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                // },
                data: $(this).serialize()

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
        });

    </script>
@endpush