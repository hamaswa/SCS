@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Data Entry</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <section class="content">

        <div class="row">
            <form action="" method="post" id="contact_form">
                <div class="col-lg-12">
                    <legend><label for="">NO AA</label> <input type="text" placeholder="dKL/IND/123456789012"></legend>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <fieldset id="form1">
                        <div class="box">
                            <div class="box-header">
                                <legend><a class="btn btn-app">
                                        <i onclick="$('#upload').click()" class="fa fa-upload"></i> Upload</a>
                                    <div style="display:none"><input type="file" name="doc" id="upload"></div>
                                    <a class="btn btn-app"><i class="fa fa-refresh"></i> Refresh</a>
                                    <a class="btn btn-app"><i class="fa fa-download"></i> Download</a>
                                </legend>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label class="col-md-7 control-label">Type</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="aacategory" class="form-control col-lg-12" name="aacategory">
                                                <option value="com">
                                                    Company
                                                </option>
                                                <option value="ind">
                                                    Individual
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label id="name_label" class="col-md-12 control-label">Full Name as per
                                        NRIC/Passport</label>
                                    <div class="col-md-12">
                                        <div class="input-group">

                                            <input name="name" placeholder="" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label id="unique_id_label" class="col-md-12 control-label">NRIC No. / Passport No.
                                        (e.g. 1234567890123)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">

                                            <input name="first_name" placeholder="" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label">Mobile Number (e.g. 60121234567 /
                                        6512345678)</label>
                                    <div class="col-md-12">
                                        <div class="input-group">

                                            <input name="first_name" placeholder="" class="form-control" type="text">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-fotter">
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-4 pull-right">
                                        <button type="button" id="nextform2" class="btn btn-primary center-block">
                                            Next
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </fieldset>
                    <fieldset id="form2" class="hide">
                        <div class="box">

                            <div class="box-header">
                                <div class="form-group">
                                    <label class="col-md-7 control-label">Type</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="incometype" class="form-control" name="incometype">
                                                <option value="salary">Salary</option>
                                                <option value="business">Business</option>
                                                <option value="incometax">Income Tax</option>
                                                <option value="rental">Rental</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" id="salary">
                                <label class="col-lg-12">
                                    MONTHLY FIXED
                                </label>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">CURRENCY</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">USD</option>
                                                <option>SGD</option>
                                                <option>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Exchage Rate</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">BASIC</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Mandatory Deductions</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox"> EPF
                                            </label>
                                            <label>
                                                <input type="checkbox"> TAX
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body hide" id="business">
                                <label class="col-lg-12">
                                    MONTHLY Variable
                                </label>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">CURRENCY</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">USD</option>
                                                <option>SGD</option>
                                                <option>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Exchage Rate</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">BASIC</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month1</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month2</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month3</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month4</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month5</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Month6</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Mandatory Deductions</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox"> EPF
                                            </label>
                                            <label>
                                                <input type="checkbox"> TAX
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body hide" id="incometax">
                                <label class="col-lg-12">
                                    ANNUAL TAX DECLARED                                 </label>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">CURRENCY</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">USD</option>
                                                <option>SGD</option>
                                                <option>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Exchage Rate</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Amount</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Mandatory Deductions</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox"> EPF
                                            </label>
                                            <label>
                                                <input type="checkbox"> TAX
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body hide" id="rental">
                                <label class="col-lg-12">
                                    ANNUAL INVESTMENT RETURN

                                </label>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">CURRENCY</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select class="form-control select2" style="width: 100%;">
                                                <option selected="selected">USD</option>
                                                <option>SGD</option>
                                                <option>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Exchage Rate</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12 control-label">Amount</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <!--div class="form-group">
                                    <label class="col-md-12 control-label">Mandatory Deductions</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="checkbox"> EPF
                                            </label>
                                            <label>
                                                <input type="checkbox"> TAX
                                            </label>
                                        </div>
                                    </div>
                                </div-->
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>

                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" id="backform1" class="btn btn-block btn-primary">Previous</button>

                                        <button type="button" id="nextform3" class="btn btn-block btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </fieldset>
                    <fieldset id="form3" class="hide">
                        <div class="box">

                            <div class="box-header">
                                <div class="form-group">
                                    <label class="col-md-7 control-label">Type</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select id="incometype" class="form-control" name="incometype">
                                                <option value="saving">Saving</option>
                                                <option value="efp">EFP</option>
                                                <option value="incometax">Investments</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body" id="saving">
                                <label class="col-lg-12">
                                    CA & SA Balance
                                </label>

                                <div class="form-group">
                                    <label class="col-md-12 control-label">CA & SA Balance</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="acctype"> OWN
                                            </label>
                                            <label>
                                                <input type="radio" name="acctype"> JA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body" id="efp">
                                <label class="col-lg-12">
                                    CA & SA Balance
                                </label>

                                <div class="form-group">
                                    <label class="col-md-12 control-label">RM</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 control-label">EPF Contributor Age</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="acctype"> >55
                                            </label>
                                            <label>
                                                <input type="radio" name="acctype"> <55
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>
                            <div class="box-body" id="saving">
                                <label class="col-lg-12">

                                </label>

                                <div class="form-group">
                                    <label class="col-md-12 control-label">Total Fixed Deposits</label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label>
                                                <input type="radio" name="acctype"> OWN
                                            </label>
                                            <label>
                                                <input type="radio" name="acctype"> JA
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" class="btn btn-block btn-primary">ADD</button>
                                    </div>
                                </div>

                            </div>



                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <button type="button" id="backform2" class="btn btn-block btn-primary">Previous</button>

                                        <button type="button" id="nextform4" class="btn btn-block btn-primary">Next</button>
                                    </div>
                                </div>
                            </div>


                        </div>


                    </fieldset>



                </div>

            </form>

        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">
        $("#incometype").change(function(e){
            $("#form2 .box .box-body").addClass("hide");

            id=$(this).val();
            $("#form2").find("#"+id).removeClass("hide").show();

        })

        $("#nextform2").click(function (e) {
            $("#form1").addClass("hide");
            $("#form2").removeClass("hide");
        })
        $("#backborm1").click(function (e) {
            $("#form2").addClass("hide");
            $("#form1").removeClass("hide");
        })
        $("#nextform3").click(function (e) {
            $("#form2").addClass("hide");
            $("#form3").removeClass("hide");
        });
        $("#backborm2").click(function (e) {
            $("#form3").addClass("hide");
            $("#form2").removeClass("hide");
        })
        $("#aacategory").change(function (e) {
            if ($(this).val() == 'com') {
                $("#name_label").text("Company Name");
                $("#unique_id_label").text("Company Registration No(e.g.12345678K)");

            }
            else {
                $("#name_label").text("Full Name as per NRIC/Passport");
                $("#unique_id_label").text("NRIC No./Passport No.(e.g.12345678)");

            }

        });

        $(document).ready(function () {
            $("#submit").click(function () {

                event.preventDefault(); //prevent default action


                $.ajax({
                    url: '{{ route('aafields.store') }}',
                    type: 'POST',
                    data: $("#aafields").serialize()
                }).done(function (response) { //
                    if (response == "success") {
                        $("#response").html($("<div class=\"alert alert-success alert-dismissable\">\n" +
                            "                Record Successfully Added\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>")).show();
                    }
                    else {
                        $("#response").html($("<div class=\"alert alert-danger alert-dismissable\">\n" +
                            "                Error Occured.\n" +
                            "                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>\n" +
                            "\n" +
                            "            </div>"))
                    }
                });
            });

        })

    </script>
@endpush
