<table id="example5" class="table table-bordered table-hover table-striped bg-white new_facility table-condensed" style="cursor: move;">

    <tbody>
    @php
        $total = 0;
    @endphp
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

                <tr>

                    <td>
                        <div class="dsr_new_facility {{$v->id}}_n_facility pull-left" data-target=".{{$v->id}}_n_facility"
                             value="{{$v->id}}" style="z-index: 999;">
                            {{strtoupper($v->type) }}
                            #
                            {{ $v->loan_amount }}
                            @
                            <span class="installment">{{$v->installment}}</span>

                            @php
                                $total += $v->installment;
                            @endphp
                        </div>


                    </td>

                </tr>


            @endif

        @endforeach

    @endforeach
    </tbody>

</table>
<input type="hidden" id="dsr_all_new_facility_total" value="{{$total}}"/>
