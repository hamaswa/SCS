<tr style="background-color: #c6d8f2;">
    <td>
        <select name="type" id="type" class="form-control select2">
            @foreach($capacity_data as $capacity)
                <option value="{{$capacity->name}}">
                    {{ $capacity->description }}
                </option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="number" name="loan_tenure" required  id="loan_tenure" class="form-control my-colorpicker1"
               style="background-color: #fff;">
    </td>
    <td>
        <input type="number" name="interest_rate" id="interest_rate" class="form-control my-colorpicker1"
               style="background-color: #fff;">
    </td>
    <td>
        <input type="number" name="loan_amount" id="loan_amount" class="form-control my-colorpicker1"
               style="background-color: #fff;">
    </td>
    <td>

    </td>
    <td>
        <button class="btn btn-success btn-xs text-white" id="Add"> <i class="fa fa-plus"></i> </button>
    </td>

</tr>
<tr>
    <td class="add-button">
        <button type="button" id="facility_submit" class="btn bg-maroon btn-flat margin">ADD</button>
    </td>
</tr>
<script type="text/javascript">
    $(document).ready(function (e) {
        $('.select2').select2({allowClear: true});
    });
</script>