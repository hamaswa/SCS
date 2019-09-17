@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="msg">
            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message['msg'] }}</p>
                    <?php $applicant_data = $message['data']; ?>
                </div>
            @endif
        </div>

        <div class="col-md-8 col-sm-12 col-lg-8">
            <div class="col-md-12 col-sm-12 col-lg-12 bg-white">
                <form id="newaa" name="newaa" action="{{ route("aadata.storeAA") }}" method="post"
                      enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="form" value="new_application" id="form">
                    <input type="hidden" name="applicant_status" value="new_application" id="applicant_status">
                    <input type="hidden" name="applicant_maker_id" value="{{$applicant_maker_id}}" id="applicant_maker_id" />
                    <div id="applicant_id"></div>
                    <h3 id="aa_title">Create AA</h3>

                    <div class="col-lg-12 ">
                        <div class="box">
                            <div class="col-md-12 col-sm-12 bg-gray-light padding-5">
                                <div class="box-body bg-gray-light">
                                    <div class="form-group col-md-12 col-sm-12">
                                        <label id="name_label" class="control-label">
                                            Full Name as per NRIC/Passport
                                        </label>
                                        <input name="name" id="name" placeholder="" class="form-control" type="text">


                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label id="unique_id_label" class="control-label">
                                            NRIC No./Passport No.(e.g.12345678)
                                        </label>
                                        <input name="unique_id" id="unique_id" placeholder="" class="form-control"
                                               minlength="12" type="text">

                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <label class="control-label">Mobile Number (60121234567 / 6512345678)</label>
                                        <input name="mobile" id="mobile" placeholder="" class="form-control"
                                               minlength="10" type="number">

                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                            <label>Program</label>
                                            <select class="select2 form-control" name="aaprogramcode"
                                                    id="aaprogramcode">
                                                <option value="ABMB">ABMB</option>
                                                <option value="REA">REA</option>
                                                <option value="DEVP">DEVP</option>
                                                <option value="INS">INS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 ">
                                        <div class="form-group">
                                            <label>AA Category</label>
                                            <select name="aacategory" id="aacategory" class="form-control">
                                                <option value="C">Company</option>
                                                <option value="I">Individual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <button id="btn-newaa-submit" class="btn bg-gray-dark pull-right">Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
        @if ($message = Session::get('success'))
        <div class="col-md-4 col-sm-12 col-lg-4">
            <form id="edit-aa" name="edit-aa" action="{{ route("aadata.storeAA") }}" method="post" enctype="multipart/form-data">

                    <div class="padding-10 bg-white">
                        @csrf
                        <input type="hidden" name="form" value="applicant_attend" id="form">
                        <input type="hidden" name="applicant_status" value="Appointment" id="applicant_status">
                        <input type="hidden" name="is-consent" value="consent" id="is-consent">
                        <input type="hidden" name="applicant_id" value="{{isset($applicant_data->id)?$applicant_data->id:""}}" id="applicant_id">
                        <div class="padding-10 bg-primary">
                            <h4>Request CCRIS</h4>
                        </div>
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
                                           minlength="12" type="number">
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
                                    <button type="submit" id="btn-newaa-submit" data-value="consent"
                                            class="btn-newaa-submit btn bg-gray-dark">Request
                                    </button>



                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


            </form>
        </div>
        @endif
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">

    </script>
@endpush