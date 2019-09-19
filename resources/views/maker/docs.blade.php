<label class="control-label">{{$label}}</label>
<select name="{{$name}}" id="{{$id}}"  class="form-control">
   @foreach($options as $option)
        @if($option->type==$type)
            <option value="{{$option->name}}" {{ (isset($value) and $option->name==$value)?"selected":"" }}>
                {{ $option->description }}
            </option>
        @endif
    @endforeach
</select>