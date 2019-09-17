<select name="{{$name}}" id="{{$name}}"  class="{{isset($class)?$class:"form-control"}}">
   @if(isset($default) and $default!="")
        <option value="">{{$default}}</option>
    @endif
    @foreach($options as $option)
        @if($option->type==$type)
            <option value="{{$option->name}}" {{ (isset($value) and $option->name==$value)?"selected":"" }}>
                {{ $option->description }}
            </option>
        @endif
    @endforeach
</select>