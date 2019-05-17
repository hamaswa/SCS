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
            <form id="aa" name="aa" method="post" action="{{route("aa.store")}}">
                @csrf
                <div class="row mar-lr">
                <div class="col-sm-12 de-table-bor">
                    <div class="first-table">
                        <div class="box-body">
                            <div id="response"></div>
                            <table id="example5" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width:20%">AA Source</th>
                                    <th style="width:20%">AA Branch</th>
                                    <th style="width:20%">AA Category</th>
                                    <th style="width:20%">Allocation</th>
                                    <th style="width:20%">Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="background-color: #c6d8f2;">
                                    <td>
                                        <div class="form-group">
                                                <select id="aasource" class="form-control" name="aasource">
                                                    <option value="">Select AA Source</option>

                                                @foreach($aafields as $k=>$v)
                                                        @if($v['type']=='aasource')
                                                            <option value="{{$k}}">{{$v['name']}}</option>
                                                        @endif
                                                    @endforeach

                                                    <option value="add">+Add</option>
                                                </select>
                                            </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <select id="aabranch" class="form-control" name="aabranch">
                                                    <option value="">Select AA Branch</option>

                                                    @foreach($aafields as $k=>$v)
                                                    @if($v['type']=='aabranch')
                                                        <option value="{{$k}}">{{$v['name']}}</option>
                                                    @endif
                                                @endforeach

                                                <option value="add">+Add</option>
                                            </select>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select id="aacategory" class="form-control" name="aacategory">
                                                    <option value="">Select AA Category</option>
                                                @foreach($aafields as $k=>$v)
                                                    @if($v['type']=='aacategory')
                                                        <option value="{{$k}}">{{$v['name']}}</option>
                                                    @endif
                                                @endforeach

                                                <option value="add">+Add</option>
                                            </select>

                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select id="aatype" class="form-control" name="aatype">
                                                <option value="">Select AA Type</option>

                                            @foreach($aafields as $k=>$v)
                                                    @if($v['type']=='aatype')
                                                        <option value="{{$k}}">{{$v['name']}}</option>
                                                    @endif
                                                @endforeach

                                                <option value="add">+Add</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">

                                                <input type="text" id="aadate-btn" name="aadate" placeholder="dd/mm/yyyy" class="form-control"
                                                       data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </td>

                                </tr>
                        <tr>
                            <td class="pull-right">
                                <button type="submit"  class="btn bg-maroon btn-flat margin">ADD</button>
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
    $("#aasource,#aabranch,#aacategory,#aatype").change(function(e){
       console.log($(this).val());
    });
    $('#aadate-btn').datepicker({
        format: 'yyyy-mm-dd'
    });
    $("select").select2({allowclear:true});
    $(document).ready(function(){
        $("#submit").click(function(){

                //event.preventDefault(); //prevent default action


                $.ajax({
                    url :'{{ route('aa.store') }}',
                    type: 'POST',
                    data : $("#aa").serialize()
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

