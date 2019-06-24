<fieldset id="wealthkyc" class="hide">
    <div class="box col-md-8">

        <div class="box-header">
            <div class="form-group clearfix">
                <div class="col-md-4 col-sm-12">
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
        </div>
        <div class="box-body" id="saving">
            <label class="col-lg-12 form-group">
                CA & SA Balance
            </label>

            <div class="form-group col-md-4 col-sm-12">

                <input type="text" name="saving_amount" id="saving_amount" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-4 col-sm-12">

                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="saving_acctype" id="saving_acctype_own"> OWN
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="saving_acctype" id="saving_acctype_ja"> JA
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="hidden" name="saving_added" id="saving_added" value="false">
                    <button type="button" id="saving_add" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>
        <div class="box-body hide" id="epf">
            <label class="col-lg-12 form-group">
                EPF Account Balance
            </label>

            <div class="form-group col-md-4 col-sm-12">
                <label class="control-label">RM</label>
                <input type="text" name="epf_amount" id="epf_amount" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-4 col-sm-12">
                <label class="control-label">EPF Contributor Age</label>
                <div class="clearfix"></div>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="epf_contributor_age"> >55
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="epf_contributor_age"> <55
                    </label>
                </div>

            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="hidden" name="epf_added" id="epf_added" value="false">
                    <button type="button" id="epf_add" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>
        <div class="box-body hide" id="tpf">
            <label class="col-lg-12 form-group">
                Total Fixed Deposits
            </label>

            <div class="form-group col-md-4 col-sm-12">
                <input type="text" id="tpf_amount" id="tpf_amount" class="form-control" placeholder="">
            </div>

            <div class="form-group col-md-4 col-sm-12">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="tpf_acctype"> OWN
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="tpf_acctype"> JA
                    </label>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-12">
                    <input type="hidden" name="tpf_added" id="tpf_added" value="false">
                    <button type="button" id="tpf_add" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>
        <div class="box-body hide" id="tsv">
            <label class="col-lg-12 form-group">
                Total Shares Value
            </label>

            <div class="form-group col-md-4 col-sm-12">
                <input type="text" name="tsv_amount" id="tsv_amount" class="form-control" placeholder="">
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <input type="hidden" name="tsv_added" id="tsv_added" value="false">
                    <button type="button" id="tsv_add" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>
        <div class="box-body hide" id="utv">
            <label class="col-lg-12 form-group">
                Unit Trust Value
            </label>

            <div class="form-group col-md-4 col-sm-12">
                <input type="text" name="utv_amount" id="utv_amount" class="form-control" placeholder="">
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <input type="hidden" name="utv_added" id="utv_added" value="false">
                    <button type="button" id="utv_add" class="btn btn-primary">ADD</button>
                </div>
            </div>

        </div>


        <div class="box-footer">
            <div class="form-group col-md-12 col-sm-12 ">
                <ul class="pager">
                    <li class="previous" id="backincomekyc"><a href="javascript:void(0);" class="bg-blue">Previous</a>
                    </li>
                    <li class="next"><a href="javascript:void(0);" id="nextpropertykyc" class="bg-blue">Next</a></li>
                </ul>
                {{--<button type="button" id="backincomekyc" class="btn btn-primary pull-right">Previous</button>--}}
                {{--<button type="button" id="nextpropertykyc" class="btn btn-primary pull-right">Next</button>--}}
            </div>
        </div>


    </div>
    <div class="box col-md-12 col-sm-12">
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-light-blue">
            <tr>
                <th>Saving</th>
                <th>EPF Account Balance</th>
                <th>Total Fixed Deposits</th>
                <th>Total Shares Value</th>
                <th>Unit Trust Value</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td id="wealth_saving_right"></td>
                <td id="wealth_epf_right"></td>
                <td id="wealth_tpf_right"></td>
                <td id="wealth_tsv_right"></td>
                <td id="wealth_utv_right"></td>
                <td id="wealth_total_right"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <input type="hidden" name="total" id="total">


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
            $("#wealthkyc .box .box-body").addClass("hide");
            id = $(this).val();
            $("#wealthkyc").find("#" + id).removeClass("hide").show();
        })

        $("#saving_add").click(function (e) {
            amount = $("#saving_amount").val();
            // html = "<span>" + $("#wealthtype").val() + "</span><span>"+ amount + "</sapn>";
            $("#saving_added").val("true");
            // $("#wealth_saving_right").html(html)
            $("#wealth_saving_right").text(amount)
            totalwealthkyc();

        })

        $("#epf_add").click(function (e) {
            amount = $("#epf_amount").val();
            // html = "<span>" + $("#wealthtype").val() + "</span><span>"+ amount + "</sapn>";
            $("#epf_added").val("true");
            $("#wealth_epf_right").html(amount)
            totalwealthkyc();

        })
        $("#tpf_add").click(function (e) {
            amount = $("#tpf_amount").val();
            // html = "<span>" + $("#wealthtype").val() + "</span><span>"+ amount + "</sapn>";
            $("#tpf_added").val("true");
            // $("#wealth_tpf_right").html(html)
            $("#wealth_tpf_right").html(amount)
            totalwealthkyc();

        })

        $("#tsv_add").click(function (e) {
            amount = $("#tsv_amount").val();
            // html = "<span>" + $("#wealthtype").val() + "</span><span>"+ amount + "</sapn>";
            $("#tsv_added").val("true");
            // $("#wealth_tsv_right").html(html)
            $("#wealth_tsv_right").html(amount)
            totalwealthkyc();

        })


        $("#utv_add").click(function (e) {
            amount = $("#utv_amount").val();
            // html = "<span>" + $("#wealthtype").val() + "</span><span>"+ amount + "</sapn>";
            $("#utv_added").val("true");
            // $("#wealth_utv_right").html(html)
            $("#wealth_utv_right").html(amount)
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


            $("#wealth_total_right").html(amounttotal)
            $("#total").val(amounttotal)
        }


    </script>
@endpush