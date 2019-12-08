@if(isset($applicants))
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover bg-white text-black table-condensed">
            <thead>
            <tr class="bg-light-blue-gradient">
                <th colspan="4" class="text-center">Document</th>
            </tr>

            <tr class="bg-gray-dark">
                <th>Date</th>
                <th>Name</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @php
                $collapse = "in";
            @endphp
            @foreach($applicants as $applicant)
                <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                    data-toggle="collapse" data-target=".{{ $applicant->id }}_doc">
                    <th colspan="4">
                        {{ $applicant->name }}
                    </th>
                </tr>
                @foreach($applicant->applicantDocuments as $document)
                    <tr class="collapse {{$collapse}} {{$applicant->id}}_doc">
                        <td>{{ date("Y-m-d",strtotime($document->created_at))}}</td>
                        <td>{{ $document->doc_name }}</td>
                        <td>{{$document->guide_lines}}</td>
                        <td><a href="{{ route("download")}}?id={{$document->id}}">view</a></td>
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