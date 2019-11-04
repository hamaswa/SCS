@if(isset($applicants))
    <div data-toggle="collapse" data-target=".right_wealth_new" class="panel-heading bg-light-blue-gradient"><strong>Wealth</strong></div>
    <div  class="collapse in right_wealth_new">
    @if(isset($applicant) and $applicant->aacategory=="C")
        <table class="table table-bordered table-striped bg-white">
            <thead class="bg-light-blue">
            <tr class="bg-aqua">
                <th>Bank</th>
                <th>Credit</th>
                <th>Balance</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @if(isset($wealths))
                @foreach($wealths as $wealth)
                    <?php
                    $i++;
                    ?>
                    <tr id="wealth_saving_right" class="wealth_saving_right">
                        <td>Statement {{$i}}</td>
                        <td>{{ round($wealth->total) }}</td>
                        <td>{{ round($wealth->gross) }}</td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>
            <tr class="bg-yellow-light wealth_total_right" id="wealth_total_right">
                @if(isset($wealth_total) and isset($wealth_total->total_net))
                    <td>Average</td>
                    <td>{{ round($wealth_total->total_net/$i) }}</td>
                    <td>{{ round($wealth_total->total_gross/$i) }}</td>
                @endif

            </tr>
            </tfoot>
        </table>

    @else
        <table class="table table-bordered table-striped bg-white">
            <thead class="bg-light-blue">
            <tr class="bg-aqua">
                <th>Type</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @php
                $collapse = "in";
            @endphp
            @foreach($applicants as $applicant)
                <?php
                $wealth_total = 0;
                ?>
                <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                    data-toggle="collapse" data-target=".{{ $applicant->name }}_income">
                    <th colspan="3">
                        {{ $applicant->name }}
                    </th>
                </tr>

                @foreach($applicant->applicantWealth as $wealth)
                    @php
                        $wealth_total +=  $wealth->total;
                    @endphp
                    @switch($wealth->type)
                        @case("saving")
                        <tr id="wealth_saving_right"
                            class="wealth_saving_right collapse {{$collapse}} {{$applicant->name}}_wealth">
                            <td>Saving</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>
                        @break
                        @case("epf")
                        <tr id="wealth_epf_right"
                            class="wealth_epf_right  collapse {{$collapse}} {{$applicant->name}}_wealth">
                            <td>EPF Account Balance</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>


                        @break
                        @case("tpf")
                        <tr id="wealth_tpf_right"
                            class="wealth_tpf_right collapse {{$collapse}} {{$applicant->name}}_wealth">
                            <td>Total Fixed Deposits</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>


                        @break
                        @case("tsv")
                        <tr id="wealth_tsv_right"
                            class="wealth_tsv_right collapse {{$collapse}} {{$applicant->name}}_wealth">
                            <td>Total Shares Value</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>

                        @break
                        @case("utv")
                        <tr id="wealth_utv_right"
                            class="wealth_utv_right collapse {{$collapse}} {{$applicant->name}}_wealth">
                            <td>Unit Trust Value</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>

                        @break

                    @endswitch
                @endforeach

                <tr class="bg-yellow-light wealth_total_right collapse {{$collapse}} {{$applicant->name}}_wealth"
                    id="wealth_total_right">
                    @if(isset($wealth_total))
                        <td>Total</td>
                        <td>{{ $wealth_total }}</td>
                    @endif

                </tr>
                @php
                    $collapse = "out";
                @endphp
            @endforeach

            </tbody>

        </table>
    @endif
    </div>
@endif