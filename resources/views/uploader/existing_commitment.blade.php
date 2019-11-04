<div data-toggle="collapse" data-target=".right_existing_commitment" class="panel-heading bg-aqua"><strong>Existing
        Commitment</strong></div>
<div id="existing_commitment" class="collapse right_existing_commitment">
    <table class="table table-bordered table-hover bg-white existing_commitment">
        <thead>

        <tr class="bg-light-blue-gradient">
            <th>Type</th>
            <th>Monthly</th>
            <th>DSR</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applicants as $applicant)
            <tr class="bg-aqua-active text-red font-weight-bolder with-border">
                <td colspan="3">
                    <h4 class="col-lg-12">{{ $applicant->name }}</h4>
                </td>
            </tr>

            @php
                $total = 0;
                $existing_commitments = $applicant->facilityInfo()->where("la_id",'=', null)->get();
                $income_total=$applicant->applicantIncome()->sum('net')
            @endphp
            @foreach($existing_commitments as $k => $v)

                <tr>
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
            <tr>
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

        @endforeach
        </tbody>
    </table>
</div>