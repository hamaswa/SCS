<select name="{{$name}}" id="{{$name}}"  class="{{isset($class)?$class:"form-control"}}">
    @foreach($options as $option)
        @if($option->type==$type)
            <option value="{{$option->name}}" {{ (isset($value) and $option->name==$value)?"selected":"" }}>
                {{ $option->description }}
            </option>
        @endif
    @endforeach
</select>