<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('name', $user->email, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('did_no', 'Did No:') !!}
    {!! Form::text('did_no', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- Extension Field -->
<div class="form-group col-sm-6">
{!! Form::label('extension', 'Extension:') !!}
{!! Form::select('extension', $extension, $selected, array('class'=>'form-control','multiple' => 'multiple','name'=>'extension[]')); !!}


</div>
<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="radio-inline">
        {!! Form::radio('status', "1", null) !!} Active
    </label>

    <label class="radio-inline">
        {!! Form::radio('status', "0", null) !!} Inactive
    </label>

</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
