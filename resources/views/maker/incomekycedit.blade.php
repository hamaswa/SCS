<fieldset id="incomekyc" class=" tab-action-main">
    {{--<div class="col-md-2 col-sm-3">--}}
    {{--<a href="javascript:void(0);" data-id="applicantkyc" id="backapplicantkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1">APPLICATION <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="incomekyc" id="nextincomekyc" class="bg-gray-light padding-5 pull-left vericaltext tab-action border-black-1"><br>INCOME <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="wealthkyc" id="nextwealthkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br>WEALTH <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="propertykyc" id="nextpropertykyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br><br>PROPERTY <br> KYC</a>--}}
    {{--</div>--}}
    <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header bg-gray-light">
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>
                    <?php
                    if(isset($income))
                    $data = json_decode($income->form_data, true);

                    ?>
                </div>

                <div id="" class="col-lg-12 col-md-12 col-sm-12">
                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['monthly_fixed_gross']) and $data['monthly_fixed_gross']!=0)?"":"hide") }} "
                         id="btn-salary">
                        <button type="button" class="btn btn-default btn-flat view" data-value="salary">Monthly Fixed
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="salary" class="editincome">Edit</a></li>
                            <li><a href="#" class="delincome" data-action="addmonthlyfixed"
                                   data-right="salary_right_bar" data-value="salary">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['monthly_variable_gross']) and $data['monthly_variable_gross']!=0)?"":"hide") }}"
                         id="btn-business">
                        <button type="button" class="btn btn-default btn-flat view" data-value="business">Monthly
                            Variable
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="business" class="editincome">Edit</a></li>
                            <li><a href="#" data-value="business" data-action="addmonthlyvariable"
                                   data-right="business_right_bar" class="delincome">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['annual_tax_declared_gross']) and $data['annual_tax_declared_gross']!=0)?"":"hide") }}"
                         id="btn-incometax">
                        <button type="button" class="btn btn-default btn-flat view" data-value="incometax">Annual Tax
                            Declared
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="incometax" class="editincome">Edit</a></li>
                            <li><a href="#" data-value="incometax" data-action="addannualtaxdeclared"
                                   data-right="incometax_right_bar" class="delincome">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['iif_gross']) and $data['iif_gross']!=0)?"":"hide") }}"
                         id="btn-iif">
                        <button type="button" class="btn btn-default btn-flat view" data-value="iif">Industry Income
                            Factor
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="iif" class="editincome">Edit</a></li>
                            <li><a href="#" data-value="iif" data-action="addiif" data-right="iif_right_bar"
                                   class="delincome">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['monthly_rental_gross']) and $data['monthly_rental_gross']!=0)?"":"hide") }}"
                         id="btn-monthlyrental">
                        <button type="button" class="btn btn-default btn-flat view" data-value="monthlyrental">Monthly
                            Rental
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="monthlyrental" class="editincome">Edit</a></li>
                            <li><a href="#" data-value="monthlyrental" data-action="monthly_rental_add"
                                   data-right="monthly_rental_right_bar" class="delincome">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn {{ ((isset($data['annual_investment_return_gross']) and $data['annual_investment_return_gross']!=0)?"":"hide") }}"
                         id="btn-air">
                        <button type="button" class="btn btn-default btn-flat view" data-value="air">Annual Investment
                            Return
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-value="air" class="editincome">Edit</a></li>
                            <li><a href="#" data-value="air" data-action="annual_investment_return_add"
                                   data-right="annual_investment_return_right_bar" class="delincome">Delete</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-12 col-sm-12 bg-gray-light" id="income_doc_form">
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
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

                    <div class="form-group col-md-4 col-sm-4 bg-gray-light primary_docs">
                        <label class="control-label">Primary Docs</label>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'default'=>"Select Primary Document",
                        'type'=>'salary_p',
                        'options'=>$options])

                    </div>


                    <div class="form-group col-md-4 col-sm-4 bg-gray-light support_docs">
                        <label class="control-label">Supporting Docs</label>
                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'default'=>"Select Supporting Document",
                        'type'=>'salary_s',
                        'options'=>$options])
                    </div>
                    <div class="form-group col-md-4 col-sm-3 pull-right">
                        <input type="file" class="form-control btn btn-primary" multiple name="income_doc[]" id="income_doc" />
                    </div>
                </div>




                </div>
            <div class="box-body bg-gray-light incometype" id="salary">
                <label class="col-lg-12 form-group clearfix">
                    Monthly Fixed
                </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="monthly_fixed_currency" id="monthly_fixed_currency"
                            data-target="#monthly_fixed_exchance_rate" class="form-control currency">
                        <option value="myr" {{ ((isset($data['monthly_fixed_currency']) and $data['monthly_fixed_currency']=='myr')?' selected=selected':"") }}>
                            MYR
                        </option>
                        <option value="usd" {{ ((isset($data['monthly_fixed_currency']) and $data['monthly_fixed_currency']=='usd')?' selected=selected':"") }}>
                            USD
                        </option>
                        <option value="sgd" {{ ((isset($data['monthly_fixed_currency']) and $data['monthly_fixed_currency']=='sgd')?' selected=selected':"") }}>
                            SGD
                        </option>
                        <option value="euro" {{ ((isset($data['monthly_fixed_currency']) and $data['monthly_fixed_currency']=='euro')?' selected=selected':"") }}>
                            EURO
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 hide">
                    <label class="control-label">Exchage Rate</label>
                    <input name="monthly_fixed_exchance_rate" id="monthly_fixed_exchance_rate" type="number"
                           value="{{ (isset($data['monthly_fixed_exchance_rate'])?$data['monthly_fixed_exchance_rate']:1) }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">BASIC</label>
                    <input type="number"
                           value="{{ (isset($data['monthly_fixed_basic'])?$data['monthly_fixed_basic']:"") }}"
                           name="monthly_fixed_basic" id="monthly_fixed_basic" class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>

                    <label class="checkbox-inline">
                        <input type="checkbox" value="epf" name="monthly_fixed_m_deductions[]"
                               {{(isset($data['monthly_fixed_m_deductions'][0]) and $data['monthly_fixed_m_deductions'][0]=='epf')? 'checked="checked"':"" }}
                               id="monthly_fixed_m_deductions_epf" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" value="tax" name="monthly_fixed_m_deductions[]"
                               {{((isset($data['monthly_fixed_m_deductions'][0])  and $data['monthly_fixed_m_deductions'][0]=='tax')
                               or (isset($data['monthly_fixed_m_deductions'][1]) and $data['monthly_fixed_m_deductions'][1]=='tax'))? "checked='checked'":"" }}
                               id="monthly_fixed_m_deductions_tax" class="toggle" data-toggle="toggle"> TAX
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="monthlyfixedadded" name="monthlyfixedadded"
                               value="{{ isset($data['monthlyfixedadded'])?$data['monthlyfixedadded']:"false" }}">
                        <button type="button" id="addmonthlyfixed" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light hide incometype " id="business">
                <label class="col-lg-12 form-group">
                    Monthly Variable
                </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="monthly_variable_currency" id="monthly_variable_currency"
                            class="form-control currency" data-target="#monthly_variable_exchange_rate">
                        <option value="myr" {{ ((isset($data['monthly_variable_currency']) and $data['monthly_variable_currency']=='myr')?' selected=selected':"") }}>
                            MYR
                        </option>
                        <option value="usd" {{ ((isset($data['monthly_variable_currency']) and $data['monthly_variable_currency']=='usd')?' selected=selected':"") }}>
                            USD
                        </option>
                        <option value="sgd" {{ ((isset($data['monthly_variable_currency']) and $data['monthly_variable_currency']=='sgd')?' selected=selected':"") }}>
                            SGD
                        </option>
                        <option value="euro" {{ ((isset($data['monthly_variable_currency']) and $data['monthly_variable_currency']=='euro')?' selected=selected':"") }}>
                            EURO
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 hide">
                    <label class="control-label">Exchage Rate</label>
                    <input type="number" name="monthly_variable_exchange_rate" id="monthly_variable_exchange_rate"
                           class="form-control"
                           value="{{ isset($data['monthly_variable_exchange_rate'])?$data['monthly_variable_exchange_rate']:1 }}" >
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month1</label>
                    <input type="number" name="month1_variable_basic" id="month1_variable_basic" class="form-control"
                           value="{{ isset($data['month1_variable_basic'])?$data['month1_variable_basic']:"" }}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month2</label>
                    <input type="number" name="month2_variable_basic" id="month2_variable_basic" class="form-control"
                           value="{{ isset($data['month2_variable_basic'])?$data['month2_variable_basic']:"" }}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month3</label>
                    <input type="number" name="month3_variable_basic" id="month3_variable_basic" class="form-control"
                           value="{{ isset($data['month3_variable_basic'])?$data['month3_variable_basic']:"" }}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month4</label>
                    <input type="number" name="month4_variable_basic" id="month4_variable_basic" class="form-control"
                           value="{{ isset($data['month4_variable_basic'])?$data['month4_variable_basic']:"" }}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month5</label>
                    <input type="number" name="month5_variable_basic" id="month5_variable_basic" class="form-control"
                           value="{{ isset($data['month5_variable_basic'])?$data['month5_variable_basic']:"" }}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month6</label>
                    <input type="number" name="month6_variable_basic" id="month6_variable_basic" class="form-control"
                           value="{{ isset($data['month6_variable_basic'])?$data['month6_variable_basic']:"" }}">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline">
                        <input value="epf" type="checkbox" name="monthly_variable_m_deductions[]"
                               {{(isset($data['monthly_variable_m_deductions']) and $data['monthly_variable_m_deductions'][0]=='epf')? 'checked="checked"':"" }}
                               id="monthly_variable_m_deductions_epf" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox" name="monthly_variable_m_deductions[]"
                               {{(isset($data['monthly_variable_m_deductions'])  and $data['monthly_variable_m_deductions'][0]=='tax')
                               or (isset($data['monthly_variable_m_deductions'][1]) and $data['monthly_variable_m_deductions'][1]=='tax')? "checked='checked'":"" }}
                               id="monthly_variable_m_deductions_tax" class="toggle" data-toggle="toggle"> TAX
                    </label>

                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="monthlyvariableadded" name="monthlyvariableadded"
                               value="{{ (isset($data['monthlyvariableadded']) and $data['monthlyvariableadded']!="")?$data['monthlyvariableadded']:"" }}">
                        <button type="button" id="addmonthlyvariable" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light hide incometype " id="incometax">
                <label class="col-lg-12 form-group"> ANNUAL TAX DECLARED </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="annual_tax_declared_currency" id="annual_tax_declared_currency"
                            class="form-control currency" data-target="#annual_tax_declared_exchange_rate">
                        <option value="myr" {{ ((isset($data['annual_tax_declared_currency']) and $data['annual_tax_declared_currency']=='myr')?' selected=selected':"") }}>
                            MYR
                        </option>
                        <option value="usd" {{ ((isset($data['annual_tax_declared_currency']) and $data['annual_tax_declared_currency']=='usd')?' selected=selected':"") }}>
                            USD
                        </option>
                        <option value="sgd" {{ ((isset($data['annual_tax_declared_currency']) and $data['annual_tax_declared_currency']=='sgd')?' selected=selected':"") }}>
                            SGD
                        </option>
                        <option value="euro" {{ ((isset($data['annual_tax_declared_currency']) and $data['annual_tax_declared_currency']=='euro')?' selected=selected':"") }}>
                            EURO
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 hide">
                    <label class="control-label">Exchage Rate</label>
                    <input type="number" name="annual_tax_declared_exchance_rate" id="annual_tax_declared_exchance_rate"
                           value="{{ (isset($data['annual_tax_declared_exchance_rate']) and $data['annual_tax_declared_exchance_rate']!="")?$data['annual_tax_declared_exchance_rate']:"1" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="number" name="annual_tax_declared_amount" id="annual_tax_declared_amount"
                           value="{{ (isset($data['annual_tax_declared_amount']) and $data['annual_tax_declared_amount']!="")?$data['annual_tax_declared_amount']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>
                    <label class="checkbox-inline">
                        <input value="epf" type="checkbox" id="annual_tax_declared_m_deductions_epf"
                               {{(isset($data['annual_tax_declared_m_deductions'][0]) and $data['annual_tax_declared_m_deductions'][0]=='epf')? 'checked="checked"':"" }}
                               name="annual_tax_declared_m_deductions[]" class="toggle" data-toggle="toggle"> EPF
                    </label>
                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox" id="annual_tax_declared_m_deductions_tax"
                               {{(isset($data['annual_tax_declared_m_deductions'][0])  and $data['annual_tax_declared_m_deductions'][0]=='tax')
                               or (isset($data['annual_tax_declared_m_deductions'][1]) and $data['annual_tax_declared_m_deductions'][1]=='tax')? "checked='checked'":"" }}
                               name="annual_tax_declared_m_deductions[]" class="toggle" data-toggle="toggle"> TAX
                    </label>


                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="annualtaxdeclaredadded" name="annualtaxdeclaredadded"
                               value="{{ (isset($data['annualtaxdeclaredadded']) and $data['annualtaxdeclaredadded']!="")?$data['annualtaxdeclaredadded']:"false" }}">
                        <button type="button" id="addannualtaxdeclared" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light hide incometype " id="iif">
                <label class="col-lg-12 form-group">
                    Industry Income Factor
                </label>


                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month1</label>
                    <input type="number" name="month1_iif" id="month1_iif"
                           value="{{ (isset($data['month1_iif']) and $data['month1_iif']!="")?$data['month1_iif']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month2</label>
                    <input type="number" name="month2_iif" id="month2_iif"
                           value="{{ (isset($data['month2_iif']) and $data['month2_iif']!="")?$data['month2_iif']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month3</label>
                    <input type="number" name="month3_iif" id="month3_iif"
                           value="{{ (isset($data['month3_iif']) and $data['month3_iif']!="")?$data['month3_iif']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month4</label>
                    <input type="number" name="month4_iif" id="month4_iif"
                           value="{{ (isset($data['month4_iif']) and $data['month4_iif']!="")?$data['month4_iif']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month5</label>
                    <input type="number" name="month5_iif" id="month5_iif"
                           value="{{ (isset($data['month5_iif']) and $data['month5_iif']!="")?$data['month5_iif']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Month6</label>
                    <input type="number" name="month6_iif" id="month6_iif"
                           value="{{ (isset($data['month6_iif']) and $data['month6_iif']!="")?$data['month6_iif']:"" }}"
                           class="form-control">
                </div>

                <div class="clearfix"></div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Income Factor</label>
                    <input type="number" name="iif_income_factor" id="iif_income_factor"
                           value="{{ (isset($data['iif_income_factor']) and $data['iif_income_factor']!="")?$data['iif_income_factor']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Share Holding</label>
                    <input type="number" name="iif_share_holding" id="iif_share_holding"
                           value="{{ (isset($data['iif_income_factor']) and $data['iif_income_factor']!="")?$data['iif_income_factor']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="iifadded" name="monthlyvariableadded"
                               value="{{ (isset($data['monthlyvariableadded']) and $data['monthlyvariableadded']!="")?$data['monthlyvariableadded']:"false" }}">
                        <button type="button" id="addiif" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>

            <div class="box-body bg-gray-light hide incometype " id="monthlyrental">
                <label class="col-lg-12 form-group"> Monthly Rental </label>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="number" name="monthly_rental_amount" id="monthly_rental_amount"
                           value="{{ (isset($data['monthly_rental_amount']) and $data['monthly_rental_amount']!="")?$data['monthly_rental_amount']:"" }}"
                           class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Mandatory Deductions</label>
                    <div class="clearfix"></div>

                    <label class="checkbox-inline">
                        <input value="tax" type="checkbox"  id="monthly_rental_deductions_tax" name="monthly_rental_m_deductions[]"
                               {{(isset($data['monthly_rental_m_deductions'][0])  and $data['monthly_rental_m_deductions'][0]=='tax')
                              or (isset($data['monthly_rental_m_deductions'][1]) and $data['monthly_rental_m_deductions'][1]=='tax')? "checked='checked'":"" }}
                               class="toggle" data-toggle="toggle"> TAX
                    </label>

                </div>


                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="monthly_rental_added" id="monthly_rental_added"
                               value="{{ (isset($data['monthly_rental_added']) and $data['monthly_rental_added']!="")?$data['monthly_rental_added']:"false" }}">
                        <button type="button" id="monthly_rental_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light hide incometype " id="air">
                <label class="col-lg-12 form-group"> Annual Investment Return </label>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">CURRENCY</label>
                    <select name="annual_investment_return_currency" id="annual_investment_return_currency"
                            class="form-control currency" data-target="#annual_investment_return_exchange_rate">
                        <option value="myr" {{ ((isset($data['annual_investment_return_currency']) and $data['annual_investment_return_currency']=='myr')?' selected=selected':"") }}>
                            MYR
                        </option>
                        <option value="usd" {{ ((isset($data['annual_investment_return_currency']) and $data['annual_investment_return_currency']=='usd')?' selected=selected':"") }}>
                            USD
                        </option>
                        <option value="sgd" {{ ((isset($data['annual_investment_return_currency']) and $data['annual_investment_return_currency']=='sgd')?' selected=selected':"") }}>
                            SGD
                        </option>
                        <option value="euro" {{ ((isset($data['annual_investment_return_currency']) and $data['annual_investment_return_currency']=='euro')?' selected=selected':"") }}>
                            EURO
                        </option>

                    </select>
                </div>
                <div class="form-group col-md-12 col-sm-12 hide">
                    <label class="control-label">Exchage Rate</label>
                    <input type="number" name="annual_investment_return_exchange_rate"
                           value="{{ (isset($data['annual_investment_return_exchange_rate']) and $data['annual_investment_return_exchange_rate']!="")?$data['annual_investment_return_exchange_rate']:"1" }}"
                           id="annual_investment_return_exchange_rate" class="form-control">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">Amount</label>
                    <input type="number" name="annual_investment_return_amount"
                           value="{{ (isset($data['annual_investment_return_amount']) and $data['annual_investment_return_amount']!="")?$data['annual_investment_return_amount']:"" }}"
                           id="annual_investment_return_amount"  class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="annual_investment_return_added" id="annual_investment_return_added"
                               value="{{ (isset($data['annual_investment_return_added']) and $data['annual_investment_return_added']!="")?$data['annual_investment_return_added']:"false" }}">
                        <button type="button" id="annual_investment_return_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="box">
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive">
                    <?php
                    if(isset($income))
                    $income->form_data = json_decode($income->form_data);
                    ?>

                  @include("aadata.right_info_income")


                </div>
            </div>

        </div>
    </div>

    {{--<div class="form-group col-md-12 col-sm-12 ">--}}
    {{--<ul class="pager">--}}
    {{--<li class="previous" id="backapplicantkyc"><a href="javascript:void(0);" class="bg-yellow-gradient"> &lt;&lt; Application KYC </a></li>--}}
    {{--<li class="next"><a href="javascript:void(0);" id="nextwealthkyc" class="bg-yellow-gradient">Wealth KYC &gt;&gt;</a></li>--}}
    {{--</ul>--}}
    {{--<button type="button" id="backapplicantkyc" class="btn btn-primary pull-right">Previous</button>--}}
    {{--<button type="button" id="nextwealthkyc" class="btn btn-primary pull-right">Next</button>--}}
    {{--</div>--}}


</fieldset>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['monthly_fixed_gross']) and $data['monthly_fixed_gross']!=0)?$data['monthly_fixed_gross']:0 }}" name=monthly_fixed_gross id=monthly_fixed_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['monthly_fixed_net']) and $data['monthly_fixed_net']!=0)?$data['monthly_fixed_net']:0 }}" name=monthly_fixed_net id=monthly_fixed_net>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['monthly_variable_gross']) and $data['monthly_variable_gross']!=0)?$data['monthly_variable_gross']:0 }}" name=monthly_variable_gross id=monthly_variable_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['monthly_variable_net']) and $data['monthly_variable_net']!=0)?$data['monthly_variable_net']:0 }}" name=monthly_variable_net id=monthly_variable_net>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['annual_tax_declared_gross']) and $data['annual_tax_declared_gross']!=0)?$data['annual_tax_declared_gross']:0 }}" name=annual_tax_declared_gross id=annual_tax_declared_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['annual_tax_declared_net']) and $data['annual_tax_declared_net']!=0)?$data['annual_tax_declared_net']:0 }}" name=annual_tax_declared_net id=annual_tax_declared_net>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['annual_investment_return_gross']) and $data['annual_investment_return_gross']!=0)?$data['annual_investment_return_gross']:0 }}" name=annual_investment_return_gross
       id=annual_investment_return_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['annual_investment_return_net']) and $data['annual_investment_return_net']!=0)?$data['annual_investment_return_net']:0 }}" name=annual_investment_return_net id=annual_investment_return_net>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['monthly_rental_gross']) and $data['monthly_rental_gross']!=0)?$data['monthly_rental_gross']:0 }}" name=monthly_rental_gross id=monthly_rental_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['monthly_rental_net']) and $data['monthly_rental_net']!=0)?$data['monthly_rental_net']:0 }}" name=monthly_rental_net id=monthly_rental_net>
<input type=hidden class="kyctotalgross" value="{{ (isset($data['iif_gross']) and $data['iif_gross']!=0)?$data['iif_gross']:0 }}" name=iif_gross id=iif_gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['iif_net']) and $data['iif_net']!=0)?$data['iif_net']:0 }}" name=iif_net id=iif_net>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['gross']) and $data['gross']!=0)?$data['gross']:0 }}" name=gross id=gross>
<input type=hidden class="kyctotalnet" value="{{ (isset($data['net']) and $data['net']!=0)?$data['net']:0 }}" name=net id=net>
@push("scripts")
    <script type="text/javascript">

            $('#income_doc[type="file"]').change(function(e) {

                var fileName = e.target.files[0].name;
                form = document.createElement("form");
                form.setAttribute("method", "post");

                form.setAttribute("target", "_blank");
                form.setAttribute("enctype", "multipart/form-data")
                form.setAttribute("action", "{{ route("documents.store") }}");
                csrf = $('{{ csrf_field() }}')
                $(form).append(csrf);
                $(form).append($("#income_doc_form").clone(true));
                $(form).append($("#applicant_id").clone(true));
                div = $("<div style=\"display=hidden\"></div>")
                $(div).append(form)
                document.body.appendChild(form);
                form.submit();
                $("#income_doc_form").find("option:selected").prop("selected", false)

            });

        $(".currency").on("change", function (e) {
            if ($(this).val() == "myr")
                $($(this).data("target")).val(1)
                    .parent("div").addClass("hide");
            else
                $($(this).data("target")).val("")
                    .parent("div").removeClass("hide");

        })


        $("#backapplicantkyc").click(function (e) {
            $("#incomekyc").addClass("hide");
            $("#applicantkyc").removeClass("hide");
        })
        $("#nextwealthkyc").click(function (e) {
            $("#incomekyc").addClass("hide");
            $("#wealthkyc").removeClass("hide");
        });

        $("#incometype").change(function (e) {
            $("#incomekyc .box .incometype").addClass("hide");
            type = $(this).val();
            $("#incomekyc").find("#" + type).removeClass("hide").show();
            getDocs(type+"_p","primary_docs","primary_docs",".primary_docs","Primary Docs")
            getDocs(type+"_s","support_docs","support_docs",".support_docs","Supporting Docs")

            function getDocs(type,name,id,target,label){
                $.ajax({
                    url:"{{ route("selectoptions") }}",
                    type:"POST",
                    data:"type="+type+"&name="+name+"&id="+id+"&label="+label,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    if(response=="")
                        alert("No Document types found");
                    else
                        $(target).html("").append(response);
                });
            }
        })

        $(".incomekyc-action-btn button.view").on("click", function (e) {
            $("#incometype").val($(this).data("value")).trigger("change");
        })

        $("#addmonthlyfixed").on('click', function (e) {
            $("#btn-salary").removeClass("hide");

            currency = $("#monthly_fixed_currency").val();
            basic = $("#monthly_fixed_basic").val();
            exchange_rate = $("#monthly_fixed_exchance_rate").val();
            epf = 11;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 20;//$("#monthly_fixed_m_deductions_tax").val();
            gross = Math.round(basic * exchange_rate);
            tax_ded = 0;
            epf_ded = 0;
            if ($("#monthly_fixed_m_deductions_tax").prop("checked") == true) {
                tax_ded = gross * tax / 100;
            }
            if ($("#monthly_fixed_m_deductions_epf").prop("checked") == true) {
                epf_ded = gross * epf / 100;
            }
            net = Math.round(gross - tax_ded - epf_ded);

            $("#monthlyfixedadded").val("true");
            $(".salary_right_bar").html("<td>Monthly Fixed</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            // $("#salary_right_bar").text(gross+" / "+net);
            $("#monthly_fixed_gross").val(gross);
            $("#monthly_fixed_net").val(net);
            totalincomekyc()
        });
        $("#addmonthlyvariable").on('click', function (e) {
            $("#btn-business").removeClass("hide");

            currency = $("#monthly_variable_currency").val();
            month1 = $("#month1_variable_basic").val();
            month2 = $("#month2_variable_basic").val();
            month3 = $("#month3_variable_basic").val();
            month4 = $("#month4_variable_basic").val();
            month5 = $("#month5_variable_basic").val();
            month6 = $("#month6_variable_basic").val();

            basic = Math.round(((month1 * 1) + (month2 * 1) + (month3 * 1) + (month4 * 1) + (month5 * 1) + (month6 * 1)) / 6);
            exchange_rate = $("#monthly_variable_exchange_rate").val();

            epf = 11;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 20;//$("#monthly_fixed_m_deductions_tax").val();
            gross = Math.round(basic * exchange_rate);
            tax_ded = 0;
            epf_ded = 0;
            if ($("#monthly_variable_m_deductions_tax").prop("checked") == true) {
                tax_ded = gross * tax / 100;
            }
            if ($("#monthly_variable_m_deductions_epf").prop("checked") == true) {
                epf_ded = gross * epf / 100;
            }
            net = Math.round(gross - tax_ded - epf_ded);
            $("#monthlyvariableadded").val("true");
            $(".business_right_bar").html("<td>Monthly Variable</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            // $("#business_right_bar").text(gross+" / "+net);
            $("#monthly_variable_gross").val(gross)
            $("#monthly_variable_net").val(net)
            totalincomekyc()
        });
        $("#addannualtaxdeclared").on('click', function (e) {
            $("#btn-incometax").removeClass("hide");

            currency = $("#annual_tax_declared_currency").val();
            basic = $("#annual_tax_declared_amount").val();
            exchange_rate = $("#annual_tax_declared_exchance_rate").val();
            epf = 11;// $("#monthly_fixed_m_deductions_epf").val();
            tax = 20;//$("#monthly_fixed_m_deductions_tax").val();
            gross = Math.round((basic * exchange_rate) / 12);
            tax_ded = 0;
            epf_ded = 0;
            if ($("#annual_tax_declared_m_deductions_tax").prop("checked") == true) {
                tax_ded = gross * tax / 100;
            }
            if ($("#annual_tax_declared_m_deductions_epf").prop("checked") == true) {
                epf_ded = gross * epf / 100;
            }
            net = Math.round(gross - tax_ded - epf_ded);
            $("#annualtaxdeclaredadded").val("true");
            $(".incometax_right_bar").html("<td>Annual Tax Declared</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            // $("#incometax_right_bar").text(gross+" / "+net);
            $("#annual_tax_declared_gross").val(gross)
            $("#annual_tax_declared_net").val(net)
            totalincomekyc()
        });
        $("#monthly_rental_add").on('click', function (e) {
            $("#btn-monthlyrental").removeClass("hide");

            basic = $("#monthly_rental_amount").val();
            tax = 20;//$("#monthly_fixed_m_deductions_tax").val();
            gross = Math.round(basic);
            tax_ded = 0;
            if ($("#monthly_rental_deductions_tax").prop("checked") == true) {
                tax_ded = gross * tax / 100;
            }
            net = Math.round(gross - tax_ded);
            $("#monthly_rental_added").val("true");
            $(".monthly_rental_right_bar").html("<td>Monthly Rental</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            // $("#monthly_rental_right_bar").text(gross+" / "+net);
            $("#monthly_rental_gross").val(gross)
            $("#monthly_rental_net").val(net)
            totalincomekyc()
        });
        $("#annual_investment_return_add").on('click', function () {
            $("#btn-air").removeClass("hide");

            currency = $("#annual_investment_return_currency").val();
            basic = $("#annual_investment_return_amount").val();
            exchange_rate = $("#annual_investment_return_exchange_rate").val();
            gross = Math.round((basic * exchange_rate) / 12);
            net = gross;
            $("#annual_investment_return_added").val("true");
            $(".annual_investment_return_right_bar").html("<td>Annual Investment Return</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            //$("#annual_investment_return_right_bar").text(gross+" / "+net);
            $("#annual_investment_return_gross").val(gross)
            $("#annual_investment_return_net").val(net)
            totalincomekyc()
        });
        $("#addiif").on('click', function () {
            $("#btn-iif").removeClass("hide");

            month1 = $("#month1_iif").val();
            month2 = $("#month2_iif").val();
            month3 = $("#month3_iif").val();
            month4 = $("#month4_iif").val();
            month5 = $("#month5_iif").val();
            month6 = $("#month6_iif").val();
            basic = Math.round(((month1 * 1) + (month2 * 1) + (month3 * 1) + (month4 * 1) + (month5 * 1) + (month6 * 1)) / 6);
            incomefactor = $("#iif_income_factor").val();
            shareholding = $("#iif_share_holding").val();
            if (!(isNaN(incomefactor)) && incomefactor != "")
                basic = basic * incomefactor / 100;
            if (!(isNaN(shareholding)) && shareholding != "")
                basic = basic * shareholding / 100;
            gross = basic;
            net = gross
            $("#iifadded").val("true");
            $(".iif_right_bar").html("<td>Industry Income Factor</td><td>" + Math.round(gross) + "</td><td>" + Math.round(net) + "</td>");
            // $("#iif_right_bar").text(gross+" / "+net);
            $("#iif_gross").val(gross)
            $("#iif_net").val(net)
            totalincomekyc()
        })
        $(".editincome").on("click", function (e) {
            $("#incomekyc .box .incometype").addClass("hide");
            id = $(this).data("value");
            $("#" + id).removeClass("hide");

        })

        $(".delincome").on("click", function (e) {
            id = $(this).data("value");
            $("#" + id).find(" :input").not('[type=radio],[type=checkbox],select').val(0);
            $("#" + id).find(":input").val($("#" + id).find("[type=radio],[type=checkbox],select").prop('defaultSelected'));
            $("#" + $(this).data("action")).trigger("click");
            $("." + $(this).data("right")).html("")
            $(this).parent("li").parent("ul").parent("div").addClass('hide');

        })

        function totalincomekyc() {
            gross1 = $("#monthly_fixed_gross").val();
            gross2 = $("#monthly_variable_gross").val();
            gross3 = $("#iif_gross").val();
            gross4 = $("#annual_tax_declared_gross").val();
            gross5 = $("#annual_investment_return_gross").val();
            gross6 = $("#monthly_rental_gross").val();
            grosstotal = Math.round((gross1 * 1) + (gross2 * 1) + (gross3 * 1) + (gross4 * 1) + (gross5 * 1) + (gross6 * 1));

            net1 = $("#monthly_fixed_net").val();
            net2 = $("#monthly_variable_net").val();
            net3 = $("#iif_net").val();
            net4 = $("#annual_tax_declared_net").val();
            net5 = $("#annual_investment_return_net").val();
            net6 = $("#monthly_rental_net").val();
            nettotal = Math.round((net1 * 1) + (net2 * 1) + (net3 * 1) + (net4 * 1) + (net5 * 1) + (net6 * 1));
            if (grosstotal == 0 && nettotal == 0)
                $(".income_kyc_total_right_bar").html("");//<td>Total</td><td>"+ Math.round(grosstotal) + "</td><td>"+nettotal+"</td>");
            else
                $(".income_kyc_total_right_bar").html("<td>Total</td><td>" + Math.round(grosstotal) + "</td><td>" + nettotal + "</td>");


            //$("#income_kyc_total_right_bar").text(grosstotal + "/"+ nettotal);
            $("#gross").val(grosstotal);
            $("#net").val(nettotal);
            $(".incomekyc_right").html($("#incomekyc_right").html())
            submitincomekyc();
        }

    </script>
@endpush