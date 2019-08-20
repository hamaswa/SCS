<?php
$i = 12 / count($childs);


?>
@foreach($childs as $child)
    <div class="col-sm-{{$i}} text-center form-group">
        <span class="clearfix form-group showModal" data-id="{{$child->id}}" data-name="{{ $child->username }}">
            <i class="fa fa-user-circle fa-2x">
            </i>
            <span class="text-center clearfix margin-bottom pull-left">{{ $child->username }}</span>
        </span>

        @if(count($child->childs))
            @include('admin.permissions.sub_members',['childs' => $child->childs])
        @endif

    </div>
@endforeach
