
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default mr-2'>
        <i class="glyphicon glyphicon-edit">Edit</i>
    </a>

    {!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete', 'class'=>'btn']) !!}

    {!! Form::button('<i class="glyphicon glyphicon-trash">Delete</i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    {!! Form::close() !!}
