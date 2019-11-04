<div data-toggle="collapse" data-target="#new_commitment" class="panel-heading bg-primary"><strong>New
        Commitment</strong></div>
<div id="new_commitment" class="collapse">
    <table class="table table-bordered table-hover bg-white new_commitment">
        <thead>
        <tr class="bg-light-blue-gradient">
            <th>Type</th>
            <th>Monthly</th>
            <th>DSR</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($applicants as $applicant)
            <tr class="bg-aqua-active text-red font-weight-bolder with-border">
                <td colspan="3">
                    <h4 class="col-lg-12">{{ $applicant->name }}</h4>
                </td>
            </tr>
            @php
                $new_commitments= $applicant->facilityInfo()
                        ->whereRaw(
                        "(applicant_id = '" . $applicant->id . "'
                        and la_id  is NULL "
                        . (($facility_covered!="" OR $facility_covered!=null)? "and id not in ($facility_covered)": "").
                        " )"
                        . " OR (la_id = '".  $inputs['la_id']."' and  applicant_id = '" . $applicant->id . "')")
                        ->get();
             $total = 0;
            $income_total=$applicant->applicantIncome()->sum('net');

            @endphp
        @if(count($new_commitments)>0)
            @foreach($new_commitments as $k => $v)
                <tr {{ ($v->la_id!= null? "style=color:red":"") }}>
                    <td>
                        {{strtoupper($v->type) }}
                    </td>
                    <td>
                        {{$v->installment}}
                        <?php
                        $total += $v->installment;
                        $income_total += $v->net;
                        ?>

                    </td>
                    <td>
                        @if($income_total!=0)
                        {{ round(($v->installment/$income_total)*100,2) }}
                        @else
                         0
                        @endif
                    </td>
                </tr>

            @endforeach
            <tr {{ ($v->la_id!= null? "style=color:red":"") }}>
                <td>
                    Total
                </td>
                <td>
                    {{$total}}
                </td>
                <td>
                    @if($total!=0 and $income_total!=0)
                        {{ round(($total/$income_total)*100,2) }}
                    @else
                        0
                    @endif
                </td>
            </tr>
        @endif
        @endforeach


        </tbody>
    </table>
</div>

