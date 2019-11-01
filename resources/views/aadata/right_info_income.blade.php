@if(isset($applicants))
    @foreach($applicants as $applicant)
        {{ $applicant->name }}

        @if(isset($applicant) and $applicant->aacategory=="C")
            <table class="table table-bordered table-striped table-hover bg-white">
                <thead class="bg-light-blue">
                <tr class="bg-light-blue-gradient">
                    <th colspan="3" class="text-center">Income</th>
                </tr>

                </thead>
                <tbody>

                @if(isset($incomes))
                    <?php $i = 0;
                    $ebitda_total = 0;
                    ?>
                    @foreach($incomes as $income)
                        @if($income->sub_type=="ebitda")
                            <?php
                            $i++;
                            $ebitda_total += $income->gross;
                            ?>
                            <tr id="salary_right_bar" class="salary_right_bar">
                                <td>EBITDA{{ $i }}</td>
                                <td>{{$income->gross}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
                <tfoot>
                <tr class="bg-aqua income_kyc_total_right_bar" id="income_kyc_total_right_bar">
                    @if(isset($ebitda_total))
                        <th>Total</th>
                        <th>{{$ebitda_total}}</th>
                    @endif
                </tr>

                </tfoot>
            </table>
            <table class="table table-bordered table-striped table-hover bg-white">
                <thead class="bg-light-blue">
                <tr class="bg-light-blue-gradient">
                    <th colspan="3" class="text-center">Payments</th>
                </tr>

                </thead>
                <tbody>

                @if(isset($incomes))
                    <?php $i = 0;
                    $payments_total = 0;
                    ?>
                    @foreach($incomes as $income)
                        @if($income->sub_type=="payments")
                            <?php
                            $i++;
                            $payments_total += $income->gross;
                            ?>
                            <tr id="salary_right_bar" class="salary_right_bar">
                                <td>Payment{{ $i }}</td>
                                <td>{{$income->gross}}</td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                </tbody>
                <tfoot>
                <tr class="bg-aqua income_kyc_total_right_bar" id="income_kyc_total_right_bar">
                    @if(isset($payments_total))
                        <th>Total</th>
                        <th>{{$payments_total}}</th>
                    @endif
                </tr>

                </tfoot>
            </table>

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

                @foreach($applicant->applicantIncome as $k => $income)
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

    @endforeach
@endif