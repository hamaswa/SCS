@extends('layouts.app')

@section('content')
    <div class="bg-white pull-left">
        <div class="col-md-9 col-sm-12 no-padding no-margin">
            <div class="box">
                <div class="box-header">
                    <form id="searchapplicant" name="searchapplicant" method="post" action="{{ route("pipeline.index") }}">
                    @csrf
                    <div class="col-md-12">
                        <h4>Existing AA</h4>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control select2" name="searchfield" id="searchfield">
                            <option value="unique_id">Applicant ID</option>
                            <option value="name">Applicant Name</option>
                            <option value="unique_id">Company No</option>
                            <option value="name">Company Name</option>
                        </select>
                    </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="search" placeholder="Search" />
                        </div> <div class="col-md-4">
                            <input type="submit" class="btn btn-default form-control" name="submit" value="Search" />
                        </div>
                    </form>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                            <tr class="bg-light-blue-gradient">
                                <th>AII LA</th>
                                <th>Applicant / Company Name</th>
                                <th>IC No. / Company No.</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $d)
                            <tr>
                                <td>{{$d->aasource}}/{{$d->aabranch}}/{{$d->aacategory}}/{{$d->serial_no}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->unique_id}}</td>
                                <td>
                                   {{ $d->status }}
                                    </td>

                                <td>
                                    <a href="javascript:void(0)" class="btn btn-xs bg-light-blue-gradient">View</a>
                                    <a href="javascript:void(0)" class="btn btn-xs bg-light-blue-gradient">Import</a>
                                </td>
                            </tr>
                       @endforeach

                        </tbody>
                    </table>
                    <div> {{ $data->links() }}</div>
                    <hr>

                    <form id="newaa" name="newaa" action="{{ route("aadata.create") }}" method="post" >
                        @csrf
                    <div class="col-md-12 margin-bottom">
                        <strong>NEW AA</strong>
                    </div>
                    <div class="col-md-3">
                        <label>AA Source</label>
                        <select class="select2 form-control" name="aasource">
                            <option value="AS">AS</option>
                            <option value="PS">PS</option>
                            <option value="BK">BK</option>
                            <option value="DV">DV</option>

                        </select>
                    </div>   <div class="col-md-3">
                        <label>AA Branch</label>
                        <select class="select2 form-control" name="aabranch">
                            <option value="KL">KL</option>
                            <option value="JB">JB</option>
                            <option value="PN">PN</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>AA Category</label>
                        <select class="select2 form-control" name="aacategory">
                            <option value="Ind">Indiviual</option>
                            <option value="Com">Company</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Allocation</label>
                        <select class="select2 form-control" name="aaallocation">
                            <option value="ABMB">ABMB</option>
                            <option value="REA">REA</option>
                            <option value="DEVP">DEVP</option>
                            <option value="INS">INS</option>
                        </select>
                    </div>
                    <div class="col-md-12 padding-top-25 margin-bottom">
                        <button class="btn bg-gray-dark pull-right">Proceed</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 no-padding no-margin">
            <div class="box">
                <div class="box-header">
                    <div class="padding-5 bg-white pull-right border-light">
                        <img src="{{ asset("img/folder.png") }}" />
                    </div>
                    <div class="padding-5 bg-yellow-light pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('all_comments')" />
                    </div>
                    <div class="padding-5 bg-chocolate pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('overview')" />
                    </div>
                    <div class="padding-5 bg-green-gradient pull-right border-light">
                        <img src="{{ asset("img/left-icon.png") }}" onclick="showData('view_existing')" />
                    </div>
                </div>
                <div id="overview" class="box-body bg-chocolate min-height left-box hide detail-box">
                    <h4 class="text-center">Overview</h4>
                    <strong>MR ABC</strong>
                    <table class="table table-bordered table-striped table-hover bg-white">

                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Income</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Gross</th>
                            <th>Net</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Fixed</td>
                            <td>3454</td>
                            <td>345</td>
                        </tr>
                        <tr>
                            <td>Rental</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        <tr>
                            <td>IIF</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr class="bg-yellow-light">
                            <th>Total</th>
                            <th>432</th>
                            <th>234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">

                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">New Instalment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>HL</th>
                            <th>TL</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>43543</td>
                            <td>3454</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        <tr>
                            <td>345435</td>
                            <td>345</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        <tr>
                            <td>4354</td>
                            <td>345</td>
                            <td class="bg-yellow-light">345</td>
                        </tr>
                        </tbody>

                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">

                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">New Commitment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR(%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>PL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>HL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>CC</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="bg-yellow-light">Total</th>
                            <th class="bg-yellow-light">432</th>
                            <th class="bg-green">234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">

                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Existing Commitment</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR(%)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>PL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>HL</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>CC</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        <tr>
                            <td>OD</td>
                            <td>345</td>
                            <td class="bg-green">345</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="bg-yellow-light">Total</th>
                            <th class="bg-yellow-light">432</th>
                            <th class="bg-green">234</th>
                        </tr>
                        </tfoot>
                    </table>
                    <hr>
                    <table class="table table-bordered table-striped table-hover bg-white">

                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">Property</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>MV</th>
                            <th>OS</th>
                            <th>CO</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>HL</td>
                            <td>3454</td>
                            <td>345</td>
                        </tr>
                        <tr class="text-red">
                            <td>324</td>
                            <td>345</td>
                            <td>345</td>
                        </tr>
                        
                        </tbody>

                    </table>
                </div>
                <div id="view_existing" class="box-body bg-green-gradient min-height left-box hide detail-box">

                    <table class="table table-bordered table-striped table-hover bg-white text-black">
                        <thead>
                            <tr class="bg-light-blue-gradient">
                                <th colspan="4" class="text-center">Document</th>
                            </tr>
                            <tr class="bg-aqua">
                                <th>Date</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Company Reg KYC</td>
                                <td>Mandatory</td>
                                <td><a href="javascript:void(0)">view</a></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>latest payslip</td>
                                <td>Updated</td>
                                <td><a href="javascript:void(0)">view</a></td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <div id="all_comments" class="box-body bg-yellow-light min-height left-box hide detail-box">

                    <table class="table table-bordered table-striped table-hover bg-white">
                        <thead>
                        <tr class="bg-light-blue-gradient">
                            <th colspan="4" class="text-center">All Comments</th>
                        </tr>
                        <tr class="bg-aqua">
                            <th>Date</th>
                            <th>Status</th>
                            <th>Comments</th>
                            <th>By</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td>Incomplete</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Open</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="bg-red-gradient">
                            <td></td>
                            <td>KIV</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr class="bg-green">
                            <td></td>
                            <td>KIV<br><small>replied</small></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        $(document).ready(function () {
            $('.select2').select2();
        });
        function showData(id){
            $('.detail-box').addClass('hide');
            $("#"+id).removeClass('hide');
        }
    </script>
@endpush