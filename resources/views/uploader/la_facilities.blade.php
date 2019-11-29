@foreach($applicants as $data)
    <table id="example5" class="table table-bordered table-hover bg-white">
        <thead>
        <tr><th colspan="6">
                {{ $data->name }}
            </th> </tr>
        <tr class="bg-light-blue-gradient">
            <th>Facility</th>
            <th>Facility Date</th>
            <th>STS</th>
            <th>Capacity</th>
            <th>Facility Limit</th>
            <th>Col Type</th>
            <th>Outstanding</th>
            <th>Installment Amount</th>
            <th>Select</th>
        </tr>
        </thead>
        <tbody>
        @php
            $facility_covered = app('App\Http\Controllers\Uploader\UploaderController')->checkFacilityIfCovered(request()->all())
        @endphp
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
                    {{$v->sts}}
                </td>


                <td>
                    {{ $v->capacity }}
                </td>
                <td>
                    {{$v->facilitylimit}}


                </td>
                <td>
                    {{$v->col_type}}
                </td>
                <td>
                    {{$v->facilityoutstanding}}

                </td>
                <td>
                    {{$v->adverse_remark}}
                </td>



                <td>
                    @php
                     $ar = explode(",",$facility_covered);

                    @endphp
                     <input type="checkbox" class="facility_covered" name="facility_covered[]"
                            data-id="{{$data->id}}" value="{{$v->id}}"
                     {{ in_array($v->id, $ar)?"checked":""  }}>
                </td>
            </tr>
         @endif
        @endforeach


        </tbody>

    </table>

@endforeach