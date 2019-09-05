{!! Form::open(['route' => ['aafields.update', $id], 'method' => 'post']) !!}
@method("patch")
<div class='btn-group'>
<!--<a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>-->
    {{--<a href="{{ route('aafields.edit', $id) }}" class='btn btn-default btn-xs'>--}}
        {{--<i class="glyphicon glyphicon-edit"></i>--}}
    {{--</a>--}}
@if($status==1)
    <input type="hidden" value="0" name="status">
    @else
    <input type="hidden" value="1" name="status">
    @endif

    {!! Form::button(($status==1?"Deactivate":"Activate"), [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure you want to ". ($status==1?"Deactivate":"Activate")."?')"
    ]) !!}

</div>
{!! Form::close() !!}