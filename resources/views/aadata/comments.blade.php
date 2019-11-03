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
                @foreach($applicants as $applicant)
                 <tr><td colspan="3">

                         {{
                  $applicant->name
                  }}
                     </td></tr>
                @foreach($applicant->applicantComments as $comment)
                    <tr>
                        <td>{{ date("Y-m-d",strtotime($comment->created_at))}}</td>
                        <td></td>
                        <td>{{$comment->user->first_name}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Comments:</b><br>{!! $comment->comments !!}</td>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endif