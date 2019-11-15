@if(isset($applicants))
    <table class="table table-bordered table-striped table-hover bg-white">

        <tbody>

        @foreach($applicants as $applicant)

            <tr class="bg-aqua-active text-white font-weight-bolder with-border">
                <th colspan="3">
                    {{ $applicant->name }}
                </th>
            </tr>

            @foreach($applicant->applicantIncome as $k => $income)
                <tr class="dsr_income">
                    <td><input type="checkbox" data-target=".{{$income->id}}_income" value="{{$income->id}}"
                               class="dsr_income_chkbox"></td>
                    @if($income->type=="salary")

                        <td class="{{$income->id}}_income">
                            Monthly Fixed@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @elseif($income->type=="business")
                        <td class="{{$income->id}}_income">
                            Monthly Variable@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @elseif($income->type=="incometax")
                        <td class="{{$income->id}}_income">
                            Annual Tax Declared@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @elseif($income->type=="iif")
                        <td class="{{$income->id}}_income">
                            Industry Income Factor@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @elseif($income->type=="monthlyrental")
                        <td class="{{$income->id}}_income">
                            Monthly Rental@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @elseif($income->type=="air")
                        <td class="income {{$income->id}}_income">
                            Annual Investment Return@
                            <span class="income_net">{{$income->net}}</span>
                        </td>
                    @endif
                </tr>
            @endforeach

        @endforeach

        </tbody>
    </table>
@endif