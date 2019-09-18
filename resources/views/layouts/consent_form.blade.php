<form id="edit-aa" name="edit-aa" action="{{ route("aadata.store") }}" method="post"
      enctype="multipart/form-data">
    <div class="modal-dialog">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <button id="btn-newaa-submit-no-consent" data-value="noconsent"
                    class="btn-newaa-submit btn btn-default pull-right" style="margin-right:20px;">Consent Not Obtained
            </button>
            <h4 id="aa_title"></h4>
        </div>
        <div class="modal-body bg-white">
            @csrf
            <input type="hidden" name="form" value="new_application" id="form">
            <input type="hidden" name="applicant_status" value="new_application" id="applicant_status">
            <div id="applicant_id"></div>
            <div class="bg-gray-light padding-5">
                <div class="box-body bg-gray-light">
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="name_label" class="control-label">
                            Full Name as per NRIC/Passport
                        </label>
                        <input name="name" value="{{isset($applicant_data->name)?$applicant_data->name:""}}" id="name" placeholder="" class="form-control" type="text">
                        <input type="checkbox" data-verify-error="Please Verify Name"
                               class="verify-newaa-input"> Verified

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="unique_id_label" class="control-label">
                            NRIC No./Passport No.(e.g.12345678)
                        </label>
                        <input name="unique_id" value="{{isset($applicant_data->unique_id)?$applicant_data->unique_id:""}}" id="unique_id" placeholder="" class="form-control"
                               minlength="12">
                        <input type="checkbox" data-verify-error="Please Verify IC"
                               class="verify-newaa-input"> Verified
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Mobile Number (e.g. 60121234567 /
                            6512345678)</label>
                        <input name="mobile" id="mobile" value="{{isset($applicant_data->mobile)?$applicant_data->mobile:""}}" placeholder="" class="form-control"
                               minlength="10" type="number">
                        <input type="checkbox" data-verify-error="Please Verify mobile"
                               class="verify-newaa-input"> Verified
                    </div>


                    <input type="hidden" name="status" value="Appointment-Attended"/>

                    <div class="form-group col-md-12 col-sm-12 consent-field">
                        <a class="bg-white padding-5 pull-right consent-field" href="javascript:void(0)"
                           onclick="$('#consent').trigger('click')" title="Upload Consent">
                            <img src="{{ asset("img/file.jpeg") }}"/></a>
                        <input type="file" class="hide" name="consent" id="consent">
                    </div>
                    <div class="form-group col-md-6 col-sm-6">
                        <button id="btn-newaa-submit" data-value="consent"
                                class="btn-newaa-submit btn bg-gray-dark">Request
                        </button>



                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</form>
