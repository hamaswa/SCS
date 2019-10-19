@foreach($facilities as $facility)
<tr style="background-color: #c6d8f2;">
    <td>
        <input type="hidden" name="id" value="{{$facility->id}}" >
        <input type="hidden" name="la_id" value="{{$facility->la_id}}" >
        <select name="type" id="type">
            @foreach($capacity_data as $capacity)
                <option {{ ($capacity->name==$facility->type?"selected":"") }} value="{{$capacity->name}}">
                    {{ $capacity->description }}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="number" name="loan_tenure" required  id="loan_tenure" class="form-control my-colorpicker1"
               value ="{{ $facility->loan_tenure }}"
               style="background-color: #fff;">
    </td>
    <td>
        <input type="number" name="interest_rate" id="interest_rate" class="form-control my-colorpicker1"
               value ="{{ $facility->interest_rate }}"
                       style="background-color: #fff;">
    </td>
    <td>
        <input type="number" name="loan_amount" id="loan_amount" class="form-control my-colorpicker1"
               value ="{{ $facility->loan_amount }}"
               style="background-color: #fff;">
    </td>
    <td>
        <button class="btn btn-default" id="facility_submit">Update</button>
        <button class="btn btn-default" data-id="{{$facility->id}}" id="facility_delete">Delete</button>
    </td>

</tr>
@endforeach