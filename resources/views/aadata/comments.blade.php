<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead>
        <tr class="bg-light-blue-gradient">
            <th colspan="4" class="text-center">All Comments</th>
        </tr>
        <tr class="bg-aqua">
            <th>Date</th>
            <th>Status</th>
            <th>Comments</th>
            <th>By</th>
        </tr>

        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ date("Y-m-d",strtotime($comment->created_at))}}</td>
                <td>{{$comment->comments}}</td>
                <td></td>
                <td></td>
            </tr>
        @endforeach

        {{--<tr class="bg-red-gradient">--}}
            {{--<td></td>--}}
            {{--<td>KIV</td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
        {{--<tr class="bg-green">--}}
            {{--<td></td>--}}
            {{--<td>KIV<br><small>replied</small></td>--}}
            {{--<td></td>--}}
            {{--<td></td>--}}
        {{--</tr>--}}
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>
</div>