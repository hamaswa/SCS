<fieldset id="applicantkyc" class="tab-action-main">

    <div class="col-sm-12 col-md-10 col-lg-10 col-lg-offset-1 border-light no-padding">
        <div class="box">
            <div class="box-body">
                @if($applicant->aacategory=="C")
                    <form id="newaa" name="newaa" action="{{ route("la.store") }}" method="post">
                        @csrf
                        <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                        <input type="hidden" value="{{$applicant->aacategory}}" name="aacategory">
                        <input type="hidden" value="{{isset($applicant_data->id)?$applicant_data->id:"0"}}" name="id">


                        <div class="col-sm-6 col-md-6 form-group">
                            <label>Company Name</label>
                            <input type="text" value="{{$applicant_data->name}}" name="name" class="form-control"
                                   autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Company Reg No</label>
                            <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id"
                                   class="form-control"
                                   autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Office Phone No</label>
                            <input type="text" value="{{$applicant_data->mobile}}" name="mobile" class="form-control"
                                   autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Date Established</label>
                            <input type="date" name="date_established"
                                   value="{{(isset($applicant_data->date_established)?$applicant_data->date_established:"")}}"
                                   class="form-control" autocomplete="off"/>
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Nature of Business</label>
                            <input type="text" name="nature_of_business" id="nature_of_business"
                                   value="{{(isset($applicant_data->nature_of_business)?$applicant_data->nature_of_business:"")}}"
                                   class="form-control" autocomplete="off"/>

                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Office Address</label>
                            <textarea name="address"
                                      value="{{isset($applicant_data->address)?$applicant_data->address:""}}"
                                      class="form-control"></textarea>
                        </div>
                        <input type="submit" name="create_company" value="Submit">
                    </form>
                @else

                    <div class="bg-gray-light padding-5">

                        <div id="applicant_buttons">
                            <div class="col-lg-12 col-md-12 applicants">
                                <div class="btn-group margin-bottom border-black-1" id="btn-air">
                                    <button type="button" class="btn btn-default btn-flat la_aa"
                                            data-la="{{$applicant->id}}"
                                            data-id="{{$applicant->id}}">{{$applicant->name}}</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-list"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu position-relative" id="" role="menu">
                                        <li><a href="#" class="">Edit</a></li>
                                        <li><a href="#" class="deleteInd">Delete</a></li>
                                    </ul>
                                </div>


                            </div>
                            @if(isset($attached_applicants))
                                @foreach($attached_applicants as $applicant_sub)
                                    <div class="col-lg-12 col-md-12 applicants">
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
                                                {{--<li><a href="#"  data-value="air" class="editincome">Edit</a></li>--}}
                                                <li><a href="#" data-la="{{$la_applicant_id}}"
                                                       data-id="{{$applicant_sub->id}}" class="deleteInd">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </div>

                        <div class="col-md-6 form-group">
                            <input class="form-control" name="attachIndAA" id="attachIndAASearch">
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="submit" class="attachIndAASearch btn btn-primary">
                        </div>

                        <div class="clearfix"></div>
                    </div>
                    <form  action="{{ route("la.store") }}" method="post">
                        @csrf
                        <input type="hidden" name="update_ind" value="update_ind">
                        <input type="hidden" name="la_applicant_id" value="{{$la_applicant_id}}">
                        <input type="hidden" name="aacategory" value="{{$applicant_data->aacategory}}" >
                        <input type="hidden" name="applicant_id" value="{{isset($applicant_data->id)?$applicant_data->id:"0"}}"
                               >
                        <div class="col-sm-12 col-md-4 form-group">
                            <label>Salutation</label>
                            <input type="text" name="salutation" id="salutation"
                                   value="{{(isset($applicant_data->salutation)?$applicant_data->salutation:"")}}"
                                   class="form-control" autocomplete="off"/>
                        </div>
                        <div class="col-sm-12 col-md-4 form-group">
                            <label>Position</label>
                            <input type="text" name="position" id="position"
                                   value="{{(isset($applicant_data->position)?$applicant_data->position:"")}}"
                                   class="form-control" autocomplete="off"/>

                        </div>
                        <div class="col-sm-12 col-md-4 form-group">
                            <label class="clearfix">Ownership</label>
                            <div class="col-sm-11 no-margin no-padding">
                                <input type="text" name="ownership"
                                       value="{{(isset($applicant_data->ownership)?$applicant_data->ownership:"")}}" class="form-control">
                            </div>
                            <div class="col-sm-1 no-margin no-padding">%</div>

                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Full Name as Per NRIC / Passport</label>
                            <input type="text" value="{{$applicant_data->name}}" name="name" class="form-control"
                                   autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>NRIC No. / Passport No.</label>
                            <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id"
                                   class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Mobile No.</label>
                            <input type="text" value="{{$applicant_data->mobile}}" name="mobile" class="form-control"
                                   autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Email</label>
                            <input type="email" name="email"
                                   value="{{(isset($applicant_data->email)?$applicant_data->email:"")}}"
                                   class="form-control" autocomplete="off">
                        </div>
                        <div class="col-sm-12 col-md-6 form-group">
                            <label>Residential Address</label>
                            <textarea name="address" class="form-control">
                            {{(isset($applicant_data->address)?$applicant_data->address:"")}}</textarea>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 form-group pull-right">
                            <input type="submit" value="Update" class="btn btn-default">
                        </div>

                    </form>
                @endif

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

</fieldset>

@push("scripts")
    <script type="text/javascript">


        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })

        $(document.body).on("click", ".la_aa", function (e) {
            form = document.createElement("form");
            form.setAttribute("method", "get");
            form.setAttribute("action", "{{ route("maker.index")}}/"+$(this).data("id")+"/edit");
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

        });

        $(document.body).on("click", ".deleteInd", function (e) {
            that = this;
            $.ajax({
                url: '{{ route('deleteIndAA') }}',
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
                url: '{{ route('attachIndAA') }}',
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
                    html = "<div class=\"col-lg-12 col-md-12 applicants\">\n" +
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
        $(document.body).on("click", ".attachIndAASearch", function (e) {
            e.preventDefault();
            var url = '{{ route("maker.create_aa", ":applicant_maker_id") }}';
            url = url.replace(':applicant_maker_id', $("#applicant_id").val());
            $.ajax({
                url: '{{ route('attachIndAASearch') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "unique_id=" + $("#attachIndAASearch").val() + "&la_applicant_id=" + $("#applicant_id").val()
            }).done(function (response) {
                if (response=="nodata") {
                    html = "<table class='table'><tr><td>No Data Found. Create New Application</td></tr>\n" +
                        "<tr><td>" +
                        "<li class='nav-item'>" +
                        "<a class='nav-link' target='_blank' href='"+url+"'>New AA</a>" +
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
        let business_forms = [];

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
            form = business_forms[$(this).data('number')];
            console.log(form);
            $("form#business_form :input").each(function () {
                $(this).val(form[$(this).attr('id')]);
            })

            //$("#business_owner_type option[value="+form['business_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\"" + $(this).data('number') + "\" id=\"update_business\">Update Business</button>"))
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
            business_forms.splice($(this).data('number'), 1);
            businessActionButtions();
        });


        function businessActionButtions() {
            $("#businesses").html("");
            i = 0;
            business_forms.forEach(function (form) {
                business_action_buttons = " <div class=\"btn-group margin-bottom border-black-1\">\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat\">Business " + (i + 1) + "</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='business" + i + "' data-number='" + i + "' class='editbusiness'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delbusiness' data-number='" + i + "'>Delete</a></li>\n" +
                    "                        </ul>\n" +
                    "                    </div>"
                $("#businesses").append($(business_action_buttons));

                i++;
            })

        }

    </script>
@endpush