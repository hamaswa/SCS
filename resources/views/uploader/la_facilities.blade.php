@foreach($applicants as $data)
    <table id="example5" class="table table-bordered table-hover bg-white">
        <thead>
        <tr class="bg-light-blue-gradient">
            <th>Facility</th>
            <th>Facility Date</th>
            <th>Capacity</th>
            <th>Facility Limit</th>
            <th>Outstanding</th>
            <td>Select</td>
        </tr>
        </thead>
        <tbody>
        @foreach($data->facilityInfo as $k => $v)
         @if($v->la_id==null)
            <tr>
                <td data-id="{{$v->id}}">
                    {{strtoupper($v->type) }}

                </td>
                <td>
                    {{$v->facilitydate}}
                </td>


                <td>
                    {{ $v->capacity }}
                </td>
                <td>
                    {{$v->facilitylimit}}


                </td>
                <td>
                    {{$v->facilityoutstanding}}

                </td>



                <td>
                    <input type="checkbox" class="facility_covered" name="facility_covered[]" data-id="{{$data->id}}" value="{{$v->id}}">
                </td>
            </tr>
         @endif
        @endforeach


        </tbody>
        <tfoot>
        <tr>
            <td colspan="9">
                <label>CURRENT COMMITMENT</label>
            </td>
        </tr>
        </tfoot>
    </table>

@endforeach