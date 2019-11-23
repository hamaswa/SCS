@extends('layouts.app')

@section('content')
    <div class="bg-white">
        <div class="msg">
            @if ($message = Session::get('error'))
                <div class="alert alert-error">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="box">
                <div class="box-body table-responsive">
                        <span> AA NO </span> <span> </span>

                        <table id="example5" class="table table-bordered table-hover">
                            <thead>

                            <tr>
                                <th>
                                    LA
                                </th>
                                <th>
                                    Loan Amount
                                </th>
                                <th>
                                    Private
                                </th>
                                <th>
                                    Public
                                </th>
                                <th>
                                    Own
                                </th>
                                <th>
                                    Remarks
                                </th>
                                <th>
                                    Action
                                </th>

                            </tr>
                            </thead>
                            <tbody id="new_facilities">
                            @foreach($loan_applications as $loan_application)
                                <tr>
                                    <th>
                                        <input type="hidden" name="id" value="{{$loan_application->id}}">
                                        <input type="hidden" name="applicant_id"
                                               value="{{$loan_application->applicant_id}}">
                                        <input type="hidden" name="la_id"
                                               value="{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}">
                                        {{$loan_application->la_type}}/{{$loan_application->bank}}
                                        /{{$loan_application->la_serial_no}}_{{$loan_application->la_serial_id}}

                                    </th>
                                    <th>
                                        {{ $loan_application->loan_amount }}
                                    </th>
                                    <th>
                                        <input name={{ $loan_application->id }} class="accessability" value="private"
                                               {{ $loan_application->accessability=="private"?"checked":"" }} type="radio">
                                    </th>
                                    <th>
                                        <input name={{ $loan_application->id }} class="accessability" value="public"
                                               {{ $loan_application->accessability=="public"?"checked":"" }} type="radio">
                                    </th>
                                    <th>
                                        <input name={{ $loan_application->id }} class="accessability" value="own"
                                               {{ $loan_application->accessability=="own"?"checked":"" }} type="radio">
                                    </th>
                                    <th>
                                        Remarks
                                    </th>
                                    <th>

                                        <button id="update_la" name="update_la" value="Submit">Submit</button>
                                        <button id="delete_la" disabled name="delete_la" value="Submit">Delete</button>
                                        @if(request()->user()->hasRole("uploader"))
                                            <a href="{{ route("uploader.index") }}?id={{$loan_application->applicant_id}}"
                                               class="btn btn-xs bg-light-blue-gradient">Edit</a>


                                        @endif
                                    </th>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>


            </div>
        </div>
    </div>

    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        var applicant = null;
        $(document).ready(function (e) {
            $('.select2').select2({allowClear: true});
        });

        $(document.body).on("click", ".accessability", function (e) {
            accessability = $(this).val();
            $.ajax({
                url: '{{ route('uploader_la.store') }}',
                type: 'POST',
                data: $(this).parent("th").parent("tr").find(":input").serialize() + "&accessability=" + accessability,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            }).done(function (response) {
                if (response == "success") {
                    $(".msg").html($("" +
                        " <div class=\"alert alert-success\">\n" +
                        "                    <p>Successfully Updated</p>\n" +
                        "                </div>"))
                }
                else {
                    $(".msg").html($("" +
                        " <div class=\"alert alert-error\">\n" +
                        "                    <p>There Occured an error. Contact Administrator</p>\n" +
                        "                </div>" +
                        ""))
                }
            })
        })


    </script>
@endpush