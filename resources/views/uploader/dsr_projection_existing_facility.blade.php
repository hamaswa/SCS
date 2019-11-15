@foreach($applicants as $data)
    <table id="example5" class="table table-bordered table-hover bg-white">
        <thead>
        <tr>
            <th colspan="6">
                {{ $data->name }}
            </th>
        </tr>
        {{--<tr class="bg-light-blue-gradient">--}}
        {{--<th>Facility</th>--}}
        {{--<th>Outstanding</th>--}}
        {{--<th>Installment</th>--}}
        {{--</tr>--}}
        </thead>
        <tbody>
        @foreach($data->facilityInfo as $k => $v)
            @if($v->la_id==null)
                <tr class="dsr_existing_facility">
                    <td><input type="checkbox" data-target=".{{$v->id}}_e_facility" value="{{$v->id}}"
                               class="dsr_e_facility_chkbox"></td>
                    <td class="{{$v->id}}_e_facility">
                        {{strtoupper($v->type) }}
                        #
                        {{ $v->facilityoutstanding }}
                        @
                        <span class="installment">{{$v->installment}}</span>

                    </td>
                </tr>
            @endif
        @endforeach


        </tbody>

    </table>

@endforeach