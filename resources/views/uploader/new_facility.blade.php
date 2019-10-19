<table id="example5" class="table table-bordered table-hover bg-white">
    <thead>
    <tr> <th colspan="3">New Facility</th></tr>
    <tr class="bg-light-blue-gradient">
        <th>Type</th>
        <th>Amount</th>
        <th>Installment</th>
    </tr>
    </thead>
    <tbody>
    @foreach($new_facility as $k => $v)

        <tr>
            <td>
                {{strtoupper($v->type) }}

            </td>
            <td>
                {{ $v->loan_amount }}
            </td>
            <td>
                {{$v->installment}}

            </td>

        </tr>
    @endforeach
    </tbody>
</table>
