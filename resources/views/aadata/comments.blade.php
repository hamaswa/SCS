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
                        data-toggle="collapse" data-target=".{{ $applicant->name }}_comments">
                        <th colspan="3">
                            {{ $applicant->name }}
                        </th>
                    </tr>
                @foreach($applicant->applicantComments as $comment)
                    <tr class="collapse {{$collapse}} {{$applicant->name}}_comments">
                        <td>{{ date("Y-m-d",strtotime($comment->created_at))}}</td>
                        <td></td>
                        <td>{{$comment->user->first_name}}</td>
                    </tr>
                    <tr class="collapse {{$collapse}} {{$applicant->name}}_comments">
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