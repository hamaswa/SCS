@switch($type)
    @case("saving")
    <label class="col-lg-12 form-group">
        CA & SA Balance
    </label>

    <div class="form-group col-md-12 col-sm-12">

        <input type="number" name="saving_amount" id="saving_amount" class="form-control" placeholder="">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="own" value="own" id="saving_acctype_own"> OWN
        </label>
        <label class="radio-inline">
            <input type="radio" name="saving_acctype" data-val="joint" value="joint" id="saving_acctype_ja"> JA
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="saving_added" id="saving_added" value="false">
            <button type="button" id="saving_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
    @break
    @case("epf")
    <label class="col-lg-12 form-group">
        EPF Account Balance
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">RM</label>
        <input type="text" name="epf_amount" id="epf_amount" class="form-control" placeholder="">
    </div>

    <div class="form-group col-md-12 col-sm-12">
        <label class="control-label">EPF Contributor Age</label>
        <div class="clearfix"></div>
        <label class="radio-inline">
            <input type="radio" value="> 55" name="epf_contributor_age"> >55
        </label>
        <label class="radio-inline">
            <input type="radio" value="< 55" name="epf_contributor_age"> <55
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="epf_added" id="epf_added" value="false">
            <button type="button" id="epf_add" class="btn btn-primary">ADD</button>
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
        <label class="radio-inline">
            <input type="radio" value="own" data-val="own" name="tpf_acctype" id="tpf_acctype_own"> OWN
        </label>
        <label class="radio-inline">
            <input type="radio" value="joint" data-val="joint" name="tpf_acctype" id="tpf_acctype_ja"> JA
        </label>
    </div>
    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="tpf_added" id="tpf_added" value="false">
            <button type="button" id="tpf_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
    @break
    @case("tsv")
    <label class="col-lg-12 form-group">
        Total Shares Value
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="tsv_amount" id="tsv_amount" class="form-control" placeholder="">
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="tsv_added" id="tsv_added" value="false">
            <button type="button" id="tsv_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
    @break
    @case("utv")
    <label class="col-lg-12 form-group">
        Unit Trust Value
    </label>

    <div class="form-group col-md-12 col-sm-12">
        <input type="number" name="utv_amount" id="utv_amount" class="form-control" placeholder="">
    </div>

    <div class="form-group">
        <div class="col-lg-12">
            <input type="hidden" name="utv_added" id="utv_added" value="false">
            <button type="button" id="utv_add" class="btn btn-primary">ADD</button>
        </div>
    </div>
    @break

@endswitch
