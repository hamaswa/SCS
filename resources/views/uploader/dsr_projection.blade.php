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

    <div class="col-md-3 bg-aqua padding-5">

        <div class="dsr_projection_income_total bg-aqua" style="min-height:200px" ondrop="dropIncome(event)" ondragover="allowDropIncome(event)">

        </div>
        Total <input type="text" name="dsr_income_total" class="form-control" id="dsr_income_total">
    </div>
    <div class="col-md-3 bg-red  padding-5">

        <div class="dsr_projection_existing_facility_total bg-red padding-5" style="min-height:200px">

        </div>
        <input type="text" name="dsr_existing_facility_total" class="form-control" id="dsr_existing_facility_total">
    </div>
    <div class="col-md-3 bg-purple padding-5">

        <div class="dsr_projection_new_facility_total bg-purple padding-5" style="min-height:200px">

        </div>
        <input type="text" name="dsr_new_facility_total" class="form-control" id="dsr_new_facility_total">
    </div>
    <div class="col-md-3 bg-green-light padding-5">
        <div class="bg-purple padding-5" style="min-height:200px">

            <input type="text" class="form-control" name="dsr" id="dsr"/>
        </div>
    </div>
</div>
<div class="clearfix"></div>
