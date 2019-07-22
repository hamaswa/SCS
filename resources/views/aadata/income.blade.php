<strong class="applicant padding-5"></strong>
<div class="table-responsive" id="incomekyc_right">
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="bg-light-blue">
        <tr class="bg-light-blue-gradient">
            <th colspan="3" class="text-center">Monthly Income</th>
        </tr>
        <tr class="bg-aqua">
            <th>Type</th>
            <th>Gross</th>
            <th>Net</th>

        </tr>
        </thead>
        <tbody>


        <tr id="salary_right_bar">
            <td>Monthly Fixed</td>
            <td>{{$income->form_data->monthly_fixed_gross}}</td>
            <td>{{$income->form_data->monthly_fixed_net}}</td>
        </tr>

        <tr id="business_right_bar">
            <td>Monthly Variable</td>
            <td>{{$income->form_data->monthly_variable_gross}}</td>
            <td>{{$income->form_data->monthly_variable_net}}</td>
        </tr>

        <tr id="incometax_right_bar">
            <td>
                Annual Tax Declared
            </td>
            <td>{{ $income->form_data->annual_investment_return_gross }}</td>
            <td>{{ $income->form_data->annual_investment_return_net }}</td>
        </tr>

        <tr id="iif_right_bar">
            <td>
                Industry Income Factor
            </td>
            <td>{{ $income->form_data->iif_gross }}</td>
            <td>{{ $income->form_data->iif_net }}</td>
        </tr>

        <tr id="monthly_rental_right_bar">
            <td>
                Monthly Rental
            </td>
            <td>{{ $income->form_data->monthly_rental_gross }}</td>
            <td>{{ $income->form_data->monthly_rental_net }}</td>
        </tr>

        <tr id="annual_investment_return_right_bar">
            <td>
                Annual Investment Return
            </td>
            <td>{{ $income->form_data->annual_tax_declared_gross }}</td>
            <td>{{ $income->form_data->annual_tax_declared_net }}</td>
        </tr>



        </tbody>
        <tfoot>
        <tr  class="bg-aqua" id="income_kyc_total_right_bar">
            <th>Total</th>
            <th>{{$income->gross}}</th>
            <th>{{$income->net}}</th>

        </tr>

        </tfoot>
    </table>
</div>
<div class="table-responsive" id="wealthkyc_right">
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

        <tr id="wealth_saving_right">
            <td>Saving</td>
            <td>{{$wealth->form_data->saving_amount}}</td>
        </tr>

        <tr id="wealth_epf_right">
            <td>EPF Account Balance</td>
            <td>{{$wealth->form_data->epf_amount}}</td>
        </tr>

        <tr id="wealth_tpf_right">
            <td>Total Fixed Deposits</td>
            <td>{{$wealth->form_data->tpf_amount}}</td>
        </tr>

        <tr id="wealth_tsv_right">
            <td>Total Shares Value</td>
            <td>{{$wealth->form_data->tsv_amount}}</td>
        </tr>

        <tr id="wealth_utv_right">
            <td>Unit Trust Value</td>
            <td>{{$wealth->form_data->utv_amount}}</td>
        </tr>

        </tbody>
        <tfoot>
        <tr class="bg-yellow-light" id="wealth_total_right">
            <td>Total</td>
            <td>{{ $wealth->total }}</td>

        </tr>
        </tfoot>
    </table>
</div>

<div class="table-responsive" id="propertykyc_right">
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="bg-light-blue">
        <tr class="bg-light-blue-gradient">
            <th colspan="3" class="text-center">Property</th>
        </tr>
        <tr class="bg-aqua">
            <th>MV</th>
            <th>OS</th>
            <th>CO</th>
        </tr>
        </thead>
        <tbody id="propertyright">
        <?php
                $total_mv = 0;
                $total_os =0;
                $total_co=0;

        ?>
        @foreach($properties as  $property)
            <?php
            $total_mv += $property->property_market_value;
            $total_os +=$property->property_loan_outstanding;

            ?>
         <tr>
                <td>{{$property->property_market_value}}</td>
                <td>{{$property->property_loan_outstanding}}</td>
                <td>{{ ($property->property_market_value * (0.9) - $property->property_loan_outstanding*1) }}</td>
            </tr>
        @endforeach
        <tr class='bg-green'><td colspan=3>Total</td></tr>
        <tr class=bg-green>
            <td>{{$total_mv}}</td>
            <td>{{$total_os}}</td>
            <td>{{ $total_mv * (0.9) - $total_os }}</td>
        </tr>

        </tbody>

    </table>
</div>