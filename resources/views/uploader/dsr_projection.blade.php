<div class="col-lg-12">
    <div class="col-md-4">
        @include("uploader.dsr_projection_income")
    </div>

    <div class="col-md-4">
        @include("uploader.dsr_projection_existing_facility")
    </div>


    <div class="col-md-4">
        @include("uploader.dsr_projection_new_facility")
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-lg-12">

    <div class="col-md-4 bg-info padding-5">

        <div class="dsr_projection_income_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_income_total" class="form-control" id="dsr_income_total" placeholder="Total">
    </div>
    <div class="col-md-4 bg-gray  padding-5">

        <div class="dsr_projection_existing_facility_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_existing_facility_total" class="form-control" id="dsr_existing_facility_total">
    </div>
    <div class="col-md-4 bg-success padding-5">

        <div class="dsr_projection_new_facility_total" style="min-height:200px">

        </div>
        <input type="text" name="dsr_new_facility_total" class="form-control" id="dsr_new_facility_total">
    </div>
    <div class="col-md-12 bg-green-light padding-5">
        <input type="text" class="form-control" name="dsr" id="dsr"/>
    </div>
</div>
<div class="clearfix"></div>
