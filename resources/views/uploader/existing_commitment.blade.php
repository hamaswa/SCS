<div data-toggle="collapse" data-target=".right_existing_commitment"
     class="panel-heading bg-light-blue-gradient"><strong>Existing
        Commitment</strong></div>
<div id="existing_commitment" class="collapse right_existing_commitment table-responsive">
    <table class="table table-bordered table-hover bg-white existing_commitment table-striped table-condensed">
        <tbody>
        <tr>
            @foreach($applicants as $applicant)
                <td>
                    <table class="table table-bordered table-hover bg-white table-striped table-condensed">
                        <thead>
                        <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                            data-toggle="collapse" data-target=".{{ $applicant->id }}_existing_commitment">
                            <th colspan="3">
                                {{ $applicant->name }}
                            </th>
                        </tr>
                        <tr class="bg-gray-dark">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR</th>
                        </tr>
                        </thead>
                        <tbody>


                        @php
                            $total = 0;
                            $existing_commitments = $applicant->facilityInfo()->where("la_id",'=', null)->get();
                            $income_total=$applicant->applicantIncome()->sum('net');
                            $collapse="in";
                        @endphp
                        @foreach($existing_commitments as $k => $v)

                            <tr class="collapse {{$collapse}} {{$applicant->id}}_existing_commitment">
                                <td>
                                    {{strtoupper($v->type) }}

                                </td>
                                @php
                                    $v->installment = intval(preg_replace('/[^\d.]/', '', $v->installment));

                                        switch(strtolower($v->type)){
                                            case "crdtcard":
                                            $installment= $v->facilityoutstanding * .05;
                                            break;

                                            case "ovrdraft":
                                            $installment =  ($v->facilitylimit * .07) / 12;
                                            break;

                                            case "ohrpcrec":
                                            if($v->installment!="") {
                                                if(strtolower($v->capacity)=='own')
                                                    $installment =  $v->installment;
                                                else
                                                    $installment = $v->installment/2 ;
                                                    }

                                            break;
                                            default :
                                            if($v->installment!="") {
                                                if(strtolower($v->capacity)=='own')
                                                    $installment =  $v->installment;
                                                else
                                                    $installment = $v->installment/2;
                                                    }


                                            break;

                                        }
                                $total +=$installment;
                                @endphp

                                <td>
                                    {{round($installment,2)}}
                                        @php
                                            $total += $installment;
                                        @endphp


                                </td>
                                <td>
                                    @if($income_total==0)
                                        0
                                    @else
                                    {{ round(($installment/$income_total)*100,2) }}
                                    @endif


                                </td>
                            </tr>
                        @endforeach
                        <tr class="collapse {{$collapse}} {{$applicant->id}}_existing_commitment">
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
                            //$collapse = "out";
                        @endphp
                        </tbody>
                    </table>
                </td>
            @endforeach
        </tr>
        </tbody>
    </table>
</div>