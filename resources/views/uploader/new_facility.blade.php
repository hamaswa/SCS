@if(count($new_facility)>0)
    <div data-toggle="collapse" data-target=".new_facility_right" class="panel-heading bg-gray"><strong>New Facility</strong>
    </div>
    <div class="collapse new_facility_right table-responsive">
        <table id="example5" class="table table-bordered table-hover table-striped bg-white new_facility">

            <tbody>
            <tr>
                @foreach($applicants as $applicant)
                    <td>
                        <table id="example5" class="table table-bordered table-hover table-striped bg-white">
                            <thead>
                            <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                                data-toggle="collapse" data-target=".{{ $applicant->id }}_new_facility">
                                <th colspan="3">
                                    {{ $applicant->name }}
                                </th>
                            </tr>
                            <tr class="bg-light-blue-gradient">
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Installment</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $collapse = "in";
                            @endphp

                            @foreach($applicant->facilityInfo as $k => $v)
                                @if($v->la_id==$la_id)
                                    <?php
                                    $loan_amount = 0;
                                    $installment = 0;
                                    ?>

                                    <tr class="collapse {{$collapse}} {{$applicant->id}}_new_facility">
                                        <td>
                                            {{strtoupper($v->type) }}

                                        </td>
                                        <td>
                                            <?php
                                            $loan_amount += $v->loan_amount;
                                            ?>
                                            {{ $v->loan_amount }}
                                        </td>
                                        <td>
                                            <?php
                                            $installment += $v->installment;
                                            ?>
                                            {{$v->installment}}

                                        </td>

                                    </tr>


                                @endif

                            @endforeach
                            <tr class="collapse {{$collapse}} {{$applicant->id}}_new_facility">
                                <td>
                                    Total
                                </td>
                                <td>
                                    {{ $loan_amount }}
                                </td>
                                <td>
                                    {{$installment}}

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
@endif
