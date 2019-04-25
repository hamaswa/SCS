<div class='btn-group'>
<a href="{{ route('users.departments', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open">Departments</i>
    </a>
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit">Edit</i>
    </a>

    {!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}

    {!! Form::button('<i class="glyphicon glyphicon-trash">Delete</i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    {!! Form::close() !!}
</div>
