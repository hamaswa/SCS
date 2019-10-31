<div data-toggle="collapse" data-target="#existing_commitment" class="panel-heading bg-gray"><strong>Existing Commitment</strong></div>
<div id="existing_commitment" class="collapse">
<table  class="table table-bordered table-hover bg-white existing_commitment">
    <thead>

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
</div>