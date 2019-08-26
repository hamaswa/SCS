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


    <tr id="salary_right_bar" class="salary_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->monthly_fixed_gross) and $income->form_data->monthly_fixed_gross*1 !=0)
            <td>Monthly Fixed</td>
            <td>{{$income->form_data->monthly_fixed_gross}}</td>
            <td>{{$income->form_data->monthly_fixed_net}}</td>
        @endif
    </tr>

    <tr id="business_right_bar" class="business_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->monthly_variable_gross) and $income->form_data->monthly_variable_gross*1!=0)
            <td>Monthly Variable</td>
            <td>{{$income->form_data->monthly_variable_gross}}</td>
            <td>{{$income->form_data->monthly_variable_net}}</td>
        @endif
    </tr>

    <tr id="incometax_right_bar" class="incometax_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->annual_tax_declared_gross) and $income->form_data->annual_tax_declared_gross*1!=0)
            <td>
                Annual Tax Declared
            </td>
            <td>{{ $income->form_data->annual_tax_declared_gross }}</td>
            <td>{{ $income->form_data->annual_tax_declared_net }}</td>
        @endif
    </tr>

    <tr id="iif_right_bar" class="iif_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->iif_gross) and $income->form_data->iif_gross*1!=0)
            <td>
                Industry Income Factor
            </td>
            <td>{{ $income->form_data->iif_gross }}</td>
            <td>{{ $income->form_data->iif_net }}</td>
        @endif()
    </tr>

    <tr id="monthly_rental_right_bar" class="monthly_rental_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->monthly_rental_gross) and $income->form_data->monthly_rental_gross*1!=0)
            <td>
                Monthly Rental
            </td>
            <td>{{ $income->form_data->monthly_rental_gross }}</td>
            <td>{{ $income->form_data->monthly_rental_net }}</td>
        @endif
    </tr>

    <tr id="annual_investment_return_right_bar" class="annual_investment_return_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->annual_investment_return_gross) and $income->form_data->annual_investment_return_gross*1!=0)
            <td>
                Annual Investment Return
            </td>
            <td>{{ $income->form_data->annual_investment_return_gross }}</td>
            <td>{{ $income->form_data->annual_investment_return_net }}</td>
        @endif

    </tr>


    </tbody>
    <tfoot>
    <tr class="bg-aqua income_kyc_total_right_bar" id="income_kyc_total_right_bar">
        @if(isset($income) and isset($income->form_data) and isset($income->form_data->gross))
        <th>Total</th>
        <th>{{$income->gross}}</th>
        <th>{{$income->net}}</th>
        @endif
    </tr>

    </tfoot>
</table>
