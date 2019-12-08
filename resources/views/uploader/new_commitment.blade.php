<div data-toggle="collapse" data-target=".new_commitment_right" class="panel-heading bg-light-blue-gradient"><strong>New
        Commitment</strong></div>
<div class="collapse new_commitment_right table-responsive">
    <table class="table table-bordered table-hover bg-white new_commitment table-striped table-condensed">

        <tbody>
        <tr>
        @foreach ($applicants as $applicant)
                <td>
                    <table class="table table-bordered table-hover bg-white table-striped table-condensed">
                        <thead>
                        <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                            data-toggle="collapse" data-target=".{{ $applicant->id }}_new_commitment">
                            <th colspan="3">
                                {{ $applicant->name }}
                            </th>
                        </tr>
                        <tr class="bg-light-blue-gradient">
                            <th>Type</th>
                            <th>Monthly</th>
                            <th>DSR</th>
                        </tr>
                        </thead>
                        <tbody>

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
            $collapse = "in";
            @endphp
        @if(count($new_commitments)>0)
            @foreach($new_commitments as $k => $v)
                <tr {{ ($v->la_id!= null? "style=color:red":"") }}
                    class="collapse {{$collapse}} {{$applicant->id}}_new_commitment">

                    <td>
                        {{strtoupper($v->type) }}
                    </td>
                    @if($v->la_id==null or $v->la_id=="")
                    <td>
                        {{$v->installment}}
                        <?php
                        $total += $v->installment;
                        //$income_total += $v->net;
                        ?>

                    </td>
                    <td>
                        @if($income_total!=0)
                        {{ round(($v->installment/$income_total)*100,2) }}
                        @else
                         0
                        @endif
                    </td>
                    @else
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
                            {{$installment}}
                            <?php
                            //$income_total += $v->net;
                            ?>
                        </td>
                        <td>
                            @if($income_total!=0)
                                {{ round(($installment/$income_total)*100,2) }}
                            @else
                                0
                            @endif
                        </td>
                    @endif
                </tr>


            @endforeach
            <tr {{ ( round(($total/$income_total)*100,2)>90? "style=color:red":"") }}
                class="collapse {{$collapse}} {{$applicant->id}}_new_commitment">
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

