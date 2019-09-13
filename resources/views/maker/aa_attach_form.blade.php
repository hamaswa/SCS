<div class="box-body">
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead>
            <tr class="bg-light-blue-gradient">
                {{--<th></th>--}}
                <th>IC/Com No.</th>
                <th>Applicant</th>
                <th>Loan Amount</th>
                <th>TAT</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data)==0)
                <tr>
                    <td colspan="7">
                        No Data Found
                    </td>

                </tr>
            @endif
            @foreach($data as $d)
                <tr>
                    {{--<td><input type="checkbox" class="applicant_id" name="applicant_id" value="{{$d->id}}"/></td>--}}
                    <td>

                            {{ $d->unique_id }}
                    </td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->market_value }}</td>
                    <td></td>
                    <td>{{ $d->status }}

                    </td>
                    <td>
                        <button class="btn btn-primary" data-target="{{$target}}" id="aa_attach" data-id="{{$d->id}}">Attach</button>

                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>
    </div>
</div>