<?php
$form_data = json_decode($wealth->form_data, true);
?>
<input type="hidden" value="{{$wealth->id}}" name="wealth_id">

@switch($type)
    @case("saving")
    <label class="col-lg-12 form-group">
        CA & SA Balance
    </label>

    <div class="form-group col-md-12 col-sm-12">

        <input type="number" name="saving_amount"
               value="{{ (isset($form_data["saving_amount"])?$form_data["saving_amount"]:"") }}"
               id="saving_amount" class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="own" value="own"
                   {{ (isset($form_data["saving_acctype"]) and $form_data["saving_acctype"]=='own')?"checked=checked":"" }}   id="saving_acctype_own">
            OWN
        </label>
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="joint" value="joint"
                   {{ (isset($form_data["saving_acctype"]) and $form_data["saving_acctype"]=='joint')?"checked=checked":"" }}      id="saving_acctype_ja">
            JA
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">

            <button type="button" id="saving_add" class="btn btn-primary">Update</button>
        </div>
    </div>
    @break
    @case("epf")
    <label class="col-lg-12 form-group">
        EPF Account Balance
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">RM</label>
        <input type="text" name="epf_amount" value="{{ (isset($form_data["epf_amount"])?$form_data["epf_amount"]:"") }}"
               id="epf_amount" class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">EPF Contributor Age</label>
        <div class="clearfix"></div>
        <label class="radio-inline">
            <input type="radio" value="> 55"
                   {{ (isset($form_data["epf_contributor_age"]) and $form_data["epf_contributor_age"]=="> 55")?"checked=checked":"" }}  name="epf_contributor_age">
            >55
        </label>
        <label class="radio-inline">
            <input type="radio" value="< 55"
                   {{ (isset($form_data["epf_contributor_age"]) and $form_data["epf_contributor_age"]=="< 55")?"checked=checked":"" }}  name="epf_contributor_age">
            <55
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <button type="button" id="epf_add" class="btn btn-primary">Update</button>
        </div>
    </div>
    @break
    @case("tpf")
    <label class="col-lg-12 form-group">
        Total Fixed Deposits
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="tpf_amount" id="tpf_amount" class="form-control" placeholder="">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="tpf_amount"
               value="{{ (isset($form_data["tpf_amount"])?$form_data["tpf_amount"]:"") }}" id="tpf_amount"
               class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="radio-inline">
            <input type="radio" value="own" data-val="own" name="tpf_acctype"
                   {{ (isset($form_data["tpf_acctype"]) and $form_data["tpf_acctype"]=='own')?"checked=checked":"" }} id="tpf_acctype_own">
            OWN
        </label>
        <label class="radio-inline">
            <input type="radio" value="joint" data-val="joint" name="tpf_acctype"
                   {{ (isset($form_data["tpf_acctype"]) and $form_data["tpf_acctype"]=='joint')?"checked=checked":"" }} id="tpf_acctype_ja">
            JA
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">

            <button type="button" id="tpf_add" class="btn btn-primary">Update</button>
        </div>
    </div>
    @break
    @case("tsv")

    <label class="col-lg-12 form-group">
        Total Shares Value
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="tsv_amount"
               value="{{ (isset($form_data["tsv_amount"])?$form_data["tsv_amount"]:"") }}" id="tsv_amount"
               class="form-control">
    </div>

    <div class="form-group">
        <div class="col-lg-12">

            <button type="button" id="tsv_add" class="btn btn-primary">Update</button>
        </div>
    </div>

    @break
    @case("utv")
    <label class="col-lg-12 form-group">
        Unit Trust Value
    </label>


    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="utv_amount"
               value="{{ (isset($form_data["utv_amount"])?$form_data["utv_amount"]:"") }}" id="utv_amount"
               class="form-control">
    </div>

    <div class="form-group">
        <div class="col-lg-12">

            <button type="button" id="utv_add" class="btn btn-primary">Update</button>
        </div>
    </div>
    @break

    @default
        <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-gray-light">Bank Statement</label>
        <div class="form-group col-md-12 col-sm-12">

            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value"></label>

            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Credited</label>

            </div>
            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Balance</label>

            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">


            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month1</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month1_credited" class="form-control credited"
                       value="{{ (isset($form_data["month1_credited"])?$form_data["month1_credited"]:"") }}"
                       id="month1_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month1_balance" class="form-control balance"
                       value="{{ (isset($form_data["month1_balance"])?$form_data["month1_balance"]:"") }}"
                       id="month1_balance">
            </div>
        </div>

        <div class="form-group col-md-12 col-sm-12">


            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month2</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month2_credited" class="form-control credited"
                       value="{{ (isset($form_data["month2_credited"])?$form_data["month2_credited"]:"") }}"
                       id="month2_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month2_balance" class="form-control balance"
                       value="{{ (isset($form_data["month2_balance"])?$form_data["month2_balance"]:"") }}"
                       id="month2_balance">
            </div>
        </div>

        <div class="form-group col-md-12 col-sm-12">


            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month3</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month3_credited" class="form-control credited"
                       value="{{ (isset($form_data["month3_credited"])?$form_data["month3_credited"]:"") }}"
                       id="month3_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month3_balance" class="form-control balance"
                       value="{{ (isset($form_data["month3_balance"])?$form_data["month3_balance"]:"") }}"
                       id="month3_balance">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">


            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month4</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month4_credited" class="form-control credited"
                       value="{{ (isset($form_data["month4_credited"])?$form_data["month4_credited"]:"") }}"
                       id="month4_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month4_balance" class="form-control balance"
                       value="{{ (isset($form_data["month4_balance"])?$form_data["month4_balance"]:"") }}"
                       id="month4_balance">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month5</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month5_credited" class="form-control credited"
                       value="{{ (isset($form_data["month5_credited"])?$form_data["month5_credited"]:"") }}"
                       id="month5_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month5_balance" class="form-control balance"
                       value="{{ (isset($form_data["month5_balance"])?$form_data["month5_balance"]:"") }}"
                       id="month5_balance">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">


            <div class="form-group col-md-4 col-sm-4">
                <label for="market_value">Month6</label>
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month6_credited" class="form-control credited"
                       value="{{ (isset($form_data["month6_credited"])?$form_data["month6_credited"]:"") }}"
                       id="month6_credited">
            </div>
            <div class="form-group col-md-4 col-sm-4">
                <input type="number" name="month6_balance" class="form-control balance"
                       value="{{ (isset($form_data["month6_balance"])?$form_data["month6_balance"]:"") }}"
                       id="month6_balance">
            </div>
        </div>
        <div class="form-group col-md-12 col-sm-12">
            <button type="button" id="add_company_wealth" class="btn btn-primary">ADD</button>
        </div>

@endswitch
