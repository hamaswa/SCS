<fieldset id="wealthkyc" class="tab-action-main">
    {{--<div class="col-md-2 col-sm-3">--}}
    {{--<a href="javascript:void(0);" data-id="applicantkyc" id="backapplicantkyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1">APPLICATION <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="incomekyc" id="backincomekyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br>INCOME <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="wealthkyc" id="nextwealthkyc" class="bg-gray-light padding-5 pull-left vericaltext tab-action border-black-1"><br><br>WEALTH <br> KYC</a>--}}
    {{--<a href="javascript:void(0);" data-id="propertykyc" id="nextpropertykyc" class="bg-white padding-5 pull-left vericaltext tab-action border-black-1"><br><br><br>PROPERTY <br> KYC</a>--}}
    {{--</div>--}}
    <?php
    $data = json_decode($wealth->form_data);
    print_r($data->saving_amount)    ?>
    <div class="col-md-6 col-sm-12 col-lg-6 col-lg-offset-1">
        <div class="box">

            <div class="box-header bg-gray-light">
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
                <div id="" class="col-lg-12 col-md-12 col-sm-12">
                    <div class="btn-group margin-bottom border-black-1 {{ (isset($data->saving_amount)?"":"hide") }} wealthkyc-action-btn"
                         id="btn-saving">
                        <button type="button" class="btn btn-default btn-flat view" data-value="saving">Saving</button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-number="0" class="editwealth">Edit</a></li>
                            <li><a href="#" data-number="0" data-value="saving" data-right="wealth_saving_right"
                                   data-action="saving_add"
                                   class="delwealth">Delete</a></li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 {{ (isset($data->epf_amount)?"":"hide") }} wealthkyc-action-btn"
                         id="btn-epf">
                        <button type="button" class="btn btn-default btn-flat view" data-value="epf">EPF Account
                            Balance
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-number="0" class="editwealth">Edit</a></li>
                            <li><a href="#" data-number="0" data-value="epf" data-action="epf_add"
                                   data-right="wealth_epf_right" class="delwealth">Delete</a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 {{ (isset($data->tpf_amount)?"":"hide") }} wealthkyc-action-btn"
                         id="btn-tpf">
                        <button type="button" class="btn btn-default btn-flat view" data-value="tpf">Total Fixed
                            Deposits
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-number="0" class="editwealth">Edit</a></li>
                            <li><a href="#" data-number="0" data-value="tpf" data-action="tpf_add"
                                   data-right="wealth_tpf_right" class="delwealth">Delete</a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 {{ (isset($data->tsv_amount)?"":"hide") }} wealthkyc-action-btn"
                         id="btn-tsv">
                        <button type="button" class="btn btn-default btn-flat view" data-value="tsv">Total Shares
                            Value
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-number="0" class="editwealth">Edit</a></li>
                            <li><a href="#" data-number="0" data-value="tsv" data-action="tsv_add"
                                   data-right="wealth_tsv_right" class="delwealth">Delete</a>
                            </li>
                        </ul>
                    </div>

                    <div class="btn-group margin-bottom border-black-1 {{ (isset($data->utv_amount)?"":"hide") }} wealthkyc-action-btn"
                         id="btn-utv">
                        <button type="button" class="btn btn-default btn-flat view" data-value="utv">Unit Trust Value
                        </button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                                aria-expanded="false">
                            <i class="fa fa-list"></i>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu position-relative" id="" role="menu">
                            <li><a href="#" data-number="0" class="editwealth">Edit</a></li>
                            <li><a href="#" data-number="0" data-value="utv" data-action="utv_add"
                                   data-right="wealth_utv_right" class="delwealth">Delete</a>
                            </li>
                        </ul>
                    </div>


                </div>
                <div class="form-group col-md-12 col-sm-12 bg-gray-light" id="wealth_doc_form">
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">
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
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">

                    <select name="primary_doc" id="primary_doc"  class="form-control select2">
                        @foreach($wealth_primary_docs as $doc)
                            <option value="{{$doc->name}}">
                                {{ $doc->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">

                    <select name="support_doc" id="support_doc"  class="form-control select2">
                        @foreach($wealth_support_docs as $doc)
                            <option value="{{$doc->name}}">
                                {{ $doc->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group col-md-4 col-sm-3 bg-gray-light pull-right">

                        <input type="file" name="wealth_doc" id="wealth_doc" />
                    </div>
                </div>
            </div>
            <div class="box-body bg-gray-light wealthtype" id="saving">
                <label class="col-lg-12 form-group">
                    CA & SA Balance
                </label>

                <div class="form-group col-md-12 col-sm-12">

                    <input type="number" name="saving_amount"
                           value="{{ (isset($data->saving_amount)?$data->saving_amount:"") }}" id="saving_amount"
                           class="form-control">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" data-val="own" value="own"
                               {{ (isset($data->saving_acctype) and $data->saving_acctype=='own')?"checked=checked":"" }}   id="saving_acctype_own">
                        OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" data-val="joint" value="joint"
                               {{ (isset($data->saving_acctype) and $data->saving_acctype=='joint')?"checked=checked":"" }}      id="saving_acctype_ja">
                        JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="saving_added" id="saving_added"
                               value="{{ (isset($data->saving_added)?$data->saving_added:"false") }}">
                        <button type="button" id="saving_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="epf">
                <label class="col-lg-12 form-group">
                    EPF Account Balance
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">RM</label>
                    <input type="text" name="epf_amount" value="{{ (isset($data->epf_amount)?$data->epf_amount:"") }}"
                           id="epf_amount" class="form-control">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="control-label">EPF Contributor Age</label>
                    <div class="clearfix"></div>
                    <label class="radio-inline">
                        <input type="radio" value="> 55"
                               {{ (isset($data->epf_contributor_age) and $data->epf_contributor_age=="> 55")?"checked=checked":"" }}  name="epf_contributor_age">
                        >55
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="< 55"
                               {{ (isset($data->epf_contributor_age) and $data->epf_contributor_age=="< 55")?"checked=checked":"" }}  name="epf_contributor_age">
                        <55
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="epf_added" id="epf_added"
                               value="{{ (isset($data->epf_added)?$data->epf_added:"false") }}">
                        <button type="button" id="epf_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="tpf">
                <label class="col-lg-12 form-group">
                    Total Fixed Deposits
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="tpf_amount"
                           value="{{ (isset($data->tpf_amount)?$data->tpf_amount:"") }}" id="tpf_amount"
                           class="form-control">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" value="own" data-val="own" name="tpf_acctype"
                               {{ (isset($data->tpf_acctype) and $data->tpf_acctype=='own')?"checked=checked":"" }} id="tpf_acctype_own">
                        OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" value="joint" data-val="joint" name="tpf_acctype"
                               {{ (isset($data->tpf_acctype) and $data->tpf_acctype=='joint')?"checked=checked":"" }} id="tpf_acctype_ja">
                        JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tpf_added" id="tpf_added"
                               value="{{ (isset($data->tpf_added)?$data->tpf_added:"false") }}">
                        <button type="button" id="tpf_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="tsv">
                <label class="col-lg-12 form-group">
                    Total Shares Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="tsv_amount"
                           value="{{ (isset($data->tsv_amount)?$data->tsv_amount:"") }}" id="tsv_amount"
                           class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tsv_added" id="tsv_added"
                               value="{{ (isset($data->tsv_added)?$data->tsv_added:"") }}">
                        <button type="button" id="tsv_add" class="btn btn-primary">Update</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-gray-light wealthtype hide" id="utv">
                <label class="col-lg-12 form-group">
                    Unit Trust Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="number" name="utv_amount"
                           value="{{ (isset($data->utv_amount)?$data->utv_amount:"") }}" id="utv_amount"
                           class="form-control">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="utv_added" id="utv_added"
                               value="{{ (isset($data->utv_added)?$data->utv_added:"") }}">
                        <button type="button" id="utv_add" class="btn btn-primary">Update</button>
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
                    <?php
                     $wealth->form_data = json_decode($wealth->form_data)
                    ?>
                    @include("aadata.right_info_wealth")

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
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype","multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#wealth_doc_form").clone(true));
            $(form).append($("#applicant_id").clone(true));

            div = $("<div style=\"display=hidden\"></div>")

            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
        });

        $("#backincomekyc").click(function (e) {
            $("#wealthkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })
        $("#nextpropertykyc").click(function (e) {
            $("#propertykyc").removeClass('hide');
            $("#wealthkyc").addClass('hide');
        });
        $("#wealthtype").change(function (e) {
            $("#wealthkyc .box .wealthtype").addClass("hide");
            id = $(this).val();
            $("#wealthkyc").find("#" + id).removeClass("hide").show();
        })

        $(".wealthkyc-action-btn button.view").on("click", function (e) {
            $("#wealthtype").val($(this).data("value")).trigger("change");
        })
        $("#saving_add").click(function (e) {
            $("#btn-saving").removeClass("hide");
            amount = Math.round($("#saving_amount").val());
            if($("[name='saving_acctype']:checked").data("val")=="joint")
            {
                $("[name='saving_acctype']:checked").val("joint")
                amount = Math.round($("#saving_amount").val()/2);
            }
            else
            {
                $("[name='saving_acctype']:checked").val("own")
            }
            html = "<td class=\"bg-yellow-light\">Saving</td><td>" + amount + "</td>";
            //$("#saving_added").val("true");
            $(".wealth_saving_right").html(html)

            totalwealthkyc();
        })
        $("#epf_add").on('click', function (e) {
            $("#btn-epf").removeClass("hide");

            amount = $("#epf_amount").val();
            html = "<td class=\"bg-yellow-light\">EPF Account Balance</td><td>" + amount + "</td>";
            $("#epf_added").val("true");
            $(".wealth_epf_right").html(html)
            totalwealthkyc();
        })
        $("#tpf_add").on('click', function (e) {
            $("#btn-tpf").removeClass("hide");

            amount = $("#tpf_amount").val();
            if($("[name='tpf_acctype']:checked").data("val")=="joint") {
                $("[name='tpf_acctype']:checked").val("joint")
                amount = Math.round($("#tpf_amount").val() / 2);
            } else
            {
                $("[name='tpf_acctype']:checked").val("own")
            }


            html = "<td class=\"bg-yellow-light\">Total Fixed Deposits</td><td>" + amount + "</td>";
            // $("#tpf_added").val("true");
            $(".wealth_tpf_right").html(html)

            totalwealthkyc();
        })
        $("#tsv_add").on('click', function (e) {
            $("#btn-tsv").removeClass("hide");

            amount = $("#tsv_amount").val();
            html = "<td class=\"bg-yellow-light\">Total Shares Value</td><td>" + amount + "</td>";
            // $("#tsv_added").val("true");
            $(".wealth_tsv_right").html(html)

            totalwealthkyc();
        })
        $("#utv_add").on('click', function (e) {
            $("#btn-utv").removeClass("hide");

            amount = $("#utv_amount").val();
            html = "<td class=\"bg-yellow-light\">Unit Trust Value</td><td>" + amount + "</td>";
            //$("#utv_added").val("true");
            $(".wealth_utv_right").html(html)

            totalwealthkyc();
        })

        $(".editwealth").on("click", function (e) {
            $("#wealthkyc .box .incometype").addClass("hide");
            id = $(this).data("value");
            $("#" + id).removeClass("hide");

        })

        $(".delwealth").on("click", function (e) {
            id = $(this).data("value");
            $("#" + id).find(" :input").not("[type='radio'],select,[type='checkbox']").val(0);
            $("#" + $(this).data("action")).trigger("click");
            $("." + $(this).data("right")).html("")
            $(this).parent("li").parent("ul").parent("div").addClass('hide');

        })


        function totalwealthkyc() {
            amount1 = $("#utv_amount").val();
            amount2 = $("#tsv_amount").val();
            amount3 = $("#tpf_amount").val();
            if ($("[name='tpf_acctype']:checked").data("val") == "joint")
                amount3 = Math.round($("#tpf_amount").val() / 2);
            amount4 = $("#epf_amount").val();
            amount5 = $("#saving_amount").val();
            if ($("[name='saving_acctype']:checked").data("val") == "joint")
                amount5 = Math.round($("#saving_amount").val() / 2);
            // amounttotal = (amount1*1) + (amount2*1)+ (amount3*1)+ (amount4*1)+ (amount5*1)+ (amount6*1);
            amounttotal = Math.round((amount1 * 1) + (amount2 * 1) + (amount3 * 1) + (amount4 * 1) + (amount5 * 1));
            if (amounttotal == 0)
                html = "";
            else
                html = "<td class=\"bg-yellow-light\">Total</td><td>" + amounttotal + "</td>";

            $(".wealth_total_right").html(html)
            $("#total").val(amounttotal)
            $(".wealthkyc_right").html($("#wealthkyc_right").html());
            submitwealthkyc();
        }


    </script>
@endpush