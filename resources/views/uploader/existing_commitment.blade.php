<div data-toggle="collapse" data-target=".right_existing_commitment"
     class="panel-heading bg-light-blue-gradient"><strong>Existing
        Commitment</strong></div>
<div id="existing_commitment" class="collapse right_existing_commitment">
    <table class="table table-bordered table-hover bg-white existing_commitment">
        <thead>

        <tr class="bg-aqua-gradient">
            <th>Type</th>
            <th>Monthly</th>
            <th>DSR</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $applicant)
            <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                data-toggle="collapse" data-target=".{{ $applicant->name }}_existing_commitment">
                <th colspan="3">
                    {{ $applicant->name }}
                </th>
            </tr>

            @php
                $total = 0;
                $existing_commitments = $applicant->facilityInfo()->where("la_id",'=', null)->get();
                $income_total=$applicant->applicantIncome()->sum('net');
                $collapse="in";
            @endphp
            @foreach($existing_commitments as $k => $v)

                <tr class="collapse {{$collapse}} {{$applicant->name}}_existing_commitment">
                    <td>
                        {{strtoupper($v->type) }}

                    </td>
                    <td>
                        {{$v->installment}}
                        <?php
                        $total += $v->installment;
                        ?>

                    </td>
                    <td>
                        {{ round(($v->installment/$income_total)*100,2) }}
                    </td>
                </tr>



            @endforeach
            <tr class="collapse {{$collapse}} {{$applicant->name}}_existing_commitment">
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
            @php
                $collapse = "out";
            @endphp
        @endforeach
        </tbody>
    </table>
</div>