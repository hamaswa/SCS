<fieldset id="wealthkyc" class="hide">
    <div class="col-md-6 col-sm-12">
        <div class="box">

            <div class="box-header bg-yellow-light">
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <a class="bg-white padding-5 pull-left margin-r-5 d_pdf" id="d_pdf" title="CTOS Report Download"><img src="{{ asset("img/save.jpeg") }}" /></a>
                        <a class="bg-white padding-5 pull-left" href="javascript:void(0)"  onclick = "$('#wealthform').trigger('reset')"  title="Refresh"><img src="{{ asset("img/refresh.jpeg") }}" /></a>

                    </div>

                </div>
                <div class="form-group col-md-12 col-sm-12 bg-yellow-light">
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
            </div>
            <div class="box-body bg-yellow-light wealthtype" id="saving">
                <label class="col-lg-12 form-group">
                    CA & SA Balance
                </label>

                <div class="form-group col-md-12 col-sm-12">

                    <input type="text" name="saving_amount" id="saving_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" id="saving_acctype_own"> OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="saving_acctype" id="saving_acctype_ja"> JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="saving_added" id="saving_added" value="false">
                        <button type="button" id="saving_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light wealthtype hide" id="epf">
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
                        <input type="radio" name="epf_contributor_age"> >55
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="epf_contributor_age"> <55
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="epf_added" id="epf_added" value="false">
                        <button type="button" id="epf_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light wealthtype hide" id="tpf">
                <label class="col-lg-12 form-group">
                    Total Fixed Deposits
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="text" id="tpf_amount" id="tpf_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group col-md-12 col-sm-12">
                    <label class="radio-inline">
                        <input type="radio" name="tpf_acctype"> OWN
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="tpf_acctype"> JA
                    </label>
                </div>
                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tpf_added" id="tpf_added" value="false">
                        <button type="button" id="tpf_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light wealthtype hide" id="tsv">
                <label class="col-lg-12 form-group">
                    Total Shares Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="text" name="tsv_amount" id="tsv_amount" class="form-control" placeholder="">
                </div>

                <div class="form-group">
                    <div class="col-lg-12">
                        <input type="hidden" name="tsv_added" id="tsv_added" value="false">
                        <button type="button" id="tsv_add" class="btn btn-primary">ADD</button>
                    </div>
                </div>

            </div>
            <div class="box-body bg-yellow-light wealthtype hide" id="utv">
                <label class="col-lg-12 form-group">
                    Unit Trust Value
                </label>

                <div class="form-group col-md-12 col-sm-12">
                    <input type="text" name="utv_amount" id="utv_amount" class="form-control" placeholder="">
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
    <div class="col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="padding-5 bg-white pull-right border-light">
                    <img src="{{ asset("img/folder.png") }}" />
                </div>
                <div class="padding-5 bg-white pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>
                <div class="padding-5 bg-chocolate pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>
                <div class="padding-5 bg-green-gradient pull-right border-light">
                    <img src="{{ asset("img/left-icon.png") }}" />
                </div>


            </div>
            <div class="box-body bg-chocolate border-shadlebrown min-height left-box">
                <strong class="applicant"></strong>
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
                    <tr class="bg-yellow-light" id="wealth_total_right">
                      

                    </tr>
                    </tfoot>
                </table>
                <input type="hidden" name="total" id="total">
            </div>

        </div>
    </div>
    <div class="form-group col-md-12 col-sm-12 ">
        <ul class="pager">
            <li class="previous" id="backincomekyc"><a href="javascript:void(0);" class="bg-yellow-gradient"> &lt;&lt; Income KYC</a>
            </li>
            <li class="next"><a href="javascript:void(0);" id="nextpropertykyc" class="bg-yellow-gradient">Property KYC &gt;&gt; </a></li>
        </ul>
    </div>




</fieldset>

@push("scripts")
    <script type="text/javascript">
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
        $("#saving_add").click(function (e) {
            amount = $("#saving_amount").val();
             html = "<td class=\"bg-yellow-light\">" + $("#wealthtype").val() + "</td><td>"+ amount + "</td>";
            //$("#saving_added").val("true");
             $("#wealth_saving_right").html(html)

            totalwealthkyc();
        })
        $("#epf_add").click(function (e) {
            amount = $("#epf_amount").val();
            html = "<td class=\"bg-yellow-light\">" + $("#wealthtype").val() + "</td><td>"+ amount + "</td>";
            $("#epf_added").val("true");
            $("#wealth_epf_right").html(html)
            totalwealthkyc();
        })
        $("#tpf_add").click(function (e) {
            amount = $("#tpf_amount").val();
            html = "<td class=\"bg-yellow-light\">" + $("#wealthtype").val() + "</td><td>"+ amount + "</td>";
            // $("#tpf_added").val("true");
             $("#wealth_tpf_right").html(html)

            totalwealthkyc();
        })
        $("#tsv_add").click(function (e) {
            amount = $("#tsv_amount").val();
             html = "<td class=\"bg-yellow-light\">" + $("#wealthtype").val() + "</td><td>"+ amount + "</td>";
            // $("#tsv_added").val("true");
            $("#wealth_tsv_right").html(html)

            totalwealthkyc();
        })
        $("#utv_add").click(function (e) {
            amount = $("#utv_amount").val();
            html = "<td class=\"bg-yellow-light\">" + $("#wealthtype").val() + "</td><td>"+ amount + "</td>";
            //$("#utv_added").val("true");
             $("#wealth_utv_right").html(html)

            totalwealthkyc();
        })
        function totalwealthkyc(){
            amount1 = $("#utv_amount").val();
            amount2 = $("#tsv_amount").val();
            amount3 = $("#tpf_amount").val();
            amount4 = $("#epf_amount").val();
            amount5 = $("#saving_amount").val();
            // amounttotal = (amount1*1) + (amount2*1)+ (amount3*1)+ (amount4*1)+ (amount5*1)+ (amount6*1);
            amounttotal = (amount1*1) + (amount2*1)+ (amount3*1)+ (amount4*1)+ (amount5*1);
            html = "<td class=\"bg-yellow-light\">Total</td><td>"+ amounttotal + "</td>";

            $("#wealth_total_right").html(html)
            $("#total").val(amounttotal)
        }


    </script>
@endpush