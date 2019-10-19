<table id="example5" class="table table-bordered table-hover bg-white">
    <thead>
    <tr> <th colspan="3">New Commitment </th></tr>
    <tr class="bg-light-blue-gradient">
        <th>Type</th>
        <th>Montyly</th>
        <th>DSR</th>
    </tr>
    </thead>
    <tbody>
    @foreach($new_commitments as $k => $v)

        <tr {{ ($v->la_id!= null? "style=color:red":"") }}>
            <td>
                {{strtoupper($v->type) }}

            </td>
            <td>
                {{$v->installment}}

            </td>
            <td>
                DSR
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
