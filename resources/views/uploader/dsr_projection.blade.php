<div class="col-lg-12">
    <div class="col-md-4">
        <div class="panel-heading bg-light-blue-gradient"><strong>Income</strong></div>

        @include("uploader.dsr_projection_income")
    </div>

    <div class="col-md-4">
        <div class="panel-heading bg-light-blue-gradient"><strong>Existing Facility</strong></div>

        @include("uploader.dsr_projection_existing_facility")
    </div>


    <div class="col-md-4">
        <div class="panel-heading bg-light-blue-gradient"><strong>New Facility</strong></div>

        @include("uploader.dsr_projection_new_facility")
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-lg-12">

    <div class="col-md-3 bg-info padding-5">
        <label class="bg-gray-light padding-5 text-center" style="width:100%">Income</label>
        <div class="dsr_projection_income_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_income_total" class="form-control" id="dsr_income_total" placeholder="Total">
    </div>
    <div class="col-md-3 bg-gray  padding-5">
        <label class="bg-gray-light padding-5 text-center" style="width:100%">Exisiting Facility</label>
        <div class="dsr_projection_existing_facility_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_existing_facility_total" class="form-control" id="dsr_existing_facility_total">
    </div>
    <div class="col-md-3 bg-success padding-5">
        <label class="bg-gray-light padding-5 text-center" style="width:100%">New Facility</label>
        <div class="dsr_projection_new_facility_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_new_facility_total" class="form-control" id="dsr_new_facility_total">
    </div>
    <div class="col-md-3 bg-danger padding-5">
        <label class="bg-gray-light padding-5 text-center" style="width:100%">Exclusion</label>
        <div class="dsr_exclusion" style="min-height:235px">

        </div>
        {{--<input type="text" name="dsr_new_facility_total" class="form-control" id="dsr_new_facility_total">--}}
    </div>
    <div class="col-md-12 bg-green-light padding-5">
        <label for="dsr">DSR %</label>
        <input placeholder="DSR %" type="number" class="form-control" name="dsr" id="dsr"/>
    </div>
</div>
<div class="clearfix"></div>
