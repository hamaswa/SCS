<?php
$form_data = json_decode($income->form_data, true);
?>
<input type="hidden" value="{{$income->id}}" name="income_id">
@if($income->type=="salary")

    <label class="col-lg-12 form-group clearfix">
        Monthly Fixed
    </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="monthly_fixed_currency" id="monthly_fixed_currency" data-target="#monthly_fixed_exchance_rate"
                class="form-control currency">
            <option value="myr" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="myr")?"selected":""}}>
                MYR
            </option>
            <option value="usd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="usd")?"selected":""}}>
                USD
            </option>
            <option value="sgd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="sgd")?"selected":""}}>
                SGD
            </option>
            <option value="euro" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="euro")?"selected":""}}>
                EURO
            </option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input name="monthly_fixed_exchance_rate" id="monthly_fixed_exchance_rate" type="number"
               value="{{(isset($form_data['monthly_fixed_exchance_rate']) and $form_data['monthly_fixed_exchance_rate']!="")?$form_data['monthly_fixed_exchance_rate']:""}}"
               class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">BASIC</label>
        <input type="number" name="monthly_fixed_basic" id="monthly_fixed_basic" class="form-control"
               value="{{(isset($form_data['monthly_fixed_basic']) and $form_data['monthly_fixed_basic']!="")?$form_data['monthly_fixed_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>

        <label class="checkbox-inline">
            <input type="checkbox" value="epf" name="monthly_fixed_m_deductions[]"
                   {{(isset($form_data['monthly_fixed_m_deductions']) and in_array("epf",$form_data['monthly_fixed_m_deductions']))?"checked":""}}
                   id="monthly_fixed_m_deductions_epf">EPF
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" value="tax" name="monthly_fixed_m_deductions[]"
                   {{(isset($form_data['monthly_fixed_m_deductions']) and in_array("tax",$form_data['monthly_fixed_m_deductions']))?"checked":""}}
                   id="monthly_fixed_m_deductions_tax">TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="addmonthlyfixed" class="btn btn-primary">Update</button>
        </div>
    </div>

@elseif($income->type=="business")
    <label class="col-lg-12 form-group">
        Monthly Variable
    </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="monthly_variable_currency" id="monthly_variable_currency" class="form-control currency"
                data-target="#monthly_variable_exchange_rate">

            <option value="myr" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="myr")?"selected":""}}>
                MYR
            </option>
            <option value="usd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="usd")?"selected":""}}>
                USD
            </option>
            <option value="sgd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="sgd")?"selected":""}}>
                SGD
            </option>
            <option value="euro" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="euro")?"selected":""}}>
                EURO
            </option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="monthly_variable_exchange_rate" id="monthly_variable_exchange_rate"
               value="{{(isset($form_data['monthly_variable_exchange_rate']) and $form_data['monthly_variable_exchange_rate']!="")?$form_data['monthly_variable_exchange_rate']:""}}"
               class="form-control">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month1</label>
        <input type="number" name="month1_variable_basic" id="month1_variable_basic" class="form-control"
               value="{{(isset($form_data['month1_variable_basic']) and $form_data['month1_variable_basic']!="")?$form_data['month1_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month2</label>
        <input type="number" name="month2_variable_basic" id="month2_variable_basic" class="form-control"
               value="{{(isset($form_data['month2_variable_basic']) and $form_data['month2_variable_basic']!="")?$form_data['month2_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month3</label>
        <input type="number" name="month3_variable_basic" id="month3_variable_basic" class="form-control"
               value="{{(isset($form_data['month3_variable_basic']) and $form_data['month3_variable_basic']!="")?$form_data['month3_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month4</label>
        <input type="number" name="month4_variable_basic" id="month4_variable_basic" class="form-control"
               value="{{(isset($form_data['month4_variable_basic']) and $form_data['month4_variable_basic']!="")?$form_data['month4_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month5</label>
        <input type="number" name="month5_variable_basic" id="month5_variable_basic" class="form-control"
               value="{{(isset($form_data['month5_variable_basic']) and $form_data['month5_variable_basic']!="")?$form_data['month5_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month6</label>
        <input type="number" name="month6_variable_basic" id="month6_variable_basic" class="form-control"
               value="{{(isset($form_data['month6_variable_basic']) and $form_data['month6_variable_basic']!="")?$form_data['month6_variable_basic']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>
        <label class="checkbox-inline">
            <input value="epf" type="checkbox" name="monthly_variable_m_deductions[]"
                   {{(isset($form_data['monthly_variable_m_deductions']) and in_array("epf",$form_data['monthly_variable_m_deductions']))?"checked":""}}
                   id="monthly_variable_m_deductions_epf"> EPF
        </label>
        <label class="checkbox-inline">
            <input value="tax" type="checkbox" name="monthly_variable_m_deductions[]"
                   {{(isset($form_data['monthly_variable_m_deductions']) and in_array("tax",$form_data['monthly_variable_m_deductions']))?"checked":""}}
                   id="monthly_variable_m_deductions_tax"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="addmonthlyvariable" class="btn btn-primary">Update</button>
        </div>
    </div>

@elseif($income->type=="incometax")
    <label class="col-lg-12 form-group"> ANNUAL TAX DECLARED </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="annual_tax_declared_currency" id="annual_tax_declared_currency" class="form-control currency"
                data-target="#annual_tax_declared_exchange_rate">

            <option value="myr" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="myr")?"selected":""}}>
                MYR
            </option>
            <option value="usd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="usd")?"selected":""}}>
                USD
            </option>
            <option value="sgd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="sgd")?"selected":""}}>
                SGD
            </option>
            <option value="euro" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="euro")?"selected":""}}>
                EURO
            </option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="annual_tax_declared_exchance_rate" id="annual_tax_declared_exchance_rate"
               value="{{(isset($form_data['annual_tax_declared_exchance_rate']) and $form_data['annual_tax_declared_exchance_rate']!="")?$form_data['annual_tax_declared_exchance_rate']:""}}"
               class="form-control">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="annual_tax_declared_amount" id="annual_tax_declared_amount" class="form-control"
               value="{{(isset($form_data['annual_tax_declared_amount']) and $form_data['annual_tax_declared_amount']!="")?$form_data['annual_tax_declared_amount']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>
        <label class="checkbox-inline">
            <input value="epf" type="checkbox" id="annual_tax_declared_m_deductions_epf"
                   {{(isset($form_data['annual_tax_declared_m_deductions']) and in_array("epf",$form_data['annual_tax_declared_m_deductions']))?"checked":""}}
                   name="annual_tax_declared_m_deductions[]"> EPF
        </label>
        <label class="checkbox-inline">
            <input value="tax" type="checkbox" id="annual_tax_declared_m_deductions_tax"
                   {{(isset($form_data['annual_tax_declared_m_deductions']) and in_array("tax",$form_data['annual_tax_declared_m_deductions']))?"checked":""}}
                   name="annual_tax_declared_m_deductions[]"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="addannualtaxdeclared" class="btn btn-primary">Update</button>
        </div>
    </div>

@elseif($income->type=="iif")
    <label class="col-lg-12 form-group">
        Industry Income Factor
    </label>


    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month1</label>
        <input type="number" name="month1_iif" id="month1_iif" class="form-control"
               value="{{(isset($form_data['month1_iif']) and $form_data['month1_iif']!="")?$form_data['month1_iif']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month2</label>
        <input type="number" name="month2_iif" id="month2_iif" class="form-control"
               value="{{(isset($form_data['month2_iif']) and $form_data['month2_iif']!="")?$form_data['month2_iif']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month3</label>
        <input type="number" name="month3_iif" id="month3_iif" class="form-control"
               value="{{(isset($form_data['month3_iif']) and $form_data['month3_iif']!="")?$form_data['month3_iif']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month4</label>
        <input type="number" name="month4_iif" id="month4_iif" class="form-control"
               value="{{(isset($form_data['month4_iif']) and $form_data['month4_iif']!="")?$form_data['month4_iif']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month5</label>
        <input type="number" name="month5_iif" id="month5_iif" class="form-control"
               value="{{(isset($form_data['month5_iif']) and $form_data['month5_iif']!="")?$form_data['month5_iif']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month6</label>
        <input type="number" name="month6_iif" id="month6_iif" class="form-control"
               value="{{(isset($form_data['month6_iif']) and $form_data['month6_iif']!="")?$form_data['month6_iif']:""}}">
    </div>

    <div class="clearfix"></div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Income Factor</label>
        <input type="number" name="iif_income_factor" id="iif_income_factor" class="form-control"
               value="{{(isset($form_data['iif_income_factor']) and $form_data['iif_income_factor']!="")?$form_data['iif_income_factor']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Share Holding</label>
        <input type="number" name="iif_share_holding" id="iif_share_holding" class="form-control"
               value="{{(isset($form_data['iif_share_holding']) and $form_data['iif_share_holding']!="")?$form_data['iif_share_holding']:""}}">
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="addiif" class="btn btn-primary">Update</button>
        </div>
    </div>

@elseif($income->type=="monthlyrental")
    <label class="col-lg-12 form-group"> Monthly Rental </label>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="monthly_rental_amount" id="monthly_rental_amount" class="form-control"
               value="{{(isset($form_data['monthly_rental_amount']) and $form_data['monthly_rental_amount']!="")?$form_data['monthly_rental_amount']:""}}">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>

        <label class="checkbox-inline">
            <input value="tax" type="checkbox" id="monthly_rental_deductions_tax"
                   {{(isset($form_data['monthly_rental_m_deductions']) and in_array("tax",$form_data['monthly_rental_m_deductions']))?"checked":""}}
                   name="monthly_rental_m_deductions[]"> TAX
        </label>
    </div>


    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="monthly_rental_add" class="btn btn-primary">Update</button>
        </div>
    </div>

@elseif($income->type=="air")
    <label class="col-lg-12 form-group"> Annual Investment Return </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="annual_investment_return_currency" id="annual_investment_return_currency"
                class="form-control currency" data-target="#annual_investment_return_exchange_rate">

            <option value="myr" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="myr")?"selected":""}}>
                MYR
            </option>
            <option value="usd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="usd")?"selected":""}}>
                USD
            </option>
            <option value="sgd" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="sgd")?"selected":""}}>
                SGD
            </option>
            <option value="euro" {{(isset($form_data['monthly_fixed_currency']) and $form_data['monthly_fixed_currency']=="euro")?"selected":""}}>
                EURO
            </option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="annual_investment_return_exchange_rate"
               value="{{(isset($form_data['annual_investment_return_exchange_rate']) and $form_data['annual_investment_return_exchange_rate']!="")?$form_data['annual_investment_return_exchange_rate']:""}}"
               id="annual_investment_return_exchange_rate" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="annual_investment_return_amount" id="annual_investment_return_amount"
               value="{{(isset($form_data['annual_investment_return_amount']) and $form_data['annual_investment_return_amount']!="")?$form_data['annual_investment_return_amount']:""}}"
               class="form-control">
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="annual_investment_return_add" class="btn btn-primary">Update</button>
        </div>
    </div>
@endif