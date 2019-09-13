<fieldset id="wealthkyc" class="tab-action-main">

    <?php
   // $data = json_decode($wealth->form_data);
    ?>
    <div class="col-md-6 col-sm-12 col-lg-6 col-lg-offset-1">
        <div class="box">

            <div class="box-header bg-gray-light">
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>

                </div>
                <div class="form-group col-md-12 col-sm-12 bg-gray-light" id="com_wealth_doc_form">
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                    <label class="control-label">Type</label>
                    @include("layouts.select", ['name'=>'wealthtype','id'=>'wealthtype','type'=>'com_wealth_type','options'=>$options,'class'=>'form-control select2'])

                </div>
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                    <label class="control-label">Primary Docs</label>
                    @include("layouts.select", ['name'=>'primary_doc','id'=>'primary_doc','type'=>'com_wealth_primary_docs','options'=>$options,'class'=>'form-control select2'])


                </div>
                <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                    <label class="control-label">Supporting Docs</label>

                    @include("layouts.select", ['name'=>'support_doc','id'=>'support_doc','type'=>'com_wealth_support_docs','options'=>$options,'class'=>'form-control select2'])

                </div>
                    <div class="form-group col-md-4 col-sm-3 bg-gray-light pull-right">

                        <input type="file" class="form-control btn btn-primary" name="wealth_doc" id="com_wealth_doc" />
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
                    // $wealth->form_data = json_decode($wealth->form_data)
                    ?>
                    {{--@include("aadata.right_info_wealth")--}}

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

                            <tr id="com_wealth_saving_right"></tr>

                            <tr id="com_wealth_epf_right"></tr>

                            <tr id="com_wealth_tpf_right"></tr>

                            <tr id="com_wealth_tsv_right"></tr>

                            <tr id="com_wealth_utv_right"></tr>

                    </tbody>
                    <tfoot>
                    <tr class="bg-gray-light" id="com_wealth_total_right">
                      

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

        $('#com_wealth_doc[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype","multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            form.setAttribute("target", "_blank");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#com_wealth_doc_form").clone(true));
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
            $(".com_wealth_saving_right").html(html)

            totalwealthkyc();
        })
        $("#epf_add").on('click', function (e) {
            $("#btn-epf").removeClass("hide");

            amount = $("#epf_amount").val();
            html = "<td class=\"bg-yellow-light\">EPF Account Balance</td><td>" + amount + "</td>";
            $("#epf_added").val("true");
            $(".com_wealth_epf_right").html(html)
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
            $(".com_wealth_tpf_right").html(html)

            totalwealthkyc();
        })
        $("#tsv_add").on('click', function (e) {
            $("#btn-tsv").removeClass("hide");

            amount = $("#tsv_amount").val();
            html = "<td class=\"bg-yellow-light\">Total Shares Value</td><td>" + amount + "</td>";
            // $("#tsv_added").val("true");
            $(".com_wealth_tsv_right").html(html)

            totalwealthkyc();
        })
        $("#utv_add").on('click', function (e) {
            $("#btn-utv").removeClass("hide");

            amount = $("#utv_amount").val();
            html = "<td class=\"bg-yellow-light\">Unit Trust Value</td><td>" + amount + "</td>";
            //$("#utv_added").val("true");
            $(".com_wealth_utv_right").html(html)

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

            $(".com_wealth_total_right").html(html)
            $("#total").val(amounttotal)
            $(".wealthkyc_right").html($("#wealthkyc_right").html());
            submitwealthkyc();
        }


    </script>
@endpush