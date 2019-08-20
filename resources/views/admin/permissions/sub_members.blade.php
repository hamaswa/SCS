<?php
$i = 12 / count($childs);


?>
@foreach($childs as $child)
    <div class="col-sm-{{$i}} text-center form-group">
        <span class="clearfix form-group showModal" data-id="{{$child->id}}">
            <i class="fa fa-user-circle fa-2x">
            </i>
                            <span class="text-center clearfix">{{ $child->username }}</span>
        </span>

        @if(count($child->childs))
            @include('admin.permissions.sub_members',['childs' => $child->childs])
        @endif

    </div>
@endforeach
