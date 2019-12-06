@if(isset($applicants))

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead>
            <tr class="bg-light-blue-gradient">
                <th colspan="4" class="text-center">All Comments</th>
            </tr>
            <tr class="bg-aqua">
                <th>Date</th>
                <th>Status</th>
                <th>By</th>
            </tr>

            </thead>
            <tbody>
            @php
                $collapse = "in";
            @endphp
            @foreach($applicants as $applicant)
                <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                    data-toggle="collapse" data-target=".{{ $applicant->id }}_comments">
                    <th colspan="3">
                        {{ $applicant->name }}
                    </th>
                </tr>
                @foreach($applicant->applicantComments as $comment)
                    <tr class="collapse {{$collapse}} {{$applicant->id}}_comments">
                        <td>{{ date("Y-m-d",strtotime($comment->created_at))}}</td>
                        <td></td>
                        <td>{{$comment->user->first_name}}</td>
                    </tr>
                    <tr class="collapse {{$collapse}} {{$applicant->id}}_comments">
                        <td colspan="3"><b>Comments:</b><br>{!! $comment->comments !!}</td>
                    </tr>
                @endforeach

                @php
                    $collapse = "out";
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>
@endif


@if(isset($applicants))

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover bg-white">
            <thead>
            <tr class="bg-light-blue-gradient">
                <th colspan="4" class="text-center">Remarks</th>
            </tr>
            <tr class="bg-aqua">
                <th>Date</th>
                <th>Kiv Category</th>
                <th>By</th>
            </tr>

            </thead>
            <tbody>
            @php
                $collapse = "in";
            @endphp
            @foreach($applicants as $applicant)
                <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                    data-toggle="collapse" data-target=".{{ $applicant->id }}_remarks">
                    <th colspan="3">
                        {{ $applicant->name }}
                    </th>
                </tr>
                @foreach($applicant->applicantRemarks as $remarks)
                    <tr class="collapse {{$collapse}} {{$applicant->id}}_remarks">
                        <td>{{ date("Y-m-d",strtotime($remarks->created_at))}}</td>
                        <td>{{$remarks->kiv_category}}</td>
                        <td>{{$remarks->user->first_name}}</td>
                    </tr>
                    <tr class="collapse {{$collapse}} {{$applicant->id}}_remarks">
                        <td colspan="3"><b>Remarks:</b><br>{!! $remarks->remarks !!}</td>
                    </tr>
                @endforeach

                @php
                    $collapse = "out";
                @endphp
            @endforeach
            </tbody>
        </table>
    </div>
@endif