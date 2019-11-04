@if(isset($applicants))

    @if(isset($applicant) and $applicant->aacategory=="C")
        <div data-toggle="collapse" data-target=".right_income_new" class="panel-heading bg-light-blue-gradient"><strong>Income</strong></div>
        <div class="collapse in right_income_new">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead class="bg-light-blue">


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
        </div>
        <div data-toggle="collapse" data-target=".right_payments" class="panel-heading bg-light-blue-gradient"><strong>Payments</strong></div>
        <div id="right_payments" class="collapse right_payments">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead class="bg-light-blue">

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
        </div>

    @else
        <div data-toggle="collapse" data-target=".right_monthly_income" class="panel-heading bg-light-blue-gradient"><strong>Monthly Income</strong></div>
        <div id="right_monthly_income" class="collapse in right_monthly_income">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead class="bg-light-blue">

            <tr class="bg-aqua">
                <th>Type</th>
                <th>Gross</th>
                <th>Net</th>

            </tr>
            </thead>
            <tbody>
            @php
                $collapse = "in";
            @endphp
            @foreach($applicants as $applicant)
                @php
                   $total_gross=0;
                   $total_net=0;
                @endphp
                <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                    data-toggle="collapse" data-target=".{{ $applicant->name }}_income">
                    <th colspan="3">
                        {{ $applicant->name }}
                    </th>
                </tr>

                @foreach($applicant->applicantIncome as $k => $income)
                    @php
                       $total_gross += $income->gross;
                       $total_net +=$income->net;
                    @endphp
                    @if($income->type=="salary")

                        <tr id="salary_right_bar" class="salary_right_bar collapse
                        {{$collapse}} {{$applicant->name}}_income">
                            <td>Monthly Fixed</td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>
                        </tr>
                    @elseif($income->type=="business")
                        <tr id="business_right_bar"
                            class="business_right_bar collapse {{$collapse}} {{$applicant->name}}_income">
                            <td>Monthly Variable</td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>
                        </tr>
                    @elseif($income->type=="incometax")
                        <tr id="incometax_right_bar"
                            class="incometax_right_bar collapse {{$collapse}} {{$applicant->name}}_income">
                            <td>
                                Annual Tax Declared
                            </td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>
                        </tr>
                    @elseif($income->type=="iif")
                        <tr id="iif_right_bar" class="iif_right_bar collapse {{$collapse}} {{$applicant->name}}_income">
                            <td>
                                Industry Income Factor
                            </td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>
                        </tr>
                    @elseif($income->type=="monthlyrental")
                        <tr id="monthly_rental_right_bar"
                            class="monthly_rental_right_bar collapse {{$collapse}} {{$applicant->name}}_income">
                            <td>
                                Monthly Rental
                            </td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>
                        </tr>
                    @elseif($income->type=="air")
                        <tr id="annual_investment_return_right_bar"
                            class="annual_investment_return_right_bar collapse {{$collapse}} {{$applicant->name}}_income">
                            <td>
                                Annual Investment Return
                            </td>
                            <td>{{$income->gross}}</td>
                            <td>{{$income->net}}</td>

                        </tr>
                    @endif
                @endforeach
                <tr class="bg-aqua income_kyc_total_right_bar
                collapse {{$collapse}} {{$applicant->name}}_income"
                    id="income_kyc_total_right_bar">
                    @if(isset($total_gross) and $total_gross!=0)
                        <th>Total</th>
                        <th>{{$total_gross}}</th>
                        <th>{{$total_net}}</th>
                    @endif
                </tr>
                @php
                    $collapse = "out";
                @endphp
            @endforeach

            </tbody>
        </table>
        </div>
    @endif

@endif