<fieldset id="applicantkyc">

    <div class="col-sm-12 col-md-6 col-lg-6 ">
        <div class="box">
            <div class="col-md-12 col-sm-12 bg-white padding-5">
                <div class="box-header bg-gray">

                    <a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf" title="CTOS Report Download"><img
                                src="{{ asset("img/save.jpeg") }}"/></a>
                    <a class="bg-white padding-5 pull-left" href="javascript:void(0)" onclick = "$('#applicantform').trigger('reset')"  title="Refresh"><img
                                src="{{ asset("img/refresh.jpeg") }}"/></a>
                    <a class="bg-white padding-5 pull-right" href="javascript:void(0)" onclick="$('#consent').trigger('click')" title="Upload Consent">
                        <img
                                src="{{ asset("img/file.jpeg") }}"/></a>
                    <input type="file" class="hide" name="consent" id="consent">
                </div>
                <br>

                <div class="box-body bg-yellow-light">
                    <div class="form-group clearfix">
                        <div class="col-md-4 col-sm-12">
                            <label class="control-label">Type</label>
                            <select id="aacategory" class="form-control select2" name="aacategory" style="width: 100%;">
                                <option value="Com" {{ ($inputs['aacategory']=="Com")?" selected":"" }}>
                                    Company
                                </option>
                                <option value="Ind"  {{ ($inputs['aacategory']=="Ind")?" selected":"" }}>
                                    Individual
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="name_label" class="control-label">
                            @if($inputs['aacategory']=="Com")
                                Company Name
                            @else
                                Full Name as per NRIC/Passport
                            @endif
                        </label>
                        <input name="name" id="name" placeholder="" class="form-control" type="text">

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="unique_id_label" class="control-label">
                            @if($inputs['aacategory']=="Com")
                            Company Registration No(e.g.12345678K)
                            @else
                            NRIC No./Passport No.(e.g.12345678)
                            @endif
                        </label>
                        <input name="unique_id" id="unique_id" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Mobile Number (e.g. 60121234567 / 6512345678)</label>
                        <input name="mobile" id="mobile" placeholder="" class="form-control" type="text">
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 pull-right">
                            <a href="{{ route("pipeline.index") }}" class="btn btn-default pull-left">Back</a>
                            <input type="button" name="submit" id="createaa" value="Create AA"
                                   class="btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="form-group col-md-12">
        <ul class="pager">

            <li class="next"><a href="javascript:void(0);" id="nextincomekyc" class="bg-yellow-gradient hide">Income KYC &gt;&gt;</a>
            </li>
        </ul>
        {{--<div class="col-md-12">--}}
        {{--<button type="button" id="nextincomekyc" class="btn btn-primary">--}}
        {{--Next--}}
        {{--</button>--}}
        {{--</div>--}}
    </div>

</fieldset>

@push("scripts")
    <script type="text/javascript">


        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })
        $("#aacategory").change(function (e) {
            if ($(this).val() == "Com") {
                $("#name_label").text("Company Name");
                $("#unique_id_label").text("Company Registration No(e.g.12345678K)");
            }
            else {
                $("#name_label").text("Full Name as per NRIC/Passport");
                $("#unique_id_label").text("NRIC No./Passport No.(e.g.12345678)");
            }
        });

    </script>
@endpush