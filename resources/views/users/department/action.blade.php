{!! Form::open(['route' => ['orders.destroy', $id], 'method' => 'post']) !!}
<div class='btn-group'>
    <input type="checkbox" > Add Orders
    <input type="checkbox" > Process Orders


</div>
{!! Form::close() !!}