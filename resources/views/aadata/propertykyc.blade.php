<fieldset id="propertykyc" class="hide">
    <div class="col-md-6 col-sm-12">
        <div class="box">
                <input type="hidden" name="number" id="number" value="0">
                <div class="box-header bg-yellow-light">
                    <div class="form-group col-md-12 bg-gray padding-5">
                        <div class="col-md-5 col-sm-12 bg-white">
                            <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                        </div>
                        <div class="col-md-7 col-sm-12">
                            <a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf" title="CTOS Report Download"><img src="{{ asset("img/save.jpeg") }}" /></a>
                            <a class="bg-white padding-5 pull-left" href="javascript:void(0)"  onclick = "$('#propertyform').trigger('reset')"  title="Refresh"><img src="{{ asset("img/refresh.jpeg") }}" /></a>

                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12" id="properties">    <ul></ul></div>


                    <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-yellow-light">Property</label>

                </div>
                <div class="box-body bg-yellow-light">
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
                        <input type="text" name="property_market_value" class="form-control" id="property_market_value">
                    </div>
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

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_address">Type</label>
                        <select  name="property_owner_type" id="property_owner_type" class="form-control">
                            <option value="rent">Rent</option>
                            <option value="landed">Landed</option>
                        </select>

                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_storey">Storey</label>
                        <input type="number" name="property_storey" id="property_storey" class="form-control" />

                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_owner">Owner</label>
                        <input type="number" name="property_owner" id="property_owner" class="form-control" />

                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_loan_outstanding">Loan Outstanding</label>
                        <input type="number" name="property_loan_outstanding" id="property_loan_outstanding" class="form-control" value="">

                    </div>



                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_bank">Bank</label>
                        <select name="property_bank" id="property_bank" class="form-control" >
                            <option value="ABMB">ABMB</option>
                            <option value="REA">REA</option>
                            <option value="DEVP">DEVP</option>
                            <option value="INS">INS</option>
                        </select>
                        {{--<textarea name="property_bank" id="property_bank" class="form-control"></textarea>--}}
                    </div>

                    <div class="form-group col-md-6 col-sm-12">
                        <label for="property_address">Property Address</label>
                        <textarea name="property_address" id="property_address" value="" class="form-control">
                        </textarea>
                    </div>

                    <div class="form-group col-lg-12" id="btnsubmit">
                        <button type="button" class="btn btn-primary" id="add_property">Add Property</button>
                    </div>

                </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="padding-5 bg-white pull-right border-light">
                    <img src="{{ asset("img/folder.png") }}" />
                </div>
                <div class="padding-5 bg-white pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>
                <div class="padding-5 bg-chocolate pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>
                <div class="padding-5 bg-green-gradient pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>


            </div>
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
                <table class="table table-bordered table-striped table-hover bg-white">
                    <thead class="bg-light-blue">
                    <tr class="bg-light-blue-gradient">
                        <th colspan="3" class="text-center">Property</th>
                    </tr>
                    <tr class="bg-aqua">
                        <th>MV</th>
                        <th>OS</th>
                        <th>CD</th>
                    </tr>
                    </thead>
                    <tbody id="propertyright">

                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12 ">
        <ul class="pager">
            <li class="previous" id="backwealthkyc"><a href="javascript:void(0);" class="bg-yellow-gradient"> &lt;&lt; Wealth KYC</a> </li>
            <li class="previous" id="submitpropertykyc"><a href="javascript:void(0);" class="bg-yellow-gradient">  Submit >></a> </li>
        </ul>
    </div>


</fieldset>
@push("scripts")
    <script type="text/javascript">

        $("#backwealthkyc").click(function (e) {
            $("#wealthkyc").removeClass("hide");
            $("#propertykyc").addClass("hide");
        })
        let forms=[];
        $(document.body).on("click","#add_property",function(){
            //propertycount = forms.count();
            //$("#number").val(propertycount);
            let form = {};
            $("#propertyform" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            forms.push(form);
            $("#propertyform").trigger("reset")
            formActionButtions();
        });
        $(document.body).on("click",".editproperty",function () {
            form = forms[$(this).data('number')];
            $("form#propertyform :input").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })
            $("input[type='radio']").each(function(){
                if($(this).val()==form[$(this).attr('name')]){
                    console.log($(this).val())
                } else {
                    console.log("1");
                }
            })
            $("#property_owner_type option[value="+form['property_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\""+$(this).data('number')+"\" id=\"update_property\">Update Property</button>"))
        });
        $(document.body).on("click","#update_property",function(e){
            let form = {};
            $("#propertyform" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            forms[$(this).data("id")] = form;
            $("#propertyform").trigger("reset")
            formActionButtions();
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_property\">Add Property</button>"))
        });
        $(document.body).on("click",".delproperty",function(e){
            forms.splice($(this).data('number'),1);
            formActionButtions();
        });
        function formActionButtions(){
            $("#properties").html("");
            $("#propertyright").html("");
            property_market_value = 0;
            property_loan_outstanding = 0;
            i=0;
            forms.forEach(function(form){
                property_market_value += (form['property_market_value']*1);
                property_loan_outstanding += (form['property_loan_outstanding']*1);
                property_action_buttons = " <div class=\"btn-group margin-bottom border-black-1\">\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat\">Property "+(i+1)+"</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='property"+i+"' data-number='"+i+"' class='editproperty'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delproperty' data-number='"+i+"'>Delete</a></li>\n" +
                    "                        </ul>\n" +
                    "                    </div>"
                $("#properties").append($(property_action_buttons));
                $("#propertyright").append("<tr><td>" + form['property_market_value'] + "</td><td>" + form['property_loan_outstanding']  + "</td><td>"+ (form['property_market_value']*1 - form['property_loan_outstanding']*1) + "</td></tr>");
                i++;
            })
            $("#propertyright").append("<tr class='bg-green'><td colspan=3>Total</td></tr><tr class=bg-green><td>" + property_market_value + "</td><td>" + property_loan_outstanding  + "</td><td>"+ (property_market_value - property_loan_outstanding)+ "</td></tr>");

        }


    </script>
@endpush
