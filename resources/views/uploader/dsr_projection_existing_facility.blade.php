@foreach($applicants as $data)
    <table id="example5" class="table table-bordered table-hover bg-white table-condensed" style="cursor: move;">
        <thead>
        <tr class="bg-aqua-active text-white font-weight-bolder with-border">
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
                <tr>
                    <td>
                        <div class="dsr_existing_facility {{$v->id}}_e_facility pull-left" data-target=".{{$v->id}}_e_facility"
                             value="{{$v->id}}" style="z-index: 999;">
                            {{strtoupper($v->type) }}
                            #
                            {{ $v->facilityoutstanding }}
                            @
                            <span class="installment">{{$v->installment}}</span>
                        </div>


                    </td>
                </tr>
            @endif
        @endforeach


        </tbody>

    </table>

@endforeach