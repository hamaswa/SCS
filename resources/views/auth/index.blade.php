@extends('layouts.app')

@section('content')
        <div class="box">
            <div class="box-header">Users</div>
            <div class="box-body">



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




            </div>
        </div>
@endsection
