<fieldset id="propertykyc" class="hide">
    <div class="box">



            <input type="hidden" name="number" id="number" value="0">
            <div class="box-header">
                <div class="col-lg-12 col-md-12 col-sm-12">    <ul id="properties"></ul></div>
                <label class="col-lg-12 col-md-12 col-sm-12 form-group">Property</label>
    
            </div>
            <div class="box-body">
                <div class="form-group col-md-4 col-sm-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="property_type" value="bank" id="property_type_bank"> Bank
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="property_type" value="free" id="property_type_free"> Free
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-4 col-sm-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="property_master_individual" value="master"> Master Title
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="property_master_individual" value="individual"> Individual
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-primary">
                            <input type="radio" name="property_hold" value="freehold"> Free Hold
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="property_hold" value="leasehold"> Lease Hold
                        </label>
                    </div>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="market_value">Market value</label>
                    <input type="text" name="property_market_value" class="form-control" id="property_market_value">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_labu">LA/BU</label>
                    <input type="text" name="property_labu" id="property_labu" value="" class="form-control">
                </div>



                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_address">Type</label>
                    <select name="property_owner_type" id="property_owner_type" class="form-control">
                        <option value="rent">Rent</option>
                        <option value="landed">Landed</option>
                    </select>
    
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_storey">Storey</label>
                    <input type="number" name="property_storey" id="property_storey" class="form-control" value="">
    
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_owner">Owner</label>
                    <input type="number" name="property_owner" id="property_owner" value="" class="form-control">
    
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_loan_outstanding">Loan Outstanding</label>
                    <input type="number" name="property_loan_outstanding" id="property_loan_outstanding" class="form-control" value="">

                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_reno_cost">Reno Cost</label>
                    <input type="number" name="property_reno_cost" id="property_reno_cost" value="" class="form-control">
                </div>
                {{--<div class="form-group col-md-4 col-sm-12">--}}
                    {{--<label for="property_reno_details">Reno Cost</label>--}}
                    {{--<textarea name="property_reno_cost" id="property_reno_cost" class="form-control" value="">--}}
                    {{--</textarea>--}}
                {{--</div>--}}

                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_bank">Bank</label>
                    <textarea name="property_bank" id="property_bank" class="form-control">
                    </textarea>
                </div>

                <div class="form-group col-md-4 col-sm-12">
                    <label for="property_address">Property Address</label>
                    <textarea name="property_address" id="property_address" value="" class="form-control">
                    </textarea>
                </div>

                <div class="form-group col-lg-12" id="btnsubmit">
                    <button type="button" class="btn btn-primary" id="add_property">Add Property</button>
                </div>

            </div>
            <div class="box-footer">
                <div class="box-footer">
                    <div class="form-group col-md-12 col-sm-12 ">
                        <ul class="pager">
                            <li class="previous" id="backwealthkyc"><a href="javascript:void(0);" class="bg-blue">Previous</a>
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
    </div>
    <div class="box col-md-12 col-sm-12">
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-light-blue">
                <tr>
                    <th>Bank/Free</th>
                    <th>Master/Individual</th>
                    <th>Free/Lease Hold</th>
                    <th>Market value</th>
                    <th>LA/BU</th>
                    <th>Type</th>
                    <th>Storey</th>
                    <th>Owner</th>
                    <th>Loan Outstanding</th>
                    <th>Reno Cost</th>
                    <th>Bank</th>
                    <th>Property Addr</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Bank</td>
                    <td>Individual</td>
                    <td>Lease Hold</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td>324</td>
                    <td><a href="javascript:void(0)" class="text-primary pull-left"><i class="fa fa-pencil-square-o"></i></a><a href="javascript:void(0)" class="text-danger pull-right"><i class="fa fa-trash-o"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

</fieldset>
@push("scripts")
    <script type="text/javascript">

        $("#backwealthkyc").click(function (e) {
            $("#wealthkyc").removeClass("hide");
            $("#propertykyc").addClass("hide");
        })

        let forms=[];

        $(document.body).on("click","#add_property",function(){
            //propertycount = forms.count();
            //$("#number").val(propertycount);
            let form = {};
            $("#propertyform" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            forms.push(form);
            $("#propertyform").trigger("reset")
            formActionButtions();

        });


        $(document.body).on("click",".editproperty",function () {

            form = forms[$(this).data('number')];
            $("input").each(function(){
                $(this).val(form[$(this).attr('id')]);
            })
            $("#property_owner_type option[value="+form['property_owner_type']+"]").attr('selected', 'selected');
            $("#number").val($(this).data('number'))
            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\" data-id=\""+$(this).data('number')+"\" id=\"update_property\">Update Property</button>"))


        });

        $(document.body).on("click","#update_property",function(e){

            let form = {};
            $("#propertyform" )
                .serializeArray()
                .map( input => form[ input.name ] = input.value );
            forms[$(this).data("id")] = form;
            $("#propertyform").trigger("reset")

            $("#btnsubmit").html($("<button type=\"button\" class=\"btn btn-primary\"  id=\"add_property\">Add Property</button>"))

        });


        $(document.body).on("click",".delproperty",function(e){
            forms.splice($(this).data('number'),1);
            formActionButtions();

        });

        function formActionButtions(){
            $("#properties").html("");
            i=0;
            forms.forEach(function(form){
                console.log(form);
                $("#properties").append($("<li>Property"+(i+1)+"<span id='property"+i+"' data-number='"+i+"' class='editproperty'>Edit</span><span class='delproperty' data-number='"+i+"'>Delete</span></li> "));
                i++;
            })
        }







    </script>
@endpush
