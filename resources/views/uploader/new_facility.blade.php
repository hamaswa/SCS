@if(count($new_facility)>0)
    <div data-toggle="collapse" data-target=".new_facility" class="panel-heading bg-gray"><strong>New Facility</strong>
    </div>
    <div id="new_facility" class="collapse new_facility">
        <table id="example5" class="table table-bordered table-hover table-striped bg-white new_facility">
            <thead>

            <tr class="bg-light-blue-gradient">
                <th>Type</th>
                <th>Amount</th>
                <th>Installment</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applicants as $applicant)
                <tr><td colspan="3">
                        {{ $applicant->name }}
                    </td> </tr>

                @foreach($applicant->facilityInfo as $k => $v)
                    @if($v->la_id==$la_id)
                        <?php
                        $loan_amount = 0;
                        $installment = 0;
                        ?>

                        <tr>
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
                        <tr>
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
                    @endif

                @endforeach
            @endforeach
            </tbody>

        </table>
    </div>
@endif
