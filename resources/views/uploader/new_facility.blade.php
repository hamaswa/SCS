@if(count($new_facility)>0)
<table id="example5" class="table table-bordered table-hover bg-white new_facility">
    <thead>
    <tr> <th colspan="3">New Facility</th></tr>
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
@endif
