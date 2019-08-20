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
                <div class="col-sm-4 bg-light-blue-gradient padding-5 border-light"><b> User Role </b></div>
                <div class="col-sm-6 bg-light-blue-gradient padding-5 border-light"><b> Users </b></div>
                <div class="col-sm-2 bg-light-blue-gradient padding-5 border-light"><b> Action </b></div>
                <div class="clearfix"></div>
                @foreach($roles as $role)
                    <div class="border-light">
                    <form method="post" action="{{ route("permissions.update",$role->id) }}" class="permission_form">
                        @method('patch')
                        @csrf()
                        <div class="col-sm-4 padding-5 ">{{$role->name }}</div>
                        {{--<div class="col-lg-4"><input type="checkbox" checked/></div>--}}
                        <div class="col-sm-6 padding-5 ">
                            <select multiple="multiple" name="users[]" class="users form-control">
                                <?php
                                echo App\Http\Controllers\Admin\PermissionController::userOptions($users, $role)
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-2 padding-5 "><input type="submit" value="Update" class="btn btn-primary btn-xs"></div>

                    </form>
                    </div>
                    <div class="clearfix"></div>
                @endforeach
                <div class="col-sm-12 margin-top-15">
                    <input type="submit" class="btn btn-primary" id="update_all" value="Update All">
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

                                <span class="text-center clearfix">{{$user->username}}</span>
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