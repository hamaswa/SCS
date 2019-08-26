    <table class="table table-bordered table-striped bg-white">
    <thead class="bg-light-blue">
    <tr class="bg-light-blue-gradient">
        <th colspan="3" class="text-center">Wealth</th>
    </tr>
    <tr class="bg-aqua">
        <th>Type</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>

    <tr id="wealth_saving_right" class="wealth_saving_right">
        @if(isset($wealth) and isset($wealth->form_data) and isset($wealth->form_data->saving_amount) and $wealth->form_data->saving_amount*1!=0)
            <td>Saving</td>
            <td>{{ round($wealth->form_data->saving_amount * ((isset($wealth->form_data->saving_acctype) and $wealth->form_data->saving_acctype=="own")?1:.5))}}</td>
        @endif
    </tr>

    <tr id="wealth_epf_right" class="wealth_epf_right">
        @if(isset($wealth) and isset($wealth->form_data) and isset($wealth->form_data->epf_amount) and $wealth->form_data->epf_amount*1!=0)
            <td>EPF Account Balance</td>
            <td>{{$wealth->form_data->epf_amount}}</td>
        @endif
    </tr>

    <tr id="wealth_tpf_right" class="wealth_tpf_right">
        @if(isset($wealth) and isset($wealth->form_data) and isset($wealth->form_data->tpf_amount) and $wealth->form_data->tpf_amount*1!=0)
            <td>Total Fixed Deposits</td>
            <td>{{ round($wealth->form_data->tpf_amount * ((isset($wealth->form_data->tpf_acctype) and $wealth->form_data->tpf_acctype=="own")?1:.5))}}</td>
        @endif
    </tr>

    <tr id="wealth_tsv_right" class="wealth_tsv_right">
        @if(isset($wealth) and isset($wealth->form_data) and isset($wealth->form_data->tsv_amount) and $wealth->form_data->tsv_amount*1!=0)
            <td>Total Shares Value</td>
            <td>{{$wealth->form_data->tsv_amount}}</td>
        @endif
    </tr>

    <tr id="wealth_utv_right" class="wealth_utv_right">
        @if(isset($wealth) and isset($wealth->form_data) and isset($wealth->form_data->utv_amount) and $wealth->form_data->utv_amount*1!=0)
            <td>Unit Trust Value</td>
            <td>{{$wealth->form_data->utv_amount}}</td>
        @endif
    </tr>

    </tbody>
    <tfoot>
    <tr class="bg-yellow-light wealth_total_right" id="wealth_total_right">
        @if(isset($wealth) and isset($wealth->form_data) and $wealth->form_data->total)
        <td>Total</td>
        <td>{{ $wealth->total }}</td>
        @endif

    </tr>
    </tfoot>
</table>
