<div class="panel-heading bg-primary" data-toggle="collapse" data-target="#example5">New Commitment</div>
<table id="example5" class="table table-bordered table-hover bg-white new_commitment collapse">
    <thead>
    <tr> <th colspan="3">New Commitment </th></tr>
    <tr class="bg-light-blue-gradient">
        <th>Type</th>
        <th>Monthly</th>
        <th>DSR</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $total = 0;
    ?>
    @foreach($new_commitments as $k => $v)
        <tr {{ ($v->la_id!= null? "style=color:red":"") }}>
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
                {{ round(($v->installment/$income_total->total_net)*100,2) }}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr {{ ($v->la_id!= null? "style=color:red":"") }}>
        <td>
            Total
        </td>
        <td>
            {{$total}}
        </td>
        <td>
            @if($total!=0)
            {{ round(($total/$income_total->total_net)*100,2) }}
            @else
            0
            @endif
        </td>
    </tr>
    </tfoot>
</table>

