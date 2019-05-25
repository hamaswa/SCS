{!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
<!--<a href="{{ route('orders.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>-->
    <a href="{{ route('orders.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit">Edit</i>
    </a>


    {!! Form::button('<i class="glyphicon glyphicon-trash">Delete</i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}

</div>
{!! Form::close() !!}