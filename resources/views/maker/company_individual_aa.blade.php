<div id="com_applicant_buttons">
    @if(isset($com_attached_applicants))
        @foreach($com_attached_applicants as $applicant_sub)
            <div class="col-lg-12 col-md-12 applicants">
                <div class="btn-group margin-bottom border-black-1"
                     id="btn-air">
                    <a type="button" target="_blank" class="btn btn-default btn-flat"
                       href="{{route("aadata.create",["id"=>$applicant_sub->id])}}"
                       data-id="{{$applicant_sub->id}}">{{$applicant_sub->name}}</a>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu position-relative" id="" role="menu">
                        {{--<li><a href="#"  data-value="air" class="editincome">Edit</a></li>--}}
                        <li><a href="#" data-la="{{$la_applicant_id}}"
                               data-id="{{$applicant_sub->id}}" class="deleteInd">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>

        @endforeach
    @endif
</div>

<div class="clearfix"></div>

<div class="col-sm-12 col-md-4 form-group">
    <label>Salution</label>
    <input type="text" value="" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-4 form-group">
    <label>Position</label>
    <input type="text" value="" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-4 form-group">
    <label class="clearfix">Ownership</label>
    <div class="col-sm-10 no-padding">
        <input type="text" value="" class="form-control" autocomplete="off">
    </div>
    <div class="col-sm-2 padding-5">
        <strong>%</strong>
    </div>
</div>
<div class="col-sm-12 col-md-12 form-group">
    <label>Full Name as Per NRIC / Passport</label>
    <input type="text" value="" name="name" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-12 form-group">
    <label>NRIC No. / Passport No.</label>
    <input type="text" value="" name="unique_id" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-12 form-group">
    <label>Mobile No.</label>
    <input type="text" value="" name="mobile" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-12 form-group">
    <label>Email</label>
    <input type="email" name="email" value="" class="form-control" autocomplete="off">
</div>
<div class="col-sm-12 col-md-12 form-group">
    <label>Residential Address</label>
    <textarea name="address" class="form-control"></textarea>
</div>