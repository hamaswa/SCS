<fieldset id="incomekyc" class="hide">
    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header bg-yellow-light">
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf" title="CTOS Report Download">
                            <img src="{{ asset("img/save.jpeg") }}" />
                        </a>
                        <a class="bg-white padding-5 pull-left" href="javascript:void(0)"  onclick = "$('#incomeform').trigger('reset')"  title="Refresh"><img src="{{ asset("img/refresh.jpeg") }}" /></a>

                    </div>

                </div>
                <div class="form-group col-md-12 col-sm-12 bg-yellow-light">
                    <label class="control-label">Type</label>
                    <select id="incometype" class="form-control select2" name="incometype" style="width: 100%;">
                        <option value="salary"> Monthly Fixed</option>
                        <option value="business">Monthly Variable</option>
                        <option value="incometax">Annual Tax Declared</option>
                        <option value="iif">Industry Income Factor</option>
                        <option value="monthlyrental">Monthly Rental</option>
                        <option value="air">Annual Investment Return</option>
                    </select>
                </div>
            </div>
            <div class="box-body bg-yellow-light incometype " id="salary">
                <label class="col-lg-12 form-group clearfix">
                    Monthly Fixed
                </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="monthly_fixed_currency" id="monthly_fixed_currency" class="form-control">
                        <option value="myr" selected="selected">MYR</option>
                        <option value="usd">USD</option>
                        <option value="sgd">SGD</option>
                        <option value="euro">EURO</option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Exchage Rate</label>
                    <input name="monthly_fixed_exchance_rate" id="monthly_fixed_exchance_rate" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">BASIC</label>
                    <input type="text" name="monthly_fixed_basic" id="monthly_fixed_basic" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>

                    <label class="checkbox-inline">
                        <input type="checkbox"  value="epf" name="monthly_fixed_m_deductions[]"  id="monthly_fixed_m_deductions_epf" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="tax" name="monthly_fixed_m_deductions[]" id="monthly_fixed_m_deductions_tax" class="toggle" data-toggle="toggle"> TAX
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="monthlyfixedadded" value="false" name="monthlyfixedadded">
                        <button type="button" id="addmonthlyfixed" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light hide incometype " id="business">
                <label class="col-lg-12 form-group">
                    Monthly Variable
                </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="monthly_variable_currency"  id="monthly_variable_currency" class="form-control">
                        <option value="myr" selected="selected">MYR</option>
                        <option value="usd">USD</option>
                        <option value="sgd">SGD</option>
                        <option value="euro">EURO</option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Exchage Rate</label>
                    <input type="text" name="monthly_variable_exchange_rate" id="monthly_variable_exchange_rate" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month1</label>
                    <input type="text" name="month1_variable_basic" id="month1_variable_basic" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month2</label>
                    <input type="text"  name="month2_variable_basic"   id="month2_variable_basic"  class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month3</label>
                    <input type="text" name="month3_variable_basic" id="month3_variable_basic" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month4</label>
                    <input type="text" name="month4_variable_basic" id="month4_variable_basic" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month5</label>
                    <input type="text" name="month5_variable_basic"  id="month5_variable_basic" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month6</label>
                    <input type="text" name="month6_variable_basic" id="month6_variable_basic" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline">
                        <input value="epf" type="checkbox" name="monthly_variable_m_deductions[]"  id="monthly_variable_m_deductions_epf" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox" name="monthly_variable_m_deductions[]"  id="monthly_variable_m_deductions_tax" class="toggle" data-toggle="toggle"> TAX
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="monthlyvariableadded" name="monthlyvariableadded" value="false">
                        <button type="button" id="addmonthlyvariable" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light hide incometype " id="incometax">
                <label class="col-lg-12 form-group"> ANNUAL TAX DECLARED </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="annual_tax_declared_currency"  id="annual_tax_declared_currency" class="form-control">
                        <option value="myr" selected="selected">MYR</option>
                        <option value="usd">USD</option>
                        <option value="sgd">SGD</option>
                        <option value="euro">EURO</option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Exchage Rate</label>
                    <input type="text" name="annual_tax_declared_exchance_rate" id="annual_tax_declared_exchance_rate" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="text" name="annual_tax_declared_amount" id="annual_tax_declared_amount" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline">
                        <input value="epf" type="checkbox"  id="annual_tax_declared_m_deductions_epf" name="annual_tax_declared_m_deductions[]" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox"  id="annual_tax_declared_m_deductions_tax" name="annual_tax_declared_m_deductions[]" class="toggle" data-toggle="toggle"> TAX
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="annualtaxdeclaredadded" name="annualtaxdeclaredadded" value="false">
                        <button type="button" id="addannualtaxdeclared" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light hide incometype " id="iif">
                <label class="col-lg-12 form-group">
                   Industry Income Factor
                </label>


                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month1</label>
                    <input type="text" name="month1_iif" id="month1_iif" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month2</label>
                    <input type="text"  name="month2_iif"   id="month2_iif"  class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month3</label>
                    <input type="text" name="month3_iif" id="month3_iif" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month4</label>
                    <input type="text" name="month4_iif" id="month4_iif" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month4</label>
                    <input type="text" name="month5_iif"  id="month5_iif" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month6</label>
                    <input type="text" name="month6_iif" id="month6_iif" class="form-control" placeholder="">
                </div>

                <div class="clearfix"></div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Income Factor</label>
                    <input type="text" name="iif_income_factor" id="iif_income_factor" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Share Holding</label>
                        <input type="text"  name="iif_share_holding"   id="iif_share_holding"  class="form-control" placeholder="">
                    </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="iifadded" name="monthlyvariableadded" value="false">
                        <button type="button" id="addiif" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>

            <div class="box-body bg-yellow-light hide incometype " id="monthlyrental">
                <label class="col-lg-12 form-group"> Monthly Rental </label>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="text" name="monthly_rental_amount" id="monthly_rental_amount" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>

                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox"  id="monthly_rental_deductions_tax" name="annual_tax_declared_m_deductions[]" class="toggle" data-toggle="toggle"> TAX
                    </label>
                </div>


                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="monthly_rental_added" id="monthly_rental_added" value="false">
                        <button type="button" id="monthly_rental_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light hide incometype " id="air">
                <label class="col-lg-12 form-group"> Annual Investment Return </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="annual_investment_return_currency"  id="annual_investment_return_currency" class="form-control">
                        <option value="myr" selected="selected">MYR</option>
                        <option value="usd">USD</option>
                        <option value="sgd">SGD</option>
                        <option value="euro">EURO</option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Exchage Rate</label>
                    <input type="text" name="annual_investment_return_exchange_rate" id="annual_investment_return_exchange_rate" class="form-control" placeholder="">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="text" name="annual_investment_return_amount" id="annual_investment_return_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="annual_investment_return_added" id="annual_investment_return_added" value="false">
                        <button type="button" id="annual_investment_return_add" class="btn btn-primary">ADD</button>
                    </div>
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
                        <th colspan="3" class="text-center">Monthly Income</th>
                    </tr>
                    <tr class="bg-aqua">
                        <th>
                       Type</th>
                        <th>Gross</th>
                        <th>Net</th>

                    </tr>
                    </thead>
                    <tbody>


                        <tr id="salary_right_bar"></tr>

                        <tr id="business_right_bar"></tr>

                        <tr id="incometax_right_bar"></tr>

                        <tr id="iif_right_bar"></tr>

                        <tr id="monthly_rental_right_bar"></tr>

                        <tr id="annual_investment_return_right_bar"></tr>



                    </tbody>
                    <tfoot>
                    <tr  class="bg-aqua" id="income_kyc_total_right_bar"></tr>

                    </tfoot>
                </table>
            </div>

        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12 ">
        <ul class="pager">
            <li class="previous" id="backapplicantkyc"><a href="javascript:void(0);" class="bg-yellow-gradient"> &lt;&lt; Application KYC </a></li>
            <li class="next"><a href="javascript:void(0);" id="nextwealthkyc" class="bg-yellow-gradient">Wealth KYC &gt;&gt;</a></li>
        </ul>
        {{--<button type="button" id="backapplicantkyc" class="btn btn-primary pull-right">Previous</button>--}}
        {{--<button type="button" id="nextwealthkyc" class="btn btn-primary pull-right">Next</button>--}}
    </div>




</fieldset>
<input type=hidden class="kyctotalgross"  value="0" name=monthly_fixed_gross id=monthly_fixed_gross>
<input type=hidden class="kyctotalnet" value="0" name=monthly_fixed_net id=monthly_fixed_net>
<input type=hidden class="kyctotalgross" value="0" name=monthly_variable_gross id=monthly_variable_gross>
<input type=hidden class="kyctotalnet" value="0" name=monthly_variable_net id=monthly_variable_net>
<input type=hidden class="kyctotalgross" value="0" name=annual_tax_declared_gross id=annual_tax_declared_gross>
<input type=hidden class="kyctotalnet" value="0" name=annual_tax_declared_net id=annual_tax_declared_net>
<input type=hidden class="kyctotalgross" value="0" name=annual_investment_return_gross id=annual_investment_return_gross>
<input type=hidden class="kyctotalnet" value="0" name=annual_investment_return_net id=annual_investment_return_net>
<input type=hidden class="kyctotalgross" value="0" name=monthly_rental_gross id=monthly_rental_gross>
<input type=hidden class="kyctotalnet" value="0" name=monthly_rental_net id=monthly_rental_net>
<input type=hidden class="kyctotalgross" value="0" name=iif_gross id=iif_gross>
<input type=hidden class="kyctotalnet" value="0" name=iif_net id=iif_net>
<input type=hidden class="kyctotalnet" value="0" name=gross id=gross>
<input type=hidden class="kyctotalnet" value="0" name=net id=net>
@push("scripts")
    <script type="text/javascript">

        $("#backapplicantkyc").click(function (e) {
            $("#incomekyc").addClass("hide");
            $("#applicantkyc").removeClass("hide");
        })
        $("#nextwealthkyc").click(function (e) {
            $("#incomekyc").addClass("hide");
            $("#wealthkyc").removeClass("hide");
        });
        $("#addmonthlyfixed").click(function (e) {
            currency = $("#monthly_fixed_currency").val();
            basic = $("#monthly_fixed_basic").val();
            exchange_rate = $("#monthly_fixed_exchance_rate").val();
            epf = 10;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 10;//$("#monthly_fixed_m_deductions_tax").val();
            gross = basic * exchange_rate;
            tax_ded=0;
            epf_ded=0;
            if($("#monthly_fixed_m_deductions_tax").prop("checked")==true) {
                tax_ded = gross * tax / 100;
            }
            if($("#monthly_fixed_m_deductions_epf").prop("checked")==true) {
                epf_ded = gross * epf / 100;
            }
            net = gross - tax_ded - epf_ded;
            $("#monthlyfixedadded").val("true");
            $("#salary_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            // $("#salary_right_bar").text(gross+" / "+net);
            $("#monthly_fixed_gross").val(gross);
            $("#monthly_fixed_net").val(net);
            totalincomekyc()
        });
        $("#addmonthlyvariable").click(function (e) {
            currency = $("#monthly_variable_currency").val();
            month1 = $("#month1_variable_basic").val();
            month2 = $("#month2_variable_basic").val();
            month3 = $("#month3_variable_basic").val();
            month4 = $("#month4_variable_basic").val();
            month5 = $("#month5_variable_basic").val();
            month6 = $("#month6_variable_basic").val();
            basic = ((month1*1) + (month2*1)+ (month3*1)+ (month4*1)+ (month5*1)+ (month6*1))/6;
            exchange_rate = $("#monthly_variable_exchange_rate").val();
            console.log(basic);
            epf = 10;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 10;//$("#monthly_fixed_m_deductions_tax").val();
            gross = basic * exchange_rate;
            tax_ded=0;
            epf_ded=0;
            if($("#monthly_variable_m_deductions_tax").prop("checked")==true) {
                tax_ded = gross * tax / 100;
            }
            if($("#monthly_variable_m_deductions_epf").prop("checked")==true) {
                epf_ded = gross * epf / 100;
            }
            net = gross - tax_ded - epf_ded;
            $("#monthlyvariableadded").val("true");
            $("#business_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            // $("#business_right_bar").text(gross+" / "+net);
            $("#monthly_variable_gross").val(gross)
            $("#monthly_variable_net").val(net)
            totalincomekyc()
        });
        $("#addannualtaxdeclared").click(function (e) {
            currency = $("#annual_tax_declared_currency").val();
            basic = $("#annual_tax_declared_amount").val();
            exchange_rate = $("#annual_tax_declared_exchance_rate").val();
            epf = 10;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 10;//$("#monthly_fixed_m_deductions_tax").val();
            gross = basic * exchange_rate;
            tax_ded=0;
            epf_ded=0;
            if($("#annual_tax_declared_m_deductions_tax").prop("checked")==true) {
                tax_ded = gross * tax / 100;
            }
            if($("#annual_tax_declared_m_deductions_epf").prop("checked")==true) {
                epf_ded = gross * epf / 100;
            }
            net = gross - tax_ded - epf_ded;
            $("#annualtaxdeclaredadded").val("true");
             $("#incometax_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            // $("#incometax_right_bar").text(gross+" / "+net);
            $("#annual_tax_declared_gross").val(gross)
            $("#annual_tax_declared_net").val(net)
            totalincomekyc()
        });
        $("#monthly_rental_add").click(function (e) {
            basic = $("#monthly_rental_amount").val();
            tax = 10;//$("#monthly_fixed_m_deductions_tax").val();
            gross = basic * exchange_rate;
            tax_ded=0;
            if($("#monthly_rental_deductions_tax").prop("checked")==true) {
                tax_ded = gross * tax / 100;
            }
            net = gross - tax_ded
            $("#monthly_rental_added").val("true");
             $("#monthly_rental_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            // $("#monthly_rental_right_bar").text(gross+" / "+net);
            $("#monthly_rental_gross").val(gross)
            $("#monthly_rental_net").val(net)
            totalincomekyc()
        });
        $("#annual_investment_return_add").click(function(){
            currency = $("#annual_investment_return_currency").val();
            basic = $("#annual_investment_return_amount").val();
            exchange_rate = $("#annual_investment_return_exchange_rate").val();
            gross = basic * exchange_rate;
            net = gross;
            $("#annual_investment_return_added").val("true");
             $("#annual_investment_return_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            //$("#annual_investment_return_right_bar").text(gross+" / "+net);
            $("#annual_investment_return_gross").val(gross)
            $("#annual_investment_return_net").val(net)
            totalincomekyc()
        });
        $("#addiif").click(function(){
            month1 = $("#month1_iif").val();
            month2 = $("#month2_iif").val();
            month3 = $("#month3_iif").val();
            month4 = $("#month4_iif").val();
            month5 = $("#month5_iif").val();
            month6 = $("#month6_iif").val();
            basic = ((month1*1) + (month2*1)+ (month3*1)+ (month4*1)+ (month5*1)+ (month6*1))/6;
            gross = basic;
            net = gross
            $("#iifadded").val("true");
             $("#iif_right_bar").html("<td>" + $("#incometype :selected").text() + "</td><td>"+gross+"</td><td>"+net+"</td>");
            // $("#iif_right_bar").text(gross+" / "+net);
            $("#iif_gross").val(gross)
            $("#iif_net").val(net)
            totalincomekyc()
        })
        function totalincomekyc(){
            gross1 = $("#monthly_fixed_gross").val();
            gross2 = $("#monthly_variable_gross").val();
            gross3 = $("#iif_gross").val();
            gross4 = $("#annual_tax_declared_gross").val();
            gross5 = $("#annual_investment_return_gross").val();
            gross6 = $("#monthly_rental_gross").val();
            grosstotal = (gross1*1) + (gross2*1)+ (gross3*1)+ (gross4*1)+ (gross5*1)+ (gross6*1);

            net1 = $("#monthly_fixed_net").val();
            net2 = $("#monthly_variable_net").val();
            net3 = $("#iif_net").val();
            net4 = $("#annual_tax_declared_net").val();
            net5 = $("#annual_investment_return_net").val();
            net6 = $("#monthly_rental_net").val();
            nettotal = (net1*1) + (net2*1)+ (net3*1)+ (net4*1)+ (net5*1)+ (net6*1);
             $("#income_kyc_total_right_bar").html("<td>Total</td><td>"+grosstotal+"</td><td>"+nettotal+"</td>");
            //$("#income_kyc_total_right_bar").text(grosstotal + "/"+ nettotal);
            $("#gross").val(grosstotal);
            $("#net").val(nettotal);
        }

    </script>
@endpush