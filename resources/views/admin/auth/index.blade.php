@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header"><h3>Users</h3></div>
        <div class="col-lg-2 pull-right">
            <a class="btn btn-default" href="{{route("permissions.index")}}"> Permissions </a> </div>
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
                            <td><i class="fa fa-comment-o"></i><i class="fa fa-phone"></i>
                                <i class="fa fa-desktop"></i><i class="fa fa-address-book"></i>
                                <i class="fa fa-bank"></i><i class="fa fa-money"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
