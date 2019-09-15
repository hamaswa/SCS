{{--<div class="clearfix"></div>--}}

{{--<div class="col-sm-12 col-md-4 form-group">--}}
    {{--<label>Salution</label>--}}
    {{--<input type="text" value="" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-4 form-group">--}}
    {{--<label>Position</label>--}}
    {{--<input type="text" value="" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-4 form-group">--}}
    {{--<label class="clearfix">Ownership</label>--}}
    {{--<div class="col-sm-10 no-padding">--}}
        {{--<input type="text" value="" class="form-control" autocomplete="off">--}}
    {{--</div>--}}
    {{--<div class="col-sm-2 padding-5">--}}
        {{--<strong>%</strong>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-12 form-group">--}}
    {{--<label>Full Name as Per NRIC / Passport</label>--}}
    {{--<input type="text" value="" name="name" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-12 form-group">--}}
    {{--<label>NRIC No. / Passport No.</label>--}}
    {{--<input type="text" value="" name="unique_id" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-12 form-group">--}}
    {{--<label>Mobile No.</label>--}}
    {{--<input type="text" value="" name="mobile" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-12 form-group">--}}
    {{--<label>Email</label>--}}
    {{--<input type="email" name="email" value="" class="form-control" autocomplete="off">--}}
{{--</div>--}}
{{--<div class="col-sm-12 col-md-12 form-group">--}}
    {{--<label>Residential Address</label>--}}
    {{--<textarea name="address" class="form-control"></textarea>--}}
{{--</div>--}}

<form  id="com_ind_update" action="{{ route("aadata.update",["id"=>$applicant_data->id]) }}">
    @csrf
    @method("patch")
    <input type="hidden" name="applicant_id"
           value="{{isset($applicant_data->id)?$applicant_data->id:"0"}}">
    <div class="col-sm-12 col-md-3 form-group">
        <label>Salutation</label>
        <input type="text" name="salutation" id="salutation"
               value="{{(isset($applicant_data->salutation)?$applicant_data->salutation:"")}}"
               class="form-control" autocomplete="off"/>
    </div>
    <div class="col-sm-12 col-md-3 form-group">
        <label>Position</label>
        <input type="text" name="position" id="position"
               value="{{(isset($applicant_data->position)?$applicant_data->position:"")}}"
               class="form-control" autocomplete="off"/>

    </div>
    <div class="col-sm-12 col-md-3 form-group">
        <label class="clearfix">Ownership</label>
        <div class="col-sm-10 no-padding">
            <input type="text" name="ownership" class="form-control" autocomplete="off"
                   value="{{(isset($applicant_data->ownership)?$applicant_data->ownership:"")}}">
        </div>
        <div class="col-sm-2 padding-5">
            <strong>%</strong>
        </div>
    </div>
    {{--<div class="col-sm-12 col-md-3 form-group">--}}
        {{--<label class="clearfix">Applicant Status</label>--}}
        {{--<input type="text" value="" class="form-control" autocomplete="off" />--}}
    {{--</div>--}}
    {{--<div class="col-sm-12 col-md-3 form-group">--}}
        {{--<label class="clearfix">Employment Status</label>--}}
        {{--<input type="text" value="" class="form-control" autocomplete="off" />--}}
    {{--</div>--}}
    <div class="col-md-12 col-sm-12 padding-5 bg-gray-light">
        <div class="col-sm-12 col-md-12 form-group">
            <label>Full Name as Per NRIC / Passport</label>
            <input type="text" value="{{$applicant_data->name}}" name="name" class="form-control"
                   autocomplete="off">
        </div>
        <div class="col-sm-12 col-md-12 form-group">
            <label>NRIC No. / Passport No.</label>
            <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id"
                   class="form-control" autocomplete="off">
        </div>
        <div class="col-sm-12 col-md-12 form-group">
            <label>Mobile No.</label>
            <input type="text" value="{{$applicant_data->mobile}}" name="mobile" class="form-control"
                   autocomplete="off">
        </div>
        <div class="col-sm-12 col-md-12 form-group">
            <label>Email</label>
            <input type="email" name="email"
                   value="{{(isset($applicant_data->email)?$applicant_data->email:"")}}"
                   class="form-control" autocomplete="off">
        </div>
        <div class="col-sm-12 col-md-12 form-group">
            <label>Residential Address</label>
            <textarea name="address" class="form-control">
                            {{(isset($applicant_data->address)?$applicant_data->address:"")}}</textarea>
        </div>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12 form-group pull-right">
        <input type="submit" value="Update" class="btn btn-default">
    </div>

</form>
