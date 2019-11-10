<fieldset id="propertykyc" class="tab-action-main">

    <div class="col-md-6 col-sm-12 col-lg-6 col-lg-offset-1">
        <div class="box">
            <input type="hidden" name="number" id="number" value="">

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

            </div>
            @if(isset($attached_applicants))
                @foreach($attached_applicants as $applicant_sub)
                    @if($applicant->id !=$applicant_sub->id)
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
                                {{--<li><a href="#"  data-value="air" class="editincome">Edit</a></li>--}}
                                <li><a href="#" data-la="{{$la_applicant_id}}"
                                       data-id="{{$applicant_sub->id}}" class="deleteInd">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endif

                @endforeach
            @endif

            <div class="box-header bg-gray">
                <div class="col-md-12 col-sm-12">
                    <strong class="applicant padding-5"></strong>
                </div>
            </div>
            <div class="box-body bg-gray-light">
                <div class="col-lg-12 col-md-12 col-sm-12" id="properties">
                    <?php $i = 0; ?>
                    @foreach($properties as $property)

                        <div class="btn-group margin-bottom border-black-1 propertykyc-action-btn">
                            <button type="button" data-number='{{$i}}' class="btn btn-default btn-flat view">
                                Property{{$i+1}}</button>
                            <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                    data-toggle="dropdown"/>

                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu position-relative" id="" role="menu">
                                <li><a href="#" id='delproperty{{$i}}' data-number='{{$i}}'
                                       class='editproperty'>Edit</a></li>
                                <li><a href="#" class='delproperty' data-number='{{ $i }}'>Delete</a></li>
                            </ul>
                        </div>

                        <div class="clearfix"></div>

                        <?php $i++ ?>
                    @endforeach

                </div>
                <div class="form-group" id="property_doc_form">
                    <input type="hidden" name="doc_hint" value="Property1">
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Primary Docs</label>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'type'=>'Property_primary_docs',
                        'options'=>$options,
                        'default'=>"Select Primary Document"
                        ])


                    </div>
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Supporting Docs</label>
                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'type'=>'property_support_docs',
                        'options'=>$options,
                        'default'=>"Select Supporting Document",])

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                       <textarea name="guide_lines" class="form-control editor">

                        </textarea></div>
                    <div class="form-group col-md-4 col-sm-3 bg-gray-light pull-right margin-top-15">
                        <input type="file" class="form-control btn btn-primary"
                               name="property_doc[]" multiple id="property_doc"/>
                    </div>
                </div>

                <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-gray-light">Property</label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" name="property_type" value="bank" id="property_type_bank"> Bank
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="property_type" value="free" id="property_type_free"> Free
                    </label>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label for="market_value">Market value</label>
                    <input type="number" name="property_market_value" class="form-control" id="property_market_value">
                </div>
                <?php /*
                    <div class="form-group col-md-12 col-sm-12">
                        <h4 class="bg-gray-dark padding-5 text-center">Property Details</h4>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label class="radio-inline">
                            <input type="radio" name="property_master_individual" value="master"> Master Title
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="property_master_individual" value="individual"> Individual
                        </label>
                        <div class="clearfix"></div><br>
                        <label class="radio-inline">
                            <input type="radio" name="property_hold" value="freehold"> Free Hold
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="property_hold" value="leasehold"> Lease Hold
                        </label>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_reno_cost">Reno Cost</label>
                        <input type="number" name="property_reno_cost" id="property_reno_cost" value="" class="form-control">
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_labu">LA/BU</label>
                        <input type="text" name="property_labu" id="property_labu" value="" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_reno_details">Renovation details</label>
                        <textarea name="property_reno_details" id="property_reno_details" class="form-control" value=""></textarea>
                    </div>
                    */ ?>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="property_address">Property Type</label>
                    <select name="property_owner_type" id="property_owner_type" class="form-control">
                        <option value="Terrace House">Terrace House</option>
                        <option value="Semi detached">Semi detached</option>
                        <option value="Bangalow House">Bangalow House</option>
                        <option value="Condominium">Condominium</option>
                        <option value="Service Suite">Service Suite</option>
                        <option value="Shoplot">Shoplot</option>
                        <option value="Office Lot">Office Lot</option>
                        <option value="Factory">Factory</option>
                        <option value="Residental Land">Residental Land</option>
                        <option value="Commercial Land">Commercial Land</option>
                        <option value="Agriculture Land">Agriculture Land</option>
                        <option value="Others">Others</option>
                        {{--<option value="rent">Rent</option>--}}
                        {{--<option value="landed">Landed</option>--}}
                    </select>

                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="property_storey">Storey</label>
                    <input type="number" name="property_storey" id="property_storey" class="form-control"/>

                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="property_owner">Owner</label>
                    <input type="number" name="property_owner" id="property_owner" class="form-control"/>

                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="property_loan_outstanding">Loan Outstanding</label>
                    <input type="number" name="property_loan_outstanding" id="property_loan_outstanding"
                           class="form-control" value="">
                </div>
                <?php /*
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_bank">Bank</label>
                        <select name="property_bank" id="property_bank" class="form-control" >
                            <option value="ABMB">ABMB</option>
                            <option value="REA">REA</option>
                            <option value="DEVP">DEVP</option>
                            <option value="INS">INS</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_address">Property Address</label>
                        <textarea name="property_address" id="property_address" value="" class="form-control">
                        </textarea>
                    </div>
                    */ ?>

                <div class="form-group col-lg-12" id="propertykyc-submit-btn">
                    <button type="button" class="btn btn-primary" id="add_property">Add Property</button>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-12">
        <div class="box">
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive propertykyc_right">
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead class="bg-light-blue">
                        <tr class="bg-light-blue-gradient">
                            <th colspan="3" class="text-center">Property</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>MV</th>
                            <th>OS</th>
                            <th>CO</th>
                        </tr>
                        </thead>
                        <tbody id="propertyright">
                        <?php
                        $total_mv = 0;
                        $total_os = 0;
                        $total_co = 0;

                        ?>
                        @foreach($properties as  $property)
                            <?php
                            $total_mv += $property->property_market_value;
                            $total_os += $property->property_loan_outstanding;

                            ?>
                            <tr>
                                <td>{{$property->property_market_value}}</td>
                                <td>{{$property->property_loan_outstanding}}</td>
                                <td>{{ ($property->property_market_value * (0.9) - $property->property_loan_outstanding*1) }}</td>
                            </tr>
                        @endforeach
                        <tr class='bg-green'>
                            <td colspan=3>Total</td>
                        </tr>
                        <tr class=bg-green>
                            <td>{{$total_mv}}</td>
                            <td>{{$total_os}}</td>
                            <td>{{ $total_mv * (0.9) - $total_os }}</td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12 col-lg-12">
        <ul class="pager">
            <li><a href="#" id="maker_complete" class="bg-yellow-gradient btn-finish">Submit >></a></li>
        </ul>
    </div>
</fieldset>
@push("scripts")
    <script type="text/javascript">


        $('#property_doc[type="file"]').change(function (e) {
            if ($("#number").val() == "") {
                alert("Please Select Property")
                return false;
            }
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype", "multipart/form-data")
            form.setAttribute("target", "_blank")
            form.setAttribute("action", "{{ route("documents.store") }}");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#property_doc_form").clone(true));
            $(form).append($("#number").clone(true));
            $(form).append($("#applicant_id").clone(true));

            div = $("<div style=\"display=hidden\"></div>")

            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            form.remove();
            $("#property_doc_form").find("option:selected").prop("selected", false)

        });
        $("#backwealthkyc").click(function (e) {
            $("#wealthkyc").removeClass("hide");
            $("#propertykyc").addClass("hide");
        })

        let forms = <?php print_r(json_encode(json_decode($properties, true))); ?>;

        $(document.body).on("click", "#add_property", function () {
            //propertycount = forms.count();
            //$("#number").val(propertycount);
            let form = {};
            $("#propertyform")
                .serializeArray()
                .map(input => form[input.name] = input.value);
            forms.push(form);
            $("#propertyform").trigger("reset")
            formActionButtions();
        });

        $(document.body).on("click", "#maker_complete", function () {
            $.ajax({
                url: "{{ route("maker.inprogress") }}",
                type: "POST",
                data: "id={{$applicant->id}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                window.location = "{{ route("pipeline.index") }}";
            })

        });


        $(document.body).on("click", ".editproperty", function () {
            form = forms[$(this).data('number')];
            $("form#propertyform :input").not("[type=radio]").each(function () {
                $(this).val(form[$(this).attr('id')]);
            })
            $("#propertyform input[type='radio']").each(function () {
                if ($(this).val() == form[$(this).attr('name')]) {
                    $(this).attr("checked", "checked");
                } else {
                    console.log("1");
                }
            })

            $('#property_owner_type option[value="' + form['property_owner_type'] + '"]').attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#propertykyc-submit-btn").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\"" + $(this).data('number') + "\" id=\"update_property\">Update Property</button>"))
        });

        $(document.body).on("click", ".propertykyc-action-btn button.view", function (e) {
            form = forms[$(this).data('number')];
            console.log(form);
            $("form#propertyform :input").each(function () {
                $(this).val(form[$(this).attr('id')]);
            })
            $("input[type='radio']").each(function () {
                if ($(this).val() == form[$(this).attr('name')]) {
                    console.log($(this).val())
                } else {
                    console.log("1");
                }
            })
            $('#property_owner_type option[value="' + form['property_owner_type'] + '"]').attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#propertykyc-submit-btn").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\"" + $(this).data('number') + "\" id=\"update_property\">Update Property</button>"))
        })

        $(document.body).on("click", "#update_property", function (e) {
            let form = {};
            $("#propertyform")
                .serializeArray()
                .map(input => form[input.name] = input.value);
            forms[$(this).data("id")] = form;
            $("#propertyform").trigger("reset")
            formActionButtions();
            $("#propertykyc-submit-btn").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_property\">Add Property</button>"))
        });
        $(document.body).on("click", ".delproperty", function (e) {
            forms.splice($(this).data('number'), 1);
            formActionButtions();
        });

        function formActionButtions() {
            $("#properties").html("");
            $(".propertyright").html("");
            property_market_value = 0;
            property_loan_outstanding = 0;
            i = 0;
            forms.forEach(function (form) {
                property_market_value += (form['property_market_value'] * 1);
                property_loan_outstanding += (form['property_loan_outstanding'] * 1);
                property_action_buttons = " <div class=\"btn-group margin-bottom border-black-1 propertykyc-action-btn\">\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat view\" data-number='" + i + "'>Property " + (i + 1) + "</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='property" + i + "' data-number='" + i + "' class='editproperty'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delproperty' data-number='" + i + "'>Delete</a></li>\n" +
                    "                        </ul>\n" +
                    "                    </div>"
                $("#properties").append($(property_action_buttons));
                $(".propertyright").append("<tr><td>" + form['property_market_value'] + "</td><td>" + form['property_loan_outstanding'] + "</td><td>" + (form['property_market_value'] * .9 - form['property_loan_outstanding'] * 1) + "</td></tr>");
                i++;
            })
            $(".propertyright").append("<tr class='bg-green'><td colspan=3>Total</td></tr><tr class=bg-green><td>" + property_market_value + "</td><td>" + property_loan_outstanding + "</td><td>" + (property_market_value * .9 - property_loan_outstanding) + "</td></tr>");
            $(".propertykyc_right").html($("#propertykyc_right").html());
            $("#number").val("");
            submitpropertykyc();

        }


    </script>
@endpush
