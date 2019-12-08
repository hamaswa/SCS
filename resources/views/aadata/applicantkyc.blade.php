<fieldset id="applicantkyc" class="tab-action-main">
    {{--<div class="col-md-2 col-sm-3">--}}
        {{--<a href="javascript:void(0);" data-id="applicantkyc" class="bg-yellow-light padding-5 pull-left vericaltext tab-action border-black-1">APPLICATION <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="incomekyc" id="nextincomekyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br>INCOME <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="wealthkyc" id="nextwealthkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br>WEALTH <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="businesskyc" id="nextbusinesskyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br><br>business <br> KYC</a>--}}
    {{--</div>--}}

    <div class="col-sm-12 col-md-6 col-lg-6 col-lg-offset-1">
        <div class="box">
            <div class="col-md-12 col-sm-12 bg-gray-light padding-5">
                <div class="box-header bg-gray">
                    <strong class="applicant padding-5"></strong>

                    {{--<a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf" title="CTOS Report Download"><img--}}
                                {{--src="{{ asset("img/save.jpeg") }}"/></a>--}}
                    {{--<a class="bg-white padding-5 pull-left" href="javascript:void(0)" onclick = "$('#applicantform').trigger('reset')"  title="Refresh"><img--}}
                                {{--src="{{ asset("img/refresh.jpeg") }}"/></a>--}}
                    {{--<a class="bg-white padding-5 pull-right" href="javascript:void(0)" onclick="$('#consent').trigger('click')" title="Upload Consent">--}}
                        {{--<img--}}
                                {{--src="{{ asset("img/file.jpeg") }}"/></a>--}}
                    {{--<input type="file" class="hide" name="consent" id="consent">--}}
                </div>

                <div class="box-body bg-gray-light">
                    <div id="businesses" class="col-lg-12 col-md-12 col-sm-12 form-group">

                    </div>
                    <div class="form-group clearfix">
                        <div class="col-md-12 col-sm-12">
                            <label class="control-label">Income Source</label>
                            <select id="business_type" name="business_type" class="form-control" name="">
                                <option value="Business"> Business </option>
                                <option value="Salaried"> Salaried </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group clearfix">
                        <div class="col-md-11 col-sm-11">
                            <label class="control-label">Shareholding</label>
                            <input name="business_shareholding" id="business_shareholding" placeholder="" class="form-control" type="text">
                        </div>
                        <div class="col-md-1 col-sm-1">
                            <h2>%</h2>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Business Turnover (Monthly)</label>
                        <input name="business_turnover" id="business_turnover" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Nature of Business</label>
                        <input name="business_nature" id="business_nature" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Position</label>
                        <input name="business_position" id="business_position" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label"><em class="text-danger">*</em>Email</label>
                        <input name="business_email" id="business_email" placeholder="" class="form-control" type="email">
                    </div>
                    <?php /*
                    <div class="form-group clearfix">
                        <div class="col-md-6 col-sm-12">
                            <label class="control-label">Type</label>
                            <select id="aacategory" class="form-control select2" name="aacategory" style="width: 100%;">
                                <option value="Com" {{ ($inputs['aacategory']=="Com")?" selected":"" }}>
                                    Company
                                </option>
                                <option value="Ind"  {{ ($inputs['aacategory']=="Ind")?" selected":"" }}>
                                    Individual
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="name_label" class="control-label">
                            @if($inputs['aacategory']=="Com")
                                Company Name
                            @else
                                Full Name as per NRIC/Passport
                            @endif
                        </label>
                        <input name="name" id="name" placeholder="" class="form-control" type="text">

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="unique_id_label" class="control-label">
                            @if($inputs['aacategory']=="Com")
                            Company Registration No(e.g.12345678K)
                            @else
                            NRIC No./Passport No.(e.g.12345678)
                            @endif
                        </label>
                        <input name="unique_id" id="unique_id" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Mobile Number (e.g. 60121234567 / 6512345678)</label>
                        <input name="mobile" id="mobile" placeholder="" class="form-control" type="text">
                    </div>
                    */    ?>
                    <div class="form-group">
                        <div class="col-md-12 pull-right" id="btnsubmit">
                            {{--<a href="{{ route("pipeline.index") }}" class="btn btn-primary pull-left">Back</a>--}}
                            <input type="button" name="submit" id="add_business" value="Add"
                                   class="btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 no-padding">
        <div class="box">
            <div class="box-body bg-gray left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover bg-white text-black table-condensed">
                        <thead>
                        <tr class="bg-primary">
                            <th colspan="4" class="text-center">Document</th>
                        </tr>
                        <tr class="bg-gray-dark">
                            <th>Date</th>
                            <th>Document Name</th>
                            <th>Document Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>2019-07-13</td>
                            <td>dynamic update</td>
                            <td>dynamic update</td>
                            <td><a href="#">view</a></td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>

        </div>

</div>

    <div class="form-group col-md-12">
        <ul class="pager">

            <li class="next"><a href="javascript:void(0);" id="nextincomekyc" class="bg-yellow-gradient hide">Income KYC &gt;&gt;</a>
            </li>
        </ul>
        {{--<div class="col-md-12">--}}
        {{--<button type="button" id="nextincomekyc" class="btn btn-primary">--}}
        {{--Next--}}
        {{--</button>--}}
        {{--</div>--}}
    </div>

</fieldset>

@push("scripts")
    <script type="text/javascript">


        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })
        let business_forms=[];

        $(document.body).on("click","#add_business",function(){
            //businesscount = business_forms.count();
            //$("#number").val(businesscount);
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms.push(form);
            $("#business_form").trigger("reset")
            businessActionButtions();
        });


        $(document.body).on("click",".editbusiness",function () {
            form = business_forms[$(this).data('number')];
            console.log(form);
            $("form#business_form :input").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })
            
           //$("#business_owner_type option[value="+form['business_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\""+$(this).data('number')+"\" id=\"update_business\">Update Business</button>"))
        });

        $(document.body).on("click","#update_business",function(e){
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms[$(this).data("id")] = form;
            $("#business_form").trigger("reset")
            businessActionButtions();
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_business\">Add business</button>"))
        });
        $(document.body).on("click",".delbusiness",function(e){
            business_forms.splice($(this).data('number'),1);
            businessActionButtions();
        });


        function businessActionButtions(){
            $("#businesses").html("");
            i=0;
            business_forms.forEach(function(form){
                business_action_buttons = " <div class=\"btn-group margin-bottom border-black-1\">\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat\">Business "+(i+1)+"</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='business"+i+"' data-number='"+i+"' class='editbusiness'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delbusiness' data-number='"+i+"'>Delete</a></li>\n" +
                    "                        </ul>\n" +
                    "                    </div>"
                $("#businesses").append($(business_action_buttons));

                i++;
            })
            //submitbusinesskyc();

        }

    </script>
@endpush