<fieldset id="applicantkyc" class="tab-action-main">
    <?php
    if (!(isset($applicant_data) and $applicant_data != "")) {
        $applicant_data = $applicant;
    }
    ?>
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
                            <div class="col-lg-12 col-md-12" id="applicants">
                                <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn" id="btn-air">
                                    <button type="button" class="btn btn-default btn-flat"
                                            data-value="air">{{$applicant_data->name}}</button>
                                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-expanded="false">
                                        <i class="fa fa-list"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                </div>


                            </div>
                            @if(isset($attached_applicants))
                                @foreach($attached_applicants as $applicant_sub)
                                    <div class="col-lg-12 col-md-12" id="applicants">
                                        <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn"
                                             id="btn-air">
                                            <button type="button" class="btn btn-default btn-flat load"
                                                    data-la="{{$applicant_data->id}}"
                                                    data-value="{{$applicant_sub->id}}">{{$applicant_sub->name}}</button>
                                            <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                                    data-toggle="dropdown"
                                                    aria-expanded="false">
                                                <i class="fa fa-list"></i>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                        </div>
                                    </div>

                                @endforeach
                            @endif
                        </div>
                        <input class="form-control" name="attachIndAA" id="attachIndAASearch">
                        <input type="submit" class="attachIndAASearch">
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Salutation</label>
                        <input type="text" name="salutation" id="salutation"
                               value="{{(isset($applicant_data->nature_of_business)?$applicant_data->nature_of_business:"")}}"
                               class="form-control" autocomplete="off"/>
                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label>Position</label>
                        <input type="text" name="position" id="position"
                               value="{{(isset($applicant_data->nature_of_business)?$applicant_data->nature_of_business:"")}}"
                               class="form-control" autocomplete="off"/>

                    </div>
                    <div class="col-sm-12 col-md-4 form-group">
                        <label class="clearfix">Ownership</label>
                        <div class="col-sm-11 no-margin no-padding">
                            <input type="text" name="ownership"
                                   {{(isset($applicant_data->ownership)?$applicant_data->ownership:"")}} class="form-control">
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
                            {{(isset($applicant_data->address)?$applicant_data->residential_address:"")}}</textarea>
                    </div>
            </div>
            @endif
        </div>

        {{--<div class="box-footer">--}}
        {{--<input type="submit" class="btn btn-adn">--}}
        {{--<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Upload Consent</button>--}}
        {{--</div>--}}
    </div>
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

    <div id="myModal" class="modal fade" role="dialog">
        @include("layouts.consent_form")
    </div>
</fieldset>

@push("scripts")
    <script type="text/javascript">


        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
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
                    html = "<div class=\"col-lg-12 col-md-12\" id=\"applicants\">\n" +
                        "                                <div class=\"btn-group margin-bottom border-black-1 incomekyc-action-btn\" id=\"btn-air\">\n" +
                        "                                    <button type=\"button\" class=\"btn btn-default btn-flat\"\n" +
                        "                                            data-value=\"air\">" + response.applicant.name + "</button>\n" +
                        "                                    <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\"\n" +
                        "                                            data-toggle=\"dropdown\"\n" +
                        "                                            aria-expanded=\"false\">\n" +
                        "                                        <i class=\"fa fa-list\"></i>\n" +
                        "                                        <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                        "                                    </button>\n" +
                        "                                </div>\n" +
                        "\n" +
                        "                            </div>";

                    $("#applicant_buttons").append(html);
                    $(".message").append("<div class=\"alert alert-success\">\n" +
                        "                        <p>Applicant Successfully Attached</p>\n" +
                        "                    </div>");
                    $("#aa_attach_form").modal("hide");
                }
            })
        })
        $(document.body).on("click", ".attachIndAASearch", function () {
            $.ajax({
                url: '{{ route('attachIndAASearch') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "unique_id=" + $("#attachIndAASearch").val() + "&la_applicant_id=" + $("#applicant_id").val()
            }).done(function (response) {
                //response = JSON.parse(response);

                if (response == "No Data Found") {

                }
                else {

                    $("#aa_attach_form_body").html($(response));
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