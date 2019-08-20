@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="msg">
            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="box-header"><h3>Permissions</h3></div>
        <div class="box-body">
            <div class="col-md-4 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <thead class="bg-light-blue-gradient">
                        <tr>
                            <th class="col-lg-4 text-center">User Role</th>
                            {{--<th class="col-lg-4 text-center">Assign</th>--}}
                            <th class="col-lg-4 text-center">Users</th>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td colspan="3">
                                    <form method="post" action="{{ route("permissions.update",$role->id) }}"
                                          class="permission_form">
                                        @method('patch')
                                        @csrf()
                                        <div class="col-lg-4">{{$role->name }}</div>
                                        {{--<div class="col-lg-4"><input type="checkbox" checked/></div>--}}
                                        <div class="col-lg-4">
                                            <select multiple="multiple" name="users[]" class="users">
                                                <?php
                                                echo App\Http\Controllers\Admin\PermissionController::userOptions($users, $role)
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-4"><input type="submit" value="Update"></div>

                                    </form>
                                </td>


                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">
                                <div class="col-lg-4"><input type="submit" id="update_all" value="Update All"></div>
                            </td>
                        </tr>
                        {{--<tr>--}}
                        {{--<td>Maker</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Checker</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Uploader</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Requestor</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Processor</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Data Entry</td>--}}
                        {{--<td class="text-center"><input type="checkbox" checked/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Executor</td>--}}
                        {{--<td class="text-center"><input type="checkbox"/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Admin 1</td>--}}
                        {{--<td class="text-center"><input type="checkbox"/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                        {{--<td>Admin 2</td>--}}
                        {{--<td class="text-center"><input type="checkbox"/></td>--}}
                        {{--<td><select multiple="multiple" class="users">--}}
                        {{--@foreach($users as $user)--}}
                        {{--<option value="{{$user->id}}">{{$user->username}}</option>--}}

                        {{--@endforeach--}}
                        {{--</select></td>--}}
                        {{--</tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <h3 class="text-center">View Memeber</h3>


                <div class="col-sm-12 col-lg-12 text-center form-group">
                    <?php
                        $i = 12/sizeof($users_tree);
                    ?>
                    @foreach($users_tree as $user)
                        <div class="col-sm-{{$i}} text-center form-group">
                            <span class="clearfix form-group showModal" data-id="{{$user->id}}">
                                <i class="fa fa-user-circle fa-2x">
                                </i>

                                <span>{{$user->username}}</span>
                              </span>       @if(count($user->childs))
                                        @include('admin.permissions.sub_members',['childs' => $user->childs])
                                    @endif


                        </div>

                @endforeach

                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
                {{--<span class="clearfix form-group">--}}
                {{--<i class="fa fa-user-circle fa-3x"></i>--}}
                {{--<div>UserName</div>--}}
                {{--</span>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            {{--<div class="col-sm-6 text-center form-group">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--<div class="col-sm-6 text-center form-group margin-top-15">--}}
            {{--<span class="clearfix form-group">--}}
            {{--<i class="fa fa-user-circle fa-3x"></i>--}}
            {{--<div>UserName</div>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
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
            $(document).on('click','.showModal',function(){
                $('.modal-title').text($(this).attr('data-name'));
            });

            $(".users").select2()
            $("#update_all").on("click", function () {
                $(".permission_form").each(function () {
                    $.ajax({
                        url: $(this).prop("action"),
                        type: 'POST',
                        data: $(this).serializeArray(),
                    }).done(function (response) {
                        if (response.error) {
                            $(".msg").html(" <div class=\"alert alert-error\"><p>" + response.error + "</p></div>").show();

                        }
                        else {
                            $(".msg").html(" <div class=\"alert alert-success\"><p>Permissions Successfully Updated</p></div>").show();

                        }
                    });
                })
            })
            $(".view_member").on("click", function (e) {
                $.ajax({
                    url: "",
                    type: "POST",
                    data: "",
                }).done(function (response) {

                })
            })
        })
    </script>
@endpush