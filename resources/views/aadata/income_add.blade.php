@if($type=="salary")
    <label class="col-lg-12 form-group clearfix">
        Monthly Fixed
    </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="monthly_fixed_currency" id="monthly_fixed_currency" data-target="#monthly_fixed_exchance_rate" class="form-control currency">
            <option value="myr" selected="selected">MYR</option>
            <option value="usd">USD</option>
            <option value="sgd">SGD</option>
            <option value="euro">EURO</option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input name="monthly_fixed_exchance_rate" id="monthly_fixed_exchance_rate" type="number" value=1 class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">BASIC</label>
        <input type="number" name="monthly_fixed_basic" id="monthly_fixed_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>

        <label class="checkbox-inline">
            <input type="checkbox"  value="epf" name="monthly_fixed_m_deductions[]"  id="monthly_fixed_m_deductions_epf"> EPF
        </label>
        <label class="checkbox-inline">
            <input type="checkbox" value="tax" name="monthly_fixed_m_deductions[]" id="monthly_fixed_m_deductions_tax"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" id="monthlyfixedadded" value="false" name="monthlyfixedadded">
            <button type="button" id="addmonthlyfixed" class="btn btn-primary">ADD</button>
        </div>
    </div>

@elseif($type=="business")
    <label class="col-lg-12 form-group">
        Monthly Variable
    </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="monthly_variable_currency"  id="monthly_variable_currency" class="form-control currency" data-target="#monthly_variable_exchange_rate">
            <option value="myr" selected="selected">MYR</option>
            <option value="usd">USD</option>
            <option value="sgd">SGD</option>
            <option value="euro">EURO</option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="monthly_variable_exchange_rate" id="monthly_variable_exchange_rate" class="form-control" value=1 placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month1</label>
        <input type="number" name="month1_variable_basic" id="month1_variable_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month2</label>
        <input type="number"  name="month2_variable_basic"   id="month2_variable_basic"  class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month3</label>
        <input type="number" name="month3_variable_basic" id="month3_variable_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month4</label>
        <input type="number" name="month4_variable_basic" id="month4_variable_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month5</label>
        <input type="number" name="month5_variable_basic"  id="month5_variable_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month6</label>
        <input type="number" name="month6_variable_basic" id="month6_variable_basic" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>
        <label class="checkbox-inline">
            <input value="epf" type="checkbox" name="monthly_variable_m_deductions[]"  id="monthly_variable_m_deductions_epf"> EPF
        </label>
        <label class="checkbox-inline">
            <input value="tax" type="checkbox" name="monthly_variable_m_deductions[]"  id="monthly_variable_m_deductions_tax"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" id="monthlyvariableadded" name="monthlyvariableadded" value="false">
            <button type="button" id="addmonthlyvariable" class="btn btn-primary">ADD</button>
        </div>
    </div>
@elseif($type=="incometax")
    <label class="col-lg-12 form-group"> ANNUAL TAX DECLARED </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="annual_tax_declared_currency"  id="annual_tax_declared_currency" class="form-control currency" data-target="#annual_tax_declared_exchange_rate">
            <option value="myr" selected="selected">MYR</option>
            <option value="usd">USD</option>
            <option value="sgd">SGD</option>
            <option value="euro">EURO</option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="annual_tax_declared_exchance_rate" id="annual_tax_declared_exchance_rate" value=1 class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="annual_tax_declared_amount" id="annual_tax_declared_amount" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>
        <label class="checkbox-inline">
            <input value="epf" type="checkbox"  id="annual_tax_declared_m_deductions_epf" name="annual_tax_declared_m_deductions[]"> EPF
        </label>
        <label class="checkbox-inline">
            <input value="tax" type="checkbox"  id="annual_tax_declared_m_deductions_tax" name="annual_tax_declared_m_deductions[]"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" id="annualtaxdeclaredadded" name="annualtaxdeclaredadded" value="false">
            <button type="button" id="addannualtaxdeclared" class="btn btn-primary">ADD</button>
        </div>
    </div>
@elseif($type=="iif")
    <label class="col-lg-12 form-group">
        Industry Income Factor
    </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month1</label>
        <input type="number" name="month1_iif" id="month1_iif" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month2</label>
        <input type="number"  name="month2_iif"   id="month2_iif"  class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month3</label>
        <input type="number" name="month3_iif" id="month3_iif" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month4</label>
        <input type="number" name="month4_iif" id="month4_iif" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month5</label>
        <input type="number" name="month5_iif"  id="month5_iif" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Month6</label>
        <input type="number" name="month6_iif" id="month6_iif" class="form-control" placeholder="">
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Income Factor</label>
        <input type="number" name="iif_income_factor" id="iif_income_factor" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Share Holding</label>
        <input type="number"  name="iif_share_holding"   id="iif_share_holding"  class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" id="iifadded" name="monthlyvariableadded" value="false">
            <button type="button" id="addiif" class="btn btn-primary">ADD</button>
        </div>
    </div>
@elseif($type=="monthlyrental")
    <label class="col-lg-12 form-group"> Monthly Rental </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="monthly_rental_amount" id="monthly_rental_amount" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Mandatory Deductions</label>
        <div class="clearfix"></div>

        <label class="checkbox-inline">
            <input value="tax" type="checkbox"  id="monthly_rental_deductions_tax" name="monthly_rental_m_deductions[]"> TAX
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="monthly_rental_added" id="monthly_rental_added" value="false">
            <button type="button" id="monthly_rental_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
@elseif($type=="air")
    <label class="col-lg-12 form-group"> Annual Investment Return </label>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">CURRENCY</label>
        <select name="annual_investment_return_currency"  id="annual_investment_return_currency" class="form-control currency" data-target="#annual_investment_return_exchange_rate">
            <option value="myr" selected="selected">MYR</option>
            <option value="usd">USD</option>
            <option value="sgd">SGD</option>
            <option value="euro">EURO</option>
        </select>
    </div>
    <div class="form-group col-md-12 col-sm-12 hide">
        <label class="control-label">Exchage Rate</label>
        <input type="number" name="annual_investment_return_exchange_rate" value=1 id="annual_investment_return_exchange_rate" class="form-control" placeholder="">
    </div>
    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">Amount</label>
        <input type="number" name="annual_investment_return_amount" id="annual_investment_return_amount" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="annual_investment_return_added" id="annual_investment_return_added" value="false">
            <button type="button" id="annual_investment_return_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
@endif