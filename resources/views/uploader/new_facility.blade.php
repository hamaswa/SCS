@if(count($new_facility)>0)
    <div data-toggle="collapse" data-target="#new_facility" class="panel-heading bg-gray"><strong>New Facility</strong></div>
    <div id="new_facility" class="collapse">
        <table id="example5" class="table table-bordered table-hover bg-white new_facility">
            <thead>

            <tr class="bg-light-blue-gradient">
                <th>Type</th>
                <th>Amount</th>
                <th>Installment</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $loan_amount=0;
            $installment=0;
            ?>
            @foreach($new_facility as $k => $v)

                <tr>
                    <td>
                        {{strtoupper($v->type) }}

                    </td>
                    <td>
                        <?php
                            $loan_amount +=$v->loan_amount;
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
            @endforeach
            </tbody>
            <tfoot>
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
            </tfoot>
        </table>
    </div>
@endif
