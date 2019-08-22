<div class="col-md-8 col-sm-12">
    <h3 class="text-center">View Memeber</h3>

    <div class="col-sm-12 col-lg-12 text-center form-group">
        <?php
        $i = 12/sizeof($users_tree);
        ?>
        @foreach($users_tree as $user)
            <div class="col-sm-{{$i}} text-center form-group">


                    <span class="clearfix form-group {{($user->hasRole("admin3")?"showModal":"")}}" data-id="{{$user->id}}" data-name="{{$user->username}}">
                                <i class="fa fa-user-circle fa-2x">
                                </i>

                                <span class="text-center clearfix margin-bottom">{{$user->username}}</span>
                            </span>

                @if(count($user->childs))
                    @include('admin.permissions.sub_members',['childs' => $user->childs])
                @endif


            </div>

        @endforeach


    </div>

</div>
