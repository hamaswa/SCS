@switch($type)
    @case("saving")
    <label class="col-lg-12 form-group">
        CA & SA Balance
    </label>

    <div class="form-group col-md-12 col-sm-12">

        <input type="number" name="saving_amount"
               value="{{ (isset($wealth->saving_amount)?$wealth->saving_amount:"") }}"
               id="saving_amount" class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="own" value="own"
                   {{ (isset($wealth->saving_acctype) and $wealth->saving_acctype=='own')?"checked=checked":"" }}   id="saving_acctype_own">
            OWN
        </label>
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="joint" value="joint"
                   {{ (isset($wealth->saving_acctype) and $wealth->saving_acctype=='joint')?"checked=checked":"" }}      id="saving_acctype_ja">
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
        <input type="text" name="epf_amount" value="{{ (isset($wealth->epf_amount)?$wealth->epf_amount:"") }}"
               id="epf_amount" class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">EPF Contributor Age</label>
        <div class="clearfix"></div>
        <label class="radio-inline">
            <input type="radio" value="> 55"
                   {{ (isset($wealth->epf_contributor_age) and $wealth->epf_contributor_age=="> 55")?"checked=checked":"" }}  name="epf_contributor_age">
            >55
        </label>
        <label class="radio-inline">
            <input type="radio" value="< 55"
                   {{ (isset($wealth->epf_contributor_age) and $wealth->epf_contributor_age=="< 55")?"checked=checked":"" }}  name="epf_contributor_age">
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
               value="{{ (isset($wealth->tpf_amount)?$wealth->tpf_amount:"") }}" id="tpf_amount"
               class="form-control">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="radio-inline">
            <input type="radio" value="own" data-val="own" name="tpf_acctype"
                   {{ (isset($wealth->tpf_acctype) and $wealth->tpf_acctype=='own')?"checked=checked":"" }} id="tpf_acctype_own">
            OWN
        </label>
        <label class="radio-inline">
            <input type="radio" value="joint" data-val="joint" name="tpf_acctype"
                   {{ (isset($wealth->tpf_acctype) and $wealth->tpf_acctype=='joint')?"checked=checked":"" }} id="tpf_acctype_ja">
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
               value="{{ (isset($wealth->tsv_amount)?$wealth->tsv_amount:"") }}" id="tsv_amount"
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
               value="{{ (isset($wealth->utv_amount)?$wealth->utv_amount:"") }}" id="utv_amount"
               class="form-control">
    </div>

    <div class="form-group">
        <div class="col-lg-12">

            <button type="button" id="utv_add" class="btn btn-primary">Update</button>
        </div>
    </div>
    @break

@endswitch
