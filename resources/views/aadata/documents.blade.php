@if(isset($applicants))
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover bg-white text-black">
            <thead>
            <tr class="bg-light-blue-gradient">
                <th colspan="4" class="text-center">Document</th>
            </tr>

            <tr class="bg-aqua">
                <th>Date</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applicants as $applicant)
                <tr>
                    <td colspan="4">

                        {{
                 $applicant->name
                 }}
                    </td>
                </tr>
                @foreach($applicant->applicantDocuments as $document)
                    <tr>
                        <td>{{ date("Y-m-d",strtotime($document->created_at))}}</td>
                        <td>{{ $document->doc_name }}</td>
                        <td>{{$document->doc_status}}</td>
                        <td><a href="{{ route("download")}}?id={{$document->id}}">view</a></td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>

        </table>
    </div>
@endif