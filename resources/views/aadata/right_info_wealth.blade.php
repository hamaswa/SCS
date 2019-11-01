@if(isset($applicants))
    @foreach($applicants as $applicant)
        {{ $applicant->name }}
        @if(isset($applicant) and $applicant->aacategory=="C")
            <table class="table table-bordered table-striped bg-white">
                <thead class="bg-light-blue">
                <tr class="bg-light-blue-gradient">
                    <th colspan="3" class="text-center">Wealth</th>
                </tr>
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
                <tr class="bg-light-blue-gradient">
                    <th colspan="3" class="text-center">Wealth</th>
                </tr>
                <tr class="bg-aqua">
                    <th>Type</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                @foreach($applicant->applicantWealth as $wealth)
                    @switch($wealth->type)
                        @case("saving")
                        <tr id="wealth_saving_right" class="wealth_saving_right">
                            <td>Saving</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>
                        @break
                        @case("epf")
                        <tr id="wealth_epf_right" class="wealth_epf_right">
                            <td>EPF Account Balance</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>


                        @break
                        @case("tpf")
                        <tr id="wealth_tpf_right" class="wealth_tpf_right">
                            <td>Total Fixed Deposits</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>


                        @break
                        @case("tsv")
                        <tr id="wealth_tsv_right" class="wealth_tsv_right">
                            <td>Total Shares Value</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>

                        @break
                        @case("utv")
                        <tr id="wealth_utv_right" class="wealth_utv_right">
                            <td>Unit Trust Value</td>
                            <td>{{ $wealth->total }}</td>
                        </tr>

                        @break

                    @endswitch



                @endforeach
                </tbody>
                <tfoot>
                <tr class="bg-yellow-light wealth_total_right" id="wealth_total_right">
                    @if(isset($wealth_total) and isset($wealth_total->total_net))
                        <td>Total</td>
                        <td>{{ $wealth_total->total_net }}</td>
                    @endif

                </tr>
                </tfoot>
            </table>
        @endif
    @endforeach
@endif