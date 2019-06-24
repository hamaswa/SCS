<fieldset id="applicantkyc">
    <div class="box">
        <div class="box-header">
            {{--<legend><a class="btn btn-app">--}}
                    {{--<i onclick="$('#upload').click()" class="fa fa-upload"></i> Upload Form</a>--}}
                {{--<div style="display:none"><input type="file" name="doc" id="upload"></div>--}}
                {{--<a class="btn btn-app"><i class="fa fa-refresh"></i> Refresh</a>--}}
                {{--<a class="btn btn-app" id="d_pdf"><i class="fa fa-download"></i> CTOS Report</a>--}}
            {{--</legend>--}}
        </div>
        <div class="box-body">
            <div class="form-group clearfix">
                <div class="col-md-4 col-sm-12">
                    <label class="control-label">Type</label>
                    <select id="aacategory" class="form-control select2" name="aacategory" style="width: 100%;">
                        <option value="C">
                            Company
                        </option>
                        <option value="I">
                            Individual
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label id="name_label" class="control-label">Full Name as per NRIC/Passport</label>
                <input name="name" id="name" placeholder="" class="form-control" type="text">

            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label id="unique_id_label" class="control-label">NRIC No. / Passport No. (e.g. 1234567890123)</label>
                <input name="unique_id" id="unique_id" placeholder="" class="form-control" type="text">
            </div>
            <div class="form-group col-md-4 col-sm-12">
                <label class="control-label">Mobile Number (e.g. 60121234567 / 6512345678)</label>
                <input name="mobile" id="mobile" placeholder="" class="form-control" type="text">
            </div>

        </div>
        <div class="box-footer">
            <div class="form-group col-md-12">
                <ul class="pager">
                    <li class="next"><a href="javascript:void(0);" id="nextincomekyc" class="bg-blue">Next</a></li>
                </ul>
                {{--<div class="col-md-12">--}}
                    {{--<button type="button" id="nextincomekyc" class="btn btn-primary">--}}
                        {{--Next--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>


</fieldset>

@push("scripts")
    <script type="text/javascript">
        $("#d_pdf").click(function(e) {
            form = document.createElement("form");
            form.setAttribute("method","post");
            form.setAttribute("action","{{ route("downloadpdf") }}");
            csrf = $('{{ csrf_field() }}')
            $(form).append(csrf);
            $(form).append($("#name").clone())
            $(form).append($("#unique_id").clone())
            type= document.createElement("input");
            type.setAttribute("name","aacategory");
            type.value = $("#aacategory").val()
            $(form).append($(type))
            document.body.appendChild(form);
            form.submit();
        });
        $("#nextincomekyc").click(function (e) {
            $("#applicantkyc").addClass("hide");
            $("#incomekyc").removeClass("hide");
        })


        $("#aacategory").change(function (e) {
            if ($(this).val() == 'C') {
                $("#name_label").text("Company Name");
                $("#unique_id_label").text("Company Registration No(e.g.12345678K)");

            }
            else {
                $("#name_label").text("Full Name as per NRIC/Passport");
                $("#unique_id_label").text("NRIC No./Passport No.(e.g.12345678)");

            }

        });
    </script>
@endpush