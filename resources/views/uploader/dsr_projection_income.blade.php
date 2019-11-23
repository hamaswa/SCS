@if(isset($applicants))
    @php
        $total = 0;
    @endphp
    <table class="table table-bordered table-striped table-hover bg-white table-condensed" style="cursor: move;">

        <tbody>

        @foreach($applicants as $applicant)

            <tr class="bg-aqua-active text-white font-weight-bolder with-border">
                <th>
                    {{ $applicant->name }}
                </th>
            </tr>

            @foreach($applicant->applicantIncome as $k => $income)
                <tr>

                    @if($income->type=="salary")

                        <td class="{{$income->id}}_income" id="{{$income->id}}_income">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Monthly Fixed@
                                <span class="income_net">{{$income->net}}</span>
                            </div>
                        </td>
                    @elseif($income->type=="business")
                        <td class="{{$income->id}}_income" id="{{$income->id}}_income">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Monthly Variable@
                                <span class="income_net">{{$income->net}}</span>
                            </div>

                        </td>
                    @elseif($income->type=="incometax")
                        <td class="{{$income->id}}_income" id="{{$income->id}}_income">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Annual Tax Declared@
                                <span class="income_net">{{$income->net}}</span>
                            </div>

                        </td>
                    @elseif($income->type=="iif")
                        <td class="{{$income->id}}_income" id="{{$income->id}}_income">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Industry Income Factor@
                                <span class="income_net">{{$income->net}}</span>
                            </div>

                        </td>
                    @elseif($income->type=="monthlyrental")
                        <td class="{{$income->id}}_income" id="{{$income->id}}_incomes">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Monthly Rental@
                                <span class="income_net">{{$income->net}}</span>
                            </div>

                        </td>
                    @elseif($income->type=="air")
                        <td class="income {{$income->id}}_income" id="income {{$income->id}}_income">
                            <div class="dsr_income {{$income->id}}_income pull-left" data-target=".{{$income->id}}_income"
                                 value="{{$income->id}}" style="z-index: 999;">
                                Annual Investment Return@
                                <span class="income_net">{{$income->net}}</span>
                            </div>

                        </td>
                    @endif
                </tr>
                @php
                    $total += $income->net;
                @endphp
            @endforeach

        @endforeach

        </tbody>
    </table>
@endif
<input type="hidden" id="dsr_all_income_total" value="{{$total}}"/>

