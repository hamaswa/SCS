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
                <div id="wealthkyc_action_btns" class="col-lg-12 col-md-12 col-sm-12">
                    @include("aadata.wealthkyc_action_btns",["wealths"=>$applicant_data->applicantWealth()->get()])
                </div>
                <div class="form-group col-md-12 col-sm-12 bg-gray-light" id="com_wealth_doc_form">
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Type</label>
                        @include("layouts.select", [
                        'name'=>'wealthtype',
                        'id'=>'wealthtype',
                        'type'=>'com_wealth_type',
                        'options'=>$options,
                        ])

                    </div>
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Primary Docs</label>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'type'=>'com_wealth_primary_docs',
                        'options'=>$options,
                        'default'=>"Select Primary Document",])


                    </div>
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Supporting Docs</label>

                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'type'=>'com_wealth_support_docs',
                        'options'=>$options,
                        'default'=>"Select Supporting Document",])

                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                       <textarea name="guide_lines" class="form-control editor">

                        </textarea></div>
                    <div class="form-group col-md-4 col-sm-3 bg-gray-light pull-right">

                        <input type="file" class="form-control btn btn-primary" name="wealth_doc[]" multiple
                               id="com_wealth_doc"/>
                    </div>
                </div>
                <div class="form-group col-md-12 col-sm-12" id="bankstatement">
                    <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-gray-light">Bank Statement</label>
                    <div class="form-group col-md-12 col-sm-12">

                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value"></label>

                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Credited</label>

                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Balance</label>

                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">


                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month1</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month1_credited" class="form-control credited"
                                   id="month1_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month1_balance" class="form-control balance" id="month1_balance">
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12">


                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month2</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month2_credited" class="form-control credited"
                                   id="month2_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month2_balance" class="form-control balance" id="month2_balance">
                        </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12">


                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month3</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month3_credited" class="form-control credited"
                                   id="month3_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month3_balance" class="form-control balance" id="month3_balance">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">


                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month4</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month4_credited" class="form-control credited"
                                   id="month4_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month4_balance" class="form-control balance" id="month4_balance">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month5</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month5_credited" class="form-control credited"
                                   id="month5_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month5_balance" class="form-control balance" id="month5_balance">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">


                        <div class="form-group col-md-4 col-sm-4">
                            <label for="market_value">Month6</label>
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month6_credited" class="form-control credited"
                                   id="month6_credited">
                        </div>
                        <div class="form-group col-md-4 col-sm-4">
                            <input type="number" name="month6_balance" class="form-control balance" id="month6_balance">
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <button type="button" id="add_company_wealth" class="btn btn-primary">ADD</button>
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

        $('#com_wealth_doc[type="file"]').change(function (e) {
            if ($("input[name=doc_hint]").val() == "") {
                alert("Please Select wealth")
                return false;
            }
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("enctype", "multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            form.setAttribute("target", "_blank");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#com_wealth_doc_form").clone(true));
            $(form).append($("#applicant_id").clone(true));
            $(form).append($("input[name=doc_hint]").clone(true));

            div = $("<div style=\"display=hidden\"></div>")

            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            $("#com_wealth_doc_form").find("option:selected").prop("selected", false)

        });

        $(document).ready(function (e) {
            wealth_form = [];
            wealth_form["bankstatement"] = $("#bankstatement").children().clone(true, true)


        })
        $("#wealthtype").change(function (e) {
            $("#wealthkyc .box .wealthtype").addClass("hide");
            id = $(this).val();
            $("#" + id).html("").append($(wealth_form[id]).clone(true, true))
            $("#wealthkyc").find("#" + id).removeClass("hide").show();
            getDocs(id + "_p", "primary_docs", "primary_docs", ".primary_docs", "Primary Docs")
            getDocs(id + "_s", "support_docs", "support_docs", ".support_docs", "Supporting Docs")

            function getDocs(type, name, id, target, label) {
                $.ajax({
                    url: "{{ route("selectoptions") }}",
                    type: "POST",
                    data: "type=" + type + "&name=" + name + "&id=" + id + "&label=" + label,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    if (response == "")
                        alert("No Document types found");
                    else
                        $(target).html("").append(response);
                });
            }
        })
        $(document.body).on("click", "#add_company_wealth", function (e) {
            var credited_total = 0;
            var balance_total = 0;
            var bi = 0;
            var ci = 0;

            $(":input.balance").each(function () {
                balance_total += Number($(this).val());
                bi++
            });
            $(":input.credited").each(function () {
                credited_total += Number($(this).val());
                ci++
                // Could be written as
                // tot += +this.value;
            });

            var credited_avg = credited_total / ci;
            var balance_avg = balance_total / bi;

            data = $("#bankstatement").find(":input").serialize() + "&type=" + $("#wealthtype").val() + "&total=" + balance_avg + "&gross=" + credited_avg + "&applicant_id=" + $("#applicant_id").val();
            submitwealthkyc(data)
        })

        $(document.body).on("click", ".editwealth", function (e) {
            $("input[name=doc_hint]").val($(this).text());
            type = $(this).data("type");
            url = $(this).data("url");
            $.ajax({
                url: url,
                type: 'GET',
                data: "type=" + type,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("#wealthtype").val(type).trigger("change");
                $(".wealthtype").removeClass("hide").addClass("hide");
                $("#bankstatement").removeClass("hide").html("").append($(response));
            })

        })
        $(document.body).on("click", ".delwealth", function (e) {
            id = $(this).data("id");
            submitwealthkyc("id=" + id + "&action=delete");

        })

        function submitwealthkyc(form_data) {
            $.ajax({
                url: '{{ route('wealthkyc.store') }}',
                type: 'POST',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("input[name=doc_hint]").val("");

                $.ajax({
                    url: '{{ route("wealthkyc.wealthkyc_action_btns")}}',
                    type: "GET",
                    data: "applicant_id=" + $("#applicant_id").val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    $("#wealthkyc_action_btns").html("").append($(response))
                })

                $.ajax({
                    url: "{{ route("applicant_sidebar") }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    data: "applicant_id=" + $("#applicant_id").val(),
                    success: function (response) {
                        $("#tab-3").html("").append($(response));
                        $(".wealthkyc_right").html("").append($("#wealthkyc_right").html())

                    },
                    error: function () {

                    }

                });

            })
            id = $("#wealthtype").val();
            $("#bankstatement").html("").append($(wealth_form["bankstatement"]).clone(true, true))

        }


    </script>
@endpush