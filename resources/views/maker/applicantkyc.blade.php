<fieldset id="applicantkyc" class="tab-action-main">
<?php
if(!(isset($applicant_data) and $applicant_data!="")){
   $applicant_data = $applicant;
}
?>
    <div class="col-sm-12 col-md-6 col-lg-6 col-lg-offset-1 border-light">
        <div class="box">
            <div class="box-body">
            <input type="hidden" value="{{$applicant->aacategory}}" name="aacategory">
            <input type="hidden" value="{{isset($applicant_data->id)?$applicant_data->id:"0"}}" name="id">
        @if($applicant->aacategory=="C")
            <div class="col-md-6 col-sm-12 col-lg-6">
                {{--<div class="form-group">--}}
                    {{--<div class="btn-group margin-bottom border-black-1">--}}
                        {{--<button type="button" class="btn btn-default btn-flat">abd pvt ltd</button>--}}
                        {{--<button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-list"></i>--}}
                            {{--<span class="sr-only">Toggle Dropdown</span>--}}
                        {{--</button>--}}
                        {{--<ul class="dropdown-menu position-relative" id="" role="menu">--}}
                            {{--<li><a href="#" data-number="0">Edit</a></li>--}}
                            {{--<li><a href="#" data-number="0">Delete</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label>Company Registration No.</label>--}}
                    {{--<input type="text" placeholder="No Data Found" class="form-control" autocomplete="off">--}}
                    {{--<button type="submit" class="btn btn-primary">Search</button>--}}
                {{--</div>--}}
                <div class="bg-yellow-light padding-5">
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text"  value="{{$applicant_data->name}}" name="name" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Company Registration Number</label>
                        <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Office Phone No</label>
                        <input type="text" value="{{$applicant_data->mobile}}" name="mobile" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <label>Date Established
                        <input type="date"  name="date_established"
                               value="{{(isset($applicant_data->date_established)?$applicant_data->date_established:"")}}" class="form-control" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Nature of Business</label>
                    @include("layouts.select", ['name'=>'nature_of_business','id'=>'nature_of_business','type'=>'nature_of_business','options'=>$options])

                </div>
                <div class="form-group">
                    <label>Office Address</label>
                    <textarea name="address" value="{{isset($applicant_data->address)?$applicant_data->address:""}}" class="form-control" rows="8"></textarea>
                </div>
            </div>
            @else
            <div class="col-md-6 col-sm-12 col-lg-6">
                {{--<div class="form-group">--}}
                    {{--<div class="btn-group margin-bottom border-black-1">--}}
                        {{--<button type="button" class="btn btn-default btn-flat">Mr add</button>--}}
                        {{--<button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-list"></i>--}}
                            {{--<span class="sr-only">Toggle Dropdown</span>--}}
                        {{--</button>--}}
                        {{--<ul class="dropdown-menu position-relative" id="" role="menu">--}}
                            {{--<li><a href="#" data-number="0">Edit</a></li>--}}
                            {{--<li><a href="#" data-number="0">Delete</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label>NRIC / Passport NO</label>--}}
                    {{--<input type="text" placeholder="No Data Found" class="form-control" autocomplete="off">--}}
                    {{--<button type="submit" class="btn btn-primary">Search</button>--}}
                {{--</div>--}}
                <div class="bg-gray-light padding-5">
                    <div class="form-group">
                        <label>Salutation</label>

                        @include("layouts.select", ['name'=>'salutation','id'=>'salutation','type'=>'salutation','options'=>$options,'class'=>'form-control select2'])
                    </div>
                    <div class="form-group">
                        <label>Position</label>
                        @include("layouts.select", ['name'=>'position','id'=>'position','type'=>'position','options'=>$options,'class'=>'form-control select2'])

                    </div>
                    <div class="form-group">
                        <label class="clearfix">Ownership</label>
                        <div class="col-sm-11 no-margin no-padding">
                            <input type="text" name="ownership"
                                   {{(isset($applicant_data->ownership)?$applicant_data->ownership:"")}} class="form-control">
                        </div>
                        <div class="col-sm-1 no-margin no-padding">%</div>

                    </div>
                    <div class="form-group">
                        <label>Full Name as Per NRIC / Passport</label>
                        <input type="text"  value="{{$applicant_data->name}}" name="name" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>NRIC No. / Passport No.</label>
                        <input type="text" value="{{$applicant_data->unique_id}}" name="unique_id"  class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Mobile No.</label>
                        <input type="text"  value="{{$applicant_data->mobile}}" name="mobile"  class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{(isset($applicant_data->email)?$applicant_data->email:"")}}" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label>Residential Address</label>
                        <textarea name="address" class="form-control">
                            {{(isset($applicant_data->address)?$applicant_data->residential_address:"")}}</textarea>
                    </div>
                </div>
            </div>
            @endif
            </div>
            <div class="box-footer">
                <input type="submit" class="btn btn-adn">

            </div>
        </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="box border-light">
            @include("layouts.consent_form")
        </div>

    </div>
</fieldset>

@push("scripts")
    <script type="text/javascript">


        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })
        let business_forms=[];

        $(document.body).on("click","#add_business",function(){
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms.push(form);
            $("#business_form").trigger("reset")
            businessActionButtions();
        });


        $(document.body).on("click",".editbusiness",function () {
            form = business_forms[$(this).data('number')];
            console.log(form);
            $("form#business_form :input").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })

            //$("#business_owner_type option[value="+form['business_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\""+$(this).data('number')+"\" id=\"update_business\">Update Business</button>"))
        });

        $(document.body).on("click","#update_business",function(e){
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms[$(this).data("id")] = form;
            $("#business_form").trigger("reset")
            businessActionButtions();
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_business\">Add business</button>"))
        });
        $(document.body).on("click",".delbusiness",function(e){
            business_forms.splice($(this).data('number'),1);
            businessActionButtions();
        });


        function businessActionButtions(){
            $("#businesses").html("");
            i=0;
            business_forms.forEach(function(form){
                business_action_buttons = " <div class=\"btn-group margin-bottom border-black-1\">\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat\">Business "+(i+1)+"</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='business"+i+"' data-number='"+i+"' class='editbusiness'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delbusiness' data-number='"+i+"'>Delete</a></li>\n" +
                    "                        </ul>\n" +
                    "                    </div>"
                $("#businesses").append($(business_action_buttons));

                i++;
            })

        }

    </script>
@endpush