@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header"><h3>Users</h3></div>
        {{--<div class="col-lg-2 pull-right">--}}
            {{--<a class="btn btn-default" href="{{route("permissions.index")}}"> Permissions </a> --}}
        {{--</div>--}}
        <div class="box-body">

        <?php /*
        @push('style')
            <!-- DataTable Bootstrap -->
                <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
                <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css">
            @endpush

            {!! $dataTable->table(['width' => '100%']) !!}

            @push('scripts')
                <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
                <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
                <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

                {!! $dataTable->scripts() !!}
            @endpush
            */ ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-condensed table-bordered">
                    <thead>
                        <tr class="bg-light-blue-gradient">
                            <th>Code</th>
                            <th>Area</th>
                            <th>User ID</th>
                            <th>Status</th>
                            <th>Upline</th>
                            <th>Position</th>
                            <th>Assign</th>
                            <th>Member</th>
                            <th>Scheme</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="bg-yellow-light">PG</td>
                            <td class="bg-yellow-light">KL</td>
                            <td class="bg-yellow-light text-red">123456</td>
                            <td>Active</td>
                            <td>100001</td>
                            <td>Business Associate</td>
                            <td><a href="#">ROLE</a></td>
                            <td><a href="#">View</a></td>
                            <td>Agent</td>
                            <td>1900</td>
                            <td><i class="fa fa-comment-o fa-2x margin-r-5"></i><i class="fa fa-phone fa-2x margin-r-5 showContactDetail"></i>
                                <i class="fa fa-desktop fa-2x margin-r-5 showCredentials"></i><i class="fa fa-address-book fa-2x margin-r-5 showInfo"></i>
                                <i class="fa fa-bank fa-2x margin-r-5 showBankDetail"></i><i class="fa fa-money fa-2x"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="contactDetailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="bg-light-blue-gradient">
                                    <th>Group ID</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>123456</td>
                                    <td>60123456789</td>
                                    <td>testabd@gmail.com</td>
                                    <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                                </tr>
                                <tr>
                                    <td>123456</td>
                                    <td>60123456789</td>
                                    <td>testabd@gmail.com</td>
                                    <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                                </tr>
                                <tr>
                                    <td>123456</td>
                                    <td><input type="text" class="form-control"> </td>
                                    <td><input type="text" class="form-control"></td>
                                    <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="credentialModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th>Group ID</th>
                                <th>Password1</th>
                                <th>Password2</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>123456</td>
                                <td>xxxxxxxx</td>
                                <td>234234</td>
                                <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                            </tr>
                            <tr>
                                <td>123456</td>
                                <td>xxxxxxxx</td>
                                <td>34234242</td>
                                <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                            </tr>
                            <tr>
                                <td>123456</td>
                                <td><input type="text" class="form-control"> </td>
                                <td><input type="text" class="form-control"></td>
                                <td><a href="#">Edit</a> | <a href="#">Save</a> </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="infoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th>PCE</th>
                                <th>CEILI</th>
                                <th>REN</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><input type="checkbox" checked /> </td>
                                <td><input type="checkbox" checked /></td>
                                <td><input type="checkbox" /> </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="bankDetailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr class="bg-light-blue-gradient">
                                <th>Bank</th>
                                <th>Name</th>
                                <th>Account No.</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>MBB</td>
                                <td>ABC DFEWR DSF</td>
                                <td>34535435435435</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push("scripts")
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $(document).on('click','.showContactDetail',function(){
                $('#contactDetailModal').modal('show');
            });
            $(document).on('click','.showCredentials',function(){
                $('#credentialModal').modal('show');
            });
            $(document).on('click','.showInfo',function(){
                $('#infoModal').modal('show');
            });
            $(document).on('click','.showBankDetail',function(){
                $('#bankDetailModal').modal('show');
            });
        })
    </script>
@endpush