
@if(isset($applicant) and $applicant->aacategory=="C")
    Hello Company Income here
@else
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

    @if(isset($incomes))
        @foreach($incomes as $income)
            @if($income->type=="salary")

                <tr id="salary_right_bar" class="salary_right_bar">
                    <td>Monthly Fixed</td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>
                </tr>
            @elseif($income->type=="business")
                <tr id="business_right_bar" class="business_right_bar">
                    <td>Monthly Variable</td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>
                </tr>
            @elseif($income->type=="incometax")
                <tr id="incometax_right_bar" class="incometax_right_bar">
                    <td>
                        Annual Tax Declared
                    </td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>
                </tr>
            @elseif($income->type=="iif")
                <tr id="iif_right_bar" class="iif_right_bar">
                    <td>
                        Industry Income Factor
                    </td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>
                </tr>
            @elseif($income->type=="monthlyrental")
                <tr id="monthly_rental_right_bar" class="monthly_rental_right_bar">
                    <td>
                        Monthly Rental
                    </td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>
                </tr>
            @elseif($income->type=="air")
                <tr id="annual_investment_return_right_bar" class="annual_investment_return_right_bar">
                    <td>
                        Annual Investment Return
                    </td>
                    <td>{{$income->gross}}</td>
                    <td>{{$income->net}}</td>

                </tr>
            @endif
        @endforeach
    @endif

    </tbody>
    <tfoot>
    <tr class="bg-aqua income_kyc_total_right_bar" id="income_kyc_total_right_bar">
        @if(isset($income_total))
            <th>Total</th>
            <th>{{$income_total->total_gross}}</th>
            <th>{{$income_total->total_net}}</th>
        @endif
    </tr>

    </tfoot>
</table>
@endif