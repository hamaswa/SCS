<table id="example5" class="table table-bordered table-hover table-striped bg-white new_facility">

    <tbody>
    @foreach($applicants as $applicant)
        <tr class="bg-aqua-active text-white font-weight-bolder with-border">
            <th colspan="3">
                {{ $applicant->name }}
                {{ $applicant->id }}
            </th>
        </tr>
        @php
            $new_facility = $applicant->facilityInfo()->where("la_id","=",$la_id)->get();
        @endphp

        @foreach($new_facility as $k => $v)
            @if($v->la_id==$la_id)

                <tr class="dsr_new_facility">
                    <td><input type="checkbox" data-target=".{{$v->id}}_n_facility" value="{{$v->id}}"
                               class="dsr_n_facility_chkbox"></td>
                    <td class="{{$v->id}}_n_facility">
                        {{strtoupper($v->type) }}
                        #
                        {{ $v->loan_amount }}
                        @
                        <span class="installment">{{$v->installment}}</span>

                    </td>

                </tr>


            @endif

        @endforeach

    @endforeach
    </tbody>

</table>
