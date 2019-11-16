<fieldset id="incomekyc" class=" tab-action-main">
    <div class="col-lg-6 col-lg-offset-1 col-md-6 col-sm-12">
        <div class="box">
            <div class="box-header bg-gray-light">
                <div class="form-group col-md-12 bg-gray padding-5">
                    <div class="col-md-5 col-sm-12 bg-white">
                        <strong class="padding-5 pull-left margin-r-5 applicant"></strong>
                    </div>
                    <?php
                    //$data = json_decode($income->form_data, true);
                    ?>
                </div>
                <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn" id="btn-salary">
                    <button type="button" class="btn btn-default btn-flat addebitda"
                    >+Income</button>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu position-relative" id="" role="menu">

                    </ul>

                </div>
                <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn" id="btn-salary">
                    <button type="button" class="btn btn-default btn-flat addpayment"
                    >+Payment</button>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu position-relative" id="" role="menu">

                    </ul>

                </div>
                <div id="incomekyc_action_btns" class="col-lg-12 col-md-12 col-sm-12">
                    @include("aadata.incomekyc_action_btns",["incomes"=>$applicant_data->applicantIncome()->get()])
                </div>
                <div class="col-md-12 col-sm-12 bg-gray-light" id="com_income_doc_form">
                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Type</label>
                        @include("layouts.select", [
                        'name'=>'incometype','id'=>'incometype',
                        'type'=>'com_income_types','options'=>$options])

                    </div>

                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Primary Docs</label>
                        @include("layouts.select", [
                        'name'=>'primary_doc',
                        'id'=>'primary_doc',
                        'type'=>'com_income_primary_docs',
                        'default'=>"Select Primary Document",
                        'options'=>$options
                        ])

                    </div>

                    <div class="form-group col-md-4 col-sm-4 bg-gray-light">
                        <label class="control-label">Supporting Docs</label>
                        @include("layouts.select", [
                        'name'=>'support_doc',
                        'id'=>'support_doc',
                        'type'=>'com_income_support_docs',
                        'default'=>"Select Supporting Document",
                        'options'=>$options])
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                       <textarea name="guide_lines" class="form-control editor">

                        </textarea></div>
                    <div class="form-group col-md-4 col-sm-3 pull-right">
                        <input type="file" class="form-control btn btn-primary" name="income_doc[]" multiple
                               id="com_income_doc"/>
                    </div>
                </div>
                <div class="form-group col-md-12 col-sm-12">
                <div class="form-group col-md-6 col-sm-6" id="ebitda">
                    <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-gray-light">EBITDA</label>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Net Profit Before Tax</label>
                        <input type="number" name="net_profit_before_tax" class="form-control"
                               id="net_profit_before_tax">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Interest Expense</label>
                        <input type="number" name="interest_expense" class="form-control" id="interest_expense">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Depreciation</label>
                        <input type="number" name="depreciation" class="form-control" id="depreciation">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Others</label>
                        <input type="number" name="others" class="form-control" id="others">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <button type="button" id="add_company_income" data-target="ebitda" class="btn btn-primary">ADD</button>
                    </div>
                </div>
                <div class="form-group col-md-6 col-sm-6" id="payments">
                    <label class="col-lg-12 col-md-12 col-sm-12 form-group bg-gray-light">Payments</label>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Leasing</label>
                        <input type="number" name="leasing" class="form-control"
                               id="leasing">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Non Bank</label>
                        <input type="number" name="non_bank" class="form-control" id="non_bank">
                    </div>

                    <div class="form-group col-md-12 col-sm-12">
                        <label for="market_value">Others</label>
                        <input type="number" name="others" class="form-control" id="others">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <button type="button" id="add_company_income" data-target="payments" class="btn btn-primary">ADD</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12 bg-chocolate border-shadlebrown">
        <div class="box">
            <div class="box-body bg-chocolate min-height left-box">
                <strong class="applicant"></strong>
                <div class="table-responsive incomekyc_right">


                </div>
            </div>

        </div>
    </div>


</fieldset>
@push("scripts")
    <script type="text/javascript">
        $(document).ready(function (e) {
            income_form = [];
            income_form["ebitda"] = $("#ebitda").children().clone(true, true)
            income_form["payments"] = $("#payments").children().clone(true, true)
            $("#incometype").change();
            $.ajax({
                url: "{{ route("comments") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id={{$applicant->id}}",
                success: function (response) {
                    $("#tab-2").html(response);
                },
                error: function () {

                }

            });
            $.ajax({
                url: "{{ route("documents") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id={{$applicant->id}}",
                success: function (response) {
                    $("#tab-1").html(response);

                },
                error: function () {

                }
            });
            $.ajax({
                url: "{{ route("applicant_sidebar") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + $("#applicant_id").val(),
                success: function (response) {
                    $("#tab-3").html("").append($(response));
                    $(".incomekyc_right").html("").append($("#incomekyc_right").html())
                    $(".wealthkyc_right").html("").append($("#wealthkyc_right").html())
                    $(".propertykyc_right").html("").append($("#propertykyc_right").html())
                },
                error: function () {

                }

            });
        })

        $('#com_income_doc[type="file"]').change(function (e) {
            if ($("input[name=doc_hint]").val() == "") {
                alert("Please Select income")
                return false;
            }
            var fileName = e.target.files[0].name;
            form = document.createElement("form");
            form.setAttribute("method", "post");
            form.setAttribute("target", "_blank");
            form.setAttribute("enctype", "multipart/form-data")
            form.setAttribute("action", "{{ route("documents.store") }}");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#com_income_doc_form").clone(true));
            $(form).append($("#applicant_id").clone(true));
            $(form).append($("input[name=doc_hint]").clone(true));
            div = $("<div style=\"display=hidden\"></div>")
            $(div).append(form)
            document.body.appendChild(form);
            form.submit();
            form.remove();
            $("#com_income_doc_form").find("option:selected").prop("selected", false)

        });

        $("#incometype").change(function (e) {
            $("#incomekyc .box .incometype").addClass("hide");
            id = $(this).val();
            $("#incomekyc").find("#" + id).removeClass("hide").show();
        })
        $(".incomekyc-action-btn button.view").on("click", function (e) {
            $("#incometype").val($(this).data("value")).trigger("change");
        })

        $(document.body).on("click", "#add_company_income", function (e) {
            var gross = 0;
            sub_type=$(this).data("target");
            $("#"+sub_type+" :input").each(function () {
                gross += Number($(this).val());

            });

            data = $("#"+sub_type).find(":input").serialize() + "&sub_type="+sub_type+"&type=" + $("#incometype").val() + "&form=company_income&applicant_id=" + $("#applicant_id").val() + "&gross=" + gross;
            submitincomekyc(data)
            $("#"+sub_type).html("").append($(income_form[sub_type]).clone(true, true))
           // $("#payments").html("").append($(income_form["ebitda"]).clone(true, true))
            e.preventDefault();
        });
        $(document.body).on("click", ".editincome", function (e) {
            $("input[name=doc_hint]").val($(this).text());
            type = $(this).data("type");
            sub_type = $(this).data("sub_type");
            url = $(this).data("url");
            $.ajax({
                url: url,
                type: 'GET',
                data: "type=" + type,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("#incometype").val(type).trigger("change");
                $(".incometype").removeClass("hide").addClass("hide");
                $("#"+sub_type).removeClass("hide").html("").append($(response));
            })

        })

        $(document.body).on("click", ".delincome", "click", function (e) {
            id = $(this).data("id");
            submitincomekyc("id=" + id + "&action=delete");
        })

        function submitincomekyc(form_data) {
            $.ajax({
                url: '{{ route('incomekyc.store') }}',
                type: 'POST',
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                $("input[name=doc_hint]").val("");

                $.ajax({
                    url: '{{ route("incomekyc.incomekyc_action_btns")}}',
                    type: "GET",
                    data: "applicant_id=" + $("#applicant_id").val(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                }).done(function (response) {
                    $("#incomekyc_action_btns").html("").append($(response))
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
                        $(".incomekyc_right").html("").append($("#incomekyc_right").html())

                    },
                    error: function () {

                    }

                });

                //$("#incomekyc .box .incometype").addClass("hide");
                id = $("#incometype").val();

                // $("#" + id).removeClass("hide").show();

            })

        }

    </script>
@endpush