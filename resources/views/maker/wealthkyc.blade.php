<fieldset id="wealthkyc" class="tab-action-main">
    {{--<div class="col-md-2 col-sm-3">--}}
    {{--<a href="javascript:void(0);" data-id="applicantkyc" id="backapplicantkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1">APPLICATION <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="incomekyc" id="backincomekyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br>INCOME <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="wealthkyc" id="nextwealthkyc" class="bg-gray-light padding-5 pull-left vericaltext tab-action border-black-1"><br><br>WEALTH <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="propertykyc" id="nextpropertykyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br><br>PROPERTY <br> KYC</a>--}}
    {{--</div>--}}
    <div class="col-md-6 col-sm-12 col-lg-6 col-lg-offset-1">
        <div class="box">

            <div class="box-header bg-gray-light">
                <div class="btn-group margin-bottom border-black-1">
                    <button type="button" class="btn btn-default btn-flat la_aa"
                            data-la="{{$applicant->id}}"
                            data-id="{{$applicant->id}}">{{$applicant->name}}</button>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>

                </div>
                @if(isset($attached_applicants))
                    @foreach($attached_applicants as $applicant_sub)
                        <div class="applicants form-group pull-left">
                            <div class="btn-group margin-bottom border-black-1"
                                 id="btn-air">
                                <button type="button" class="btn btn-default btn-flat la_aa"
                                        data-la="{{$applicant->id}}"
                                        data-id="{{$applicant_sub->id}}">{{$applicant_sub->name}}</button>
                                <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                                        data-toggle="dropdown"
                                        aria-expanded="false">
                                    <i class="fa fa-list"></i>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>

                            </div>
                        </div>

                    @endforeach
                @endif
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>
                    {{--<div class="col-md-7 col-sm-12">--}}
                        {{--<a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf"--}}
                           {{--title="CTOS Report Download"><img src="{{ asset("img/save.jpeg") }}"/></a>--}}
                        {{--<a class="bg-white padding-5 pull-left" href="javascript:void(0)"--}}
                           {{--onclick="$('#wealthform').trigger('reset')" title="Refresh"><img--}}
                                    {{--src="{{ asset("img/refresh.jpeg") }}"/></a>--}}

                    {{--</div>--}}

                </div>
                <div id="wealthkyc_action_btns" class="col-lg-12 col-md-12 col-sm-12">
                    @include("aadata.wealthkyc_action_btns",["wealths"=>$applicant_data->applicantWealth()->get()])
                </div>
                <div class="form-group col-md-12 col-sm-12 bg-gray-light" id="wealth_doc_form">
                    <div class="form-group col-md-4 col-sm-6 bg-gray-light">
                        <label class="control-label">Type</label>
                        <select id="wealthtype" class="form-control select2" name="wealthtype" style="width:100%;">
                            <option value="saving">Saving</option>
                            <option value="epf">EPF Account Balance</option>
                            <option value="tpf">Total Fixed Deposits</option>
                            <option value="tsv">Total Shares Value</option>
                            <option value="utv">Unit Trust Value
                            </option>

                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-6 bg-gray-light wealth_primary_docs">
                        <label class="control-label">Primary Docs</label>
                        <div class="clearfix"></div>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'type'=>'saving_p',
                        'options'=>$options,
                        'default'=>"Select Primary Document"
                        ])


                    </div>
                    <div class="form-group col-md-4 col-sm-6 bg-gray-light wealth_support_docs">
                        <label class="control-label">Supporting Docs</label>
                        <div class="clearfix"></div>
                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'type'=>'saving_s',
                        'options'=>$options,
                        'default'=>"Select Supporting Document"
                        ])

                    </div>
                    <div class="form-group col-md-4 col-sm-6 bg-gray-light pull-right">

                        <input type="file" class="form-control btn btn-primary" name="wealth_doc[]" multiple id="wealth_doc" />
                    </div>
                </div>
            </div>
            <div class="box-body bg-gray-light wealthtype" id="saving">
                <label class="col-lg-12 form-group">
                    CA & SA Balance
                </label>

                <div class="form-group col-md-12 col-sm-12">

                    <input type="number" name="saving_amount" id="saving_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" data-val="own" value="own" id="saving_acctype_own"> OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" data-val="joint" value="joint" id="saving_acctype_ja"> JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="saving_added" id="saving_added" value="false">
                        <button type="button" id="saving_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="epf">
                <label class="col-lg-12 form-group">
                    EPF Account Balance
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">RM</label>
                    <input type="text" name="epf_amount" id="epf_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">EPF Contributor Age</label>
                    <div class="clearfix"></div>
                    <label class="radio-inline">
                        <input type="radio" value="> 55" name="epf_contributor_age"> >55
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="< 55" name="epf_contributor_age"> <55
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="epf_added" id="epf_added" value="false">
                        <button type="button" id="epf_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="tpf">
                <label class="col-lg-12 form-group">
                    Total Fixed Deposits
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="tpf_amount" id="tpf_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" value="own" data-val="own" name="tpf_acctype" id="tpf_acctype_own"> OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="joint" data-val="joint" name="tpf_acctype" id="tpf_acctype_ja"> JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tpf_added" id="tpf_added" value="false">
                        <button type="button" id="tpf_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="tsv">
                <label class="col-lg-12 form-group">
                    Total Shares Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="tsv_amount" id="tsv_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tsv_added" id="tsv_added" value="false">
                        <button type="button" id="tsv_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="utv">
                <label class="col-lg-12 form-group">
                    Unit Trust Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="utv_amount" id="utv_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="utv_added" id="utv_added" value="false">
                        <button type="button" id="utv_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="box">
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive wealthkyc_right">
                    <table class="table table-bordered table-striped bg-white">
                        <thead class="bg-light-blue">
                        <tr class="bg-light-blue-gradient">
                            <th colspan="3" class="text-center">Wealth</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr class="wealth_saving_right"></tr>

                        <tr class="wealth_epf_right"></tr>

                        <tr class="wealth_tpf_right"></tr>

                        <tr class="wealth_tsv_right"></tr>

                        <tr class="wealth_utv_right"></tr>

                        </tbody>
                        <tfoot>
                        <tr class="bg-yellow-light wealth_total_right">


                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <input type="hidden" name="total" id="total">

    <?php /*
    <div class="col-md-4 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="padding-5 bg-white pull-right border-light">
                    <img src="{{ asset("img/folder.png") }}" class="img-responsive width-30" />
                </div>
                <div class="padding-5 bg-chocolate pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30" />
                </div>
                <div class="padding-5 bg-green-gradient pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30" />
                </div>
                <div class="padding-5 bg-gray-light pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" class="img-responsive width-30" />
                </div>
            </div>
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped bg-white">
                    <thead class="bg-light-blue">
                    <tr class="bg-light-blue-gradient">
                        <th colspan="3" class="text-center">Wealth</th>
                    </tr>
                    <tr class="bg-aqua">
                        <th>Type</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>

                            <tr id="wealth_saving_right"></tr>

                            <tr id="wealth_epf_right"></tr>

                            <tr id="wealth_tpf_right"></tr>

                            <tr id="wealth_tsv_right"></tr>

                            <tr id="wealth_utv_right"></tr>

                    </tbody>
                    <tfoot>
                    <tr class="bg-gray-light" id="wealth_total_right">
                      

                    </tr>
                    </tfoot>
                </table>
                </div>
            </div>

        </div>
    </div>
    */ ?>
    {{--<div class="form-group col-md-12 col-sm-12 ">--}}
    {{--<ul class="pager">--}}
    {{--<li class="previous" id="backincomekyc"><a href="javascript:void(0);" class="bg-yellow-gradient"> &lt;&lt; Income KYC</a>--}}
    {{--</li>--}}
    {{--<li class="next"><a href="javascript:void(0);" id="nextpropertykyc" class="bg-yellow-gradient">Property KYC &gt;&gt; </a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}


</fieldset>

@push("scripts")
    <script type="text/javascript">
        $('#wealth_doc[type="file"]').change(function(e){
            if($("input[name=doc_hint]").val()=="")
            {
                alert("Please Select wealth")
                return false;
            }
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype","multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            form.setAttribute("target", "_blank");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#wealth_doc_form").clone(true));
            $(form).append($("#applicant_id").clone(true));
            $(form).append($("input[name=doc_hint]").clone(true));

            div = $("<div style=\"display=hidden\"></div>")

            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            $("#wealth_doc_form").find("option:selected").prop("selected", false)
        });
        $(document).ready(function(e) {
            wealth_form=[];
            wealth_form["saving"] = $("#saving").children().clone(true,true)
            wealth_form["tsv"] = $("#tsv").children().clone(true,true)
            wealth_form["utv"] = $("#utv").children().clone(true,true)
            wealth_form["tpf"] = $("#tpf").children().clone(true,true)
            wealth_form["epf"] = $("#epf").children().clone(true,true)
            $("#wealthtype").change();
        })


        $("#wealthtype").change(function (e) {
            $("#wealthkyc .box .wealthtype").addClass("hide");
            id = $(this).val();
            $("#" + id).html("").append($(wealth_form[id]).clone(true,true))
            $("#wealthkyc").find("#" + id).removeClass("hide").show();
            getDocs(id+"_p","primary_docs","primary_docs",".wealth_primary_docs","Primary Docs")
            getDocs(id+"_s","support_docs","support_docs",".wealth_support_docs","Supporting Docs")

            function getDocs(type,name,id,target,label){
                $.ajax({
                    url:"{{ route("selectoptions") }}",
                    type:"POST",
                    data:"type="+type+"&name="+name+"&id="+id+"&label="+label,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    if(response=="")
                        alert("No Document types found");
                    else
                        $(target).html("").append(response);
                });
            }
        })
        $(document.body).on("click","#saving_add",function (e) {
            $("#btn-saving").removeClass("hide");
            amount = gross = Math.round($("#saving_amount").val());
            if($("[name='saving_acctype']:checked").data("val")=="joint")
            {
                $("[name='saving_acctype']:checked").val("joint")
                amount = Math.round($("#saving_amount").val()/2);
            }
            else
            {
                $("[name='saving_acctype']:checked").val("own")
            }

            // html = "<td class=\"bg-yellow-light\">Saving</td><td>" + amount + "</td>";
            // //$("#saving_added").val("true");
            // $(".wealth_saving_right").html(html)
            //
            // totalwealthkyc();
            data = $("#saving").find(":input").serialize()+"&type=saving&total="+amount+"&gross="+gross+"&applicant_id="+$("#applicant_id").val();
            submitwealthkyc(data)
        })
        $(document.body).on("click","#epf_add", function (e) {
            $("#btn-epf").removeClass("hide");

            amount = gross = $("#epf_amount").val();
            // html = "<td class=\"bg-yellow-light\">EPF Account Balance</td><td>" + amount + "</td>";
            // $("#epf_added").val("true");
            // $(".wealth_epf_right").html(html)
            // totalwealthkyc();
            data = $("#epf").find(":input").serialize()+"&type=epf&total="+amount+"&gross="+gross+"&applicant_id="+$("#applicant_id").val();
            submitwealthkyc(data)
        })
        $(document.body).on("click","#tpf_add", function (e) {
            $("#btn-tpf").removeClass("hide");

            amount = gross = $("#tpf_amount").val();
            if($("[name='tpf_acctype']:checked").data("val")=="joint") {
                $("[name='tpf_acctype']:checked").val("joint")
                amount = Math.round($("#tpf_amount").val() / 2);
            }
            else
            {
                $("[name='tpf_acctype']:checked").val("own")
            }

            //     html = "<td class=\"bg-yellow-light\">Total Fixed Deposits</td><td>" + amount + "</td>";
            // // $("#tpf_added").val("true");
            // $(".wealth_tpf_right").html(html)
            data = $("#tpf").find(":input").serialize()+"&type=tpf&total="+amount+"&gross="+gross+"&applicant_id="+$("#applicant_id").val();
            submitwealthkyc(data)

            totalwealthkyc();
        })
        $(document.body).on("click","#tsv_add", function (e) {
            $("#btn-tsv").removeClass("hide");

            amount = gross =  $("#tsv_amount").val();
            // html = "<td class=\"bg-yellow-light\">Total Shares Value</td><td>" + amount + "</td>";
            // // $("#tsv_added").val("true");
            // $(".wealth_tsv_right").html(html)
            //
            // totalwealthkyc();
            data = $("#tsv").find(":input").serialize()+"&type=tsv&total="+amount+"&gross="+gross+"&applicant_id="+$("#applicant_id").val();
            submitwealthkyc(data)
        })
        $(document.body).on("click","#utv_add", function (e) {
            $("#btn-utv").removeClass("hide");
            amount = gross = $("#utv_amount").val();
            // html = "<td class=\"bg-yellow-light\">Unit Trust Value</td><td>" + amount + "</td>";
            // //$("#utv_added").val("true");
            // $(".wealth_utv_right").html(html)
            //
            // totalwealthkyc();
            data = $("#utv").find(":input").serialize()+"&type=utv&total="+amount+"&gross="+gross+"&applicant_id="+$("#applicant_id").val();
            submitwealthkyc(data)
        })
        $(document.body).on("click",".editwealth", function (e) {
            $("input[name=doc_hint]").val( $(this).text());
            type = $(this).data("type");
            url = $(this).data("url");
            $.ajax({
                url: url,
                type: 'GET',
                data: "type="+type,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("#wealthtype").val(type).trigger("change");
                $(".wealthtype").removeClass("hide").addClass("hide");
                $("#"+type).removeClass("hide").html("").append($(response));
            })

        })
        $(document.body).on("click",".delwealth", function (e) {
            id = $(this).data("id");
            submitwealthkyc("id="+id+"&action=delete");

        })

        function  submitwealthkyc (form_data){
            $.ajax({
                url: '{{ route('wealthkyc.store') }}',
                type: 'POST',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("#PK").attr("data-toggle","tab");
                $("input[name=doc_hint]").val("");

                $.ajax({
                    url:'{{ route("wealthkyc.wealthkyc_action_btns")}}',
                    type:"GET",
                    data:"applicant_id="+$("#applicant_id").val(),
                    headers:{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function(response){
                    $("#wealthkyc_action_btns").html("").append($(response))
                })

                $.ajax({
                url: "{{ route("applicant_sidebar") }}",
                type: "POST",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data:"applicant_id="+$("#applicant_id").val(),
                success: function (response) {
                $("#tab-3").html("").append($(response));
                $(".wealthkyc_right").html("").append($("#wealthkyc_right").html())

                },
                error: function () {

                }

                });

            })
            id = $("#wealthtype").val();
            $("#" + id).html("").append($(wealth_form[id]).clone(true,true))

        }
    </script>
@endpush