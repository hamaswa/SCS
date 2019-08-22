@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header">
            <div class="pull-left"><h3>Users</h3></div>
            <div class="pull-right">
                <a class="btn btn-default margin-r-5" href="{{route("permissions.index")}}"> Permissions </a>
                {{--<button class="btn btn-primary margin-r-5" data-toggle="modal" data-target="#createGroupModal"> Create Group </button>--}}
            </div>
        </div>
        {{--<div class="col-lg-2 pull-right">--}}
            {{-- --}}
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
                    @foreach($users as $user)
                        <tr>
                            <td class="bg-yellow-light">{{$user->code}}</td>
                            <td class="bg-yellow-light">{{$user->area}}</td>
                            <td class="bg-yellow-light text-red">{{$user->username}}</td>
                            <td>{{ ($user->status==0?"Inactive":"Active") }}</td>
                            <td>{{ $user->parent()->Pluck("username")[0] }}</td>
                            <td>{{$user->position()->Pluck("name")[0]}}</td>
                            <td><div class="hide">
                                    @if(count($user->roles))
                                    <ul>
                                        @foreach($user->roles as $role)
                                            <li>{{$role->name}}</li>
                                        @endforeach
                                    </ul>
                                        @else
                                        <h4>No Roles Assignes</h4>
                                        @endif

                                </div> <a href="#" class="showRoles" data-id="{{$user->username}}">ROLE</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}">View</a></td>
                            <td>{{$user->scheme}}</td>
                            <td>{{$user->salary}}</td>
                            <td><i class="fa fa-comment-o fa-2x margin-r-5"></i>
                                <i class="fa fa-phone fa-2x margin-r-5 showContactDetail" data-id="{{$user->id}}"></i>
                                <i class="fa fa-desktop fa-2x margin-r-5 showCredentials"></i>
                                <i class="fa fa-address-book fa-2x margin-r-5 showInfo"
                                   data-PCE="{{ ($user->PCE==1?"true":"false") }}"
                                   data-CEILI="{{($user->CEILI==1?"true":"false")}}"
                                   data-REN="{{($user->REN==1?"true":"false")}}"
                                ></i>
                                <i class="fa fa-bank fa-2x margin-r-5 showBankDetail"
                                   data-bank="{{$user->bank}}" data-bank_name="{{$user->bank_name}}"
                                   data-account_no="{{$user->account_no}}"></i>
                                <i class="fa fa-money fa-2x"></i></td>
                        </tr>
                        @endforeach
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
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="user_contacts">

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="credentialModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
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
            </div>
        </div>
    </div>
    <div id="infoModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
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
                            <tbody id="showInfo">

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="bankDetailModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
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
                            <tbody id="bankinfo">

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
    </div>
    <div id="showRoles" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <form method="post">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span  id="user_roles"></span> Roles</h4>
                </div>
                <div class="modal-body" id="rolesbody">


                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        $(document).ready(function ()
        {
            $(document).on('click','.showContactDetail',function(){
                $.ajax({
                    url: "{{ route("contacts.index")}}/",
                    type: "get",
                    data: "id="+$(this).data("id"),
                }).done(function (response) {
                    $("#user_contacts").html(response);
                    $('#contactDetailModal').modal('show');
                })

            });
            $(document).on('click','.showCredentials',function(){
                $('#credentialModal').modal('show');
            });

            $(document).on('click','.showRoles',function(){
                $("#user_roles").text($(this).data("id"));
                $("#rolesbody").html($(this).parent("td").find("div").html());
                $('#showRoles').modal('show');
            });


            $(document).on('click','.showInfo',function(){
                console.log($(this).data("pce"));
                html='<tr><td><input type="checkbox" name="PCE" value="1" class="checkbox-custom"';
                if($(this).data("pce")==true)
                    html+=" checked ";
                html+= ' /> </td><td><input type="checkbox" name="CEILI" value="1" class="checkbox-custom"';
                if($(this).data("ceili")==true)
                    html+=" checked";
                html+='/></td><td><input type="checkbox" name="REN" value="1" class="checkbox-custom"';
                if($(this).data("ren")==true)
                    html+=" checked";
                html+='/> </td>';
                console.log(html);
                $("#showInfo").html(html);
                $('#infoModal').modal('show');
            });
            $(document).on('click','.showBankDetail',function(){
                html ="<tr><td>"+$(this).data("bank")+"</td><td>"+$(this).data("bank_name")+"</td><td>"+$(this).data("account_no")+"</td></tr>"
                $("#bankinfo").html(html);
                $('#bankDetailModal').modal('show');
            });
        })
    </script>
@endpush