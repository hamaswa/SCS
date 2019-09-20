<fieldset id="applicantkyc" class="tab-action-main">
    {{--<div class="col-md-2 col-sm-3">--}}
        {{--<a href="javascript:void(0);" data-id="applicantkyc" class="bg-yellow-light padding-5 pull-left vericaltext tab-action border-black-1">APPLICATION <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="incomekyc" id="nextincomekyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br>INCOME <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="wealthkyc" id="nextwealthkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br>WEALTH <br> KYC</a>--}}
        {{--<a href="javascript:void(0);" data-id="businesskyc" id="nextbusinesskyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br><br>business <br> KYC</a>--}}
    {{--</div>--}}

    <div class="col-sm-12 col-md-6 col-lg-6 col-lg-offset-1">
        <div class="box">
            <div class="col-md-12 col-sm-12 bg-gray-light padding-5">
                <div class="box-header bg-gray">
                    <strong class="applicant padding-5"></strong>


                </div>

                <div class="box-body bg-gray-light">
                    @if(isset($businesses))
                    <div id="businesses" class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <?php
                        $i=0;
                        $b=$s=1;
                        ?>
                        @foreach($businesses as $business)
                            <?php
                            if($business->business_type=='Salaried')
                                    $i_no= $s++;
                            else
                                $i_no=$b++;
                            ?>
                           <div class="btn-group margin-bottom border-black-1 businesskyc-action-btn">
                              <button type="button"  data-number='{{$i}}'  class="btn btn-default btn-flat view">{{  $business->business_type."".$i_no }}</button>
                               <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown" />

                                   <i class="fa fa-list"></i>
                                         <span class="sr-only">Toggle Dropdown</span>
                                         </button>
                                     <ul class="dropdown-menu position-relative" id="" role="menu">
                                         <li><a href="#" id='business{{$i}}' data-number='{{$i}}' class='editbusiness'>Edit</a></li>
                                                  <li><a href="#" class='delbusiness' data-number='{{ $i }}'>Delete</a></li>
                                     </ul>
                           </div>
                            <?php $i++ ?>
                        @endforeach
                    </div>
                    @endif
                    <div class="form-group clearfix">
                        <div class="col-md-12 col-sm-12">
                            <label class="control-label">Income Source</label>
                            <select id="business_type" name="business_type" class="form-control">
                                <option value="Business"
{{--                                        {{ ($business->business_type=='Business'?"checked=checked":"") }}--}}
                                > Business </option>
                                <option value="Salaried"
{{--                                        {{ ($business->business_type=='Salaried'?"checked=checked":"") }}--}}
                                > Salaried </option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Nature of Business</label>
                        <input name="business_nature" id="business_nature"
{{--                               value = "{{$business->business_nature}}"--}}
                               class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Position</label>
                        <input name="business_position" id="business_position"
{{--                               value = "{{$business->business_position}}"--}}
                               class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label"><em class="text-danger">*</em>Email</label>
                        <input name="business_email" id="business_email"
{{--                               value = "{{$business->business_email}}"--}}
                               class="form-control" type="email">
                    </div>
                    <?php /*
                    <div class="form-group clearfix">
                        <div class="col-md-6 col-sm-12">
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
                        <input name="name" id="name" value = "{{$business->}}"  class="form-control" type="text">

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label id="unique_id_label" class="control-label">
                            @if($inputs['aacategory']=="Com")
                            Company Registration No(e.g.12345678K)
                            @else
                            NRIC No./Passport No.(e.g.12345678)
                            @endif
                        </label>
                        <input name="unique_id" id="unique_id" value = "{{$business->}}"  class="form-control" type="text">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label class="control-label">Mobile Number (e.g. 60121234567 / 6512345678)</label>
                        <input name="mobile" id="mobile" value = "{{$business->}}"  class="form-control" type="text">
                    </div>
                    */    ?>
                    <div class="form-group">
                        <div class="col-md-12 pull-right" id="btnsubmit">
                            {{--<a href="{{ route("pipeline.index") }}" class="btn btn-primary pull-left">Back</a>--}}
                            <input type="button" name="submit" id="add_business" value="Add"
                                   class="btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 bg-green-gradient">
        <div class="box">
            <div class="box-body bg-green-gradient min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover bg-white text-black">
                        <thead>
                        <tr class="bg-primary">
                            <th colspan="4" class="text-center">Document</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Date</th>
                            <th>Document Name</th>
                            <th>Document Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($applicant->applicantDocuments as $document)
                            <tr>
                                <td>{{ date("Y-m-d",strtotime($document->created_at))}}</td>
                                <td>{{ $document->doc_name }}</td>
                                <td>{{$document->doc_status}}</td>
                                <td><a href="{{ route("download")}}?id={{$document->id}}">view</a></td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
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
        function IsEmail(email) {
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!regex.test(email)) {
                return false;
            }else{
                return true;
            }
        }

        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })

        // $("#business_type").on('change',function (e) {
        //     if($(this).val()=="Business"){
        //         $(".for_business").show();
        //     }
        //     else {
        //         $(".for_business").val("").hide();
        //     }
        // })
        //let business_forms = [];
       let business_forms = <?php print_r(json_encode(json_decode($businesses,true))); ?>
        //     console.log(business_data.lenght);
        // for(i=1;i<=business_data.lenght;i++){
        //     business_forms.push(business_data[i-1]);
        // }


        $(document.body).on("click","#add_business",function(){
            //businesscount = business_forms.count();
            //$("#number").val(businesscount);

            if($("#business_email").val()==""){
                alert("Email is reqired");
                return;
            }
            else if(!(IsEmail($("#business_email").val()))){
                alert("Email is invalid");
                return
            }
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms.push(form);
            console.log(business_forms);
            businessActionButtions();
        });


        $(document.body).on("click",".editbusiness",function () {
            form = business_forms[$(this).data('number')];
            $("#business_type").val(form.business_type).trigger("change");
            $("form#business_form :input").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })

            $("#number").val($(this).data('number'))

            $("#btnsubmit").html($("  <input type=\"button\" name=\"submit\" id=\"update_business\" value=\"Update\"\n" +
                " class=\"btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark\" data-id=\""+$(this).data('number')+"\" id=\"update_business\">"))
        });

        $(document.body).on("click","#update_business",function(e){
            if($("#business_email").val()==""){
                alert("Email is reqired");
                return;
            }
            let form = {};
            $("#business_form" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            business_forms[$(this).data("id")] = form;
            businessActionButtions();
            $("#btnsubmit").html($(" <input type=\"button\" name=\"submit\" id=\"add_business\" value=\"Add\"\n" +
                "                                   class=\"btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark\"/>"))
        });
        $(document.body).on("click",".delbusiness",function(e){
            business_forms.splice($(this).data('number'),1);
            businessActionButtions();
        });

        $(document.body).on("click",".businesskyc-action-btn button.view",function (e) {
            form = business_forms[$(this).data('number')];
            $("#business_type").val(form.business_type).trigger("change");
            $("form#business_form :input").not("[type=button]").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })

            $("#number").val($(this).data('number'))

            $("#btnsubmit").html($("  <input type=\"button\" name=\"submit\" id=\"update_business\" value=\"Update\"\n" +
                " class=\"btn btn-default pull-right text-uppercase text-bold text-white bg-gray-dark\" data-id=\""+$(this).data('number')+"\" id=\"update_business\">"))
        })


        function businessActionButtions(){
            $("#businesses").html("");
            business_type = $("#business_type :selected").val();
            i=0;
            s=0;
            b=0;
            business_forms.forEach(function(form){
                n=0;
                if(form.business_type=="Business") {
                    b++;
                    n=b;
                }
                else {
                    s++;
                    n=s;
                }
                business_action_buttons = " <div class=\"btn-group margin-bottom border-black-1 businesskyc-action-btn\">\n" +
                    "                        <button type=\"button\"  data-number='"+i+"'  class=\"btn btn-default btn-flat view\"> " + form.business_type +n+"</button>\n" +
                    "                        <button type=\"button\" class=\"btn btn-default btn-flat dropdown-toggle\" data-toggle=\"dropdown\">\n" +
                    "                            <i class=\"fa fa-list\"></i>\n" +
                    "                            <span class=\"sr-only\">Toggle Dropdown</span>\n" +
                    "                        </button>\n" +
                    "                        <ul class=\"dropdown-menu position-relative\" id=\"\" role=\"menu\">\n" +
                    "                            <li><a href=\"#\" id='business"+i+"' data-number='"+i+"' class='editbusiness'>Edit</a></li>\n" +
                    "                            <li><a href=\"#\" class='delbusiness' data-number='"+i+"'>Delete</a></li>\n" +
                    "                        </ul></div>"
                $("#businesses").append($(business_action_buttons));

                i++;
            })

            $("#business_form").trigger("reset")
            $("#business_type").val(business_type);
            submitbusinesskyc();

        }

    </script>
@endpush