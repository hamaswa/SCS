@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Entry</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <section class="content">
            <form id="de" name="de">
                @csrf
                <div class="row mar-lr">
                <div class="col-sm-2 two-width">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-flat">Action</button>
                        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route("housingloan.index") }}">Housing Loan</a></li>
                            <li><a href="{{ route("termloan.index") }}">Term Loan</a></li>
                            <li><a href="{{ route("creditcard.index") }}">Credit Card</a></li>
                            <li><a href="{{ route("hirepurchase.index") }}">Hire Purchase</a></li>
                            <li><a href="{{ route("overdraft.index") }}">Overdraft</a></li>
                            <li><a href="{{ route("personalloan.index") }}">Personal Loan</a></li>
                            <input type="hidden" value="{{ $type }}" id="type" name="type">

                        </ul>
                    </div>


                    <div class="Third-width">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input name="csris[]" value="ssa" type="checkbox">
                                    SAA
                                </label>
                            </div>

                            <div  class="checkbox">
                                <label>
                                    <input  name="csris[]" value="akpk" type="checkbox">
                                    AKPK
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input  name="csris[]" value="trade" type="checkbox">
                                    TRADE
                                </label>
                            </div>

                            <div  class="checkbox">
                                <label>
                                    <input name="csris[]" value="courtcase" type="checkbox">
                                    COURT CASE
                                </label>
                            </div>

                            <div  class="checkbox">
                                <label>
                                    <input name="csris[]" value="bankruptcy" type="checkbox">
                                    BANKRUPTCY
                                </label>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-10 de-table-bor">
                    <div class="first-table">
                        <div class="box-body">
                            <div id="response"></div>
                            <table id="example5" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 115px;">Facility Date</th>
                                    @if($type!='creditcard')
                                    <th style="width: 100px;">Capacity</th>
                                    @endif
                                    <th style="width: 100px;">Facility Limit</th>
                                    <th style="width: 100px;">Facility Outstanding</th>
                                    <th style="width: 100px;">Instalment</th>
                                    <th style="width: 102px;">MIA</th>
                                    <th style="width: 102px;">CONDUCT</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: #c6d8f2;">
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input type="text" id="daterange-btn" name="facilitydate" placeholder="dd/mm/yyyy" class="form-control"
                                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </td>
                                    @if($type!='creditcard')

                                    <td>
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="capacity" id='account' value="own" class="minimal" checked="">
                                                OWN
                                            </label>
                                            <label>
                                                <input type="radio" name="capacity" value="ja" id="account" class="minimal">
                                                JA
                                            </label>

                                        </div>
                                    </td>
                                    @endif
                                    <td>
                                        <div class="form-group">
                                            <input name="facilitylimit" type="text" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="facilityoutstanding" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" name="installment" class="form-control my-colorpicker1"
                                                   style="background-color: #fff;">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                           <select id="mia" class="form-control" name="mia">
                                               <option value="0">0</option>
                                               <option value="1">1</option>
                                               <option value="2">2</option>
                                               <option value="3">3</option>
                                           </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <select id="conduct" class="form-control" name="conduct">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                </td>
                                </tr>
                        <tr>
                            <td class="add-button">
                                <button type="button" id="submit" class="btn bg-maroon btn-flat margin">ADD</button>
                            </td>
                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>

@endsection
@push("scripts")
<script type="text/javascript">
    $('#daterange-btn').datepicker({
        format: 'yyyy-mm-dd'
    });
    $("#mia,#conduct").select2({allowclear:true});
    $(document).ready(function(){
        $("#submit").click(function(){

                event.preventDefault(); //prevent default action


                $.ajax({
                    url :'{{ route('housingloan.store') }}',
                    type: 'POST',
                    data : $("#de").serialize()
                }).done(function(response){ //
                    if(response=="success"){
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

