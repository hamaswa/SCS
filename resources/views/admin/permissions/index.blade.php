@extends('layouts.app')

@section('content')
    <div class="box">
        <div class="box-header"><h3>Permissions</h3></div>
        <div class="box-body">
            <div class="col-md-4 col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed table-hover table-striped">
                        <thead class="bg-light-blue-gradient">
                        <tr>
                            <th class="text-center">User Role</th>
                            <th class="text-center">Assign</th>
                            <th class="text-center">Reassign</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Originator</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                     <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select> </td>
                        </tr>
                        <tr>
                            <td>Maker</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Checker</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Uploader</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Requestor</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Processor</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Data Entry</td>
                            <td class="text-center"><input type="checkbox" checked/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Executor</td>
                            <td class="text-center"><input type="checkbox"/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Admin 1</td>
                            <td class="text-center"><input type="checkbox"/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        <tr>
                            <td>Admin 2</td>
                            <td class="text-center"><input type="checkbox"/></td>
                            <td><select multiple="multiple" class="users">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->username}}</option>

                                    @endforeach
                                </select></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <h3 class="text-center">View Memeber</h3>



                <div class="col-sm-6 text-center form-group">
                    @foreach($users as $user)
                        <div class="col-sm-12 text-center form-group">
                        <span>
                        <i class="fa fa-user-circle fa-3x"></i>
                        <div>{{$user->username}}</div>
                        </span>
                        </div>

                    @endforeach
                    <span class="clearfix form-group">
                        <i class="fa fa-user-circle fa-3x"></i>
                        <div>UserName</div>
                    </span>
                    <div class="col-sm-6 text-center form-group margin-top-15">
                        <span class="clearfix form-group">
                            <i class="fa fa-user-circle fa-3x"></i>
                            <div>UserName</div>
                        </span>
                        <div class="col-sm-6 text-center form-group margin-top-15">
                            <span class="clearfix form-group">
                                <i class="fa fa-user-circle fa-3x"></i>
                                <div>UserName</div>
                            </span>
                        </div>
                        <div class="col-sm-6 text-center form-group margin-top-15">
                            <span class="clearfix form-group">
                                <i class="fa fa-user-circle fa-3x"></i>
                                <div>UserName</div>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-6 text-center form-group margin-top-15">
                        <span class="clearfix form-group">
                            <i class="fa fa-user-circle fa-3x"></i>
                            <div>UserName</div>
                        </span>
                        <div class="col-sm-6 text-center form-group margin-top-15">
                            <span class="clearfix form-group">
                                <i class="fa fa-user-circle fa-3x"></i>
                                <div>UserName</div>
                            </span>
                        </div>
                        <div class="col-sm-6 text-center form-group margin-top-15">
                            <span class="clearfix form-group">
                                <i class="fa fa-user-circle fa-3x"></i>
                                <div>UserName</div>
                            </span>
                        </div>
                    </div>
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
@endsection



@push("scripts")
    <script type="text/javascript">
        $(document).ready(function () {
            $(".users").select2()
        })
    </script>
@endpush