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

                <div class="box-body ">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                    <div class="col-md-4 col-sm-4 col-lg-4 table-responsive">
                        <select name="type" id="type">
                            @foreach($capacity_data as $capacity)
                                <option value="{{$capacity->name}}">
                                    {{ $capacity->description }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-8 col-sm-8 col-lg-8 table-responsive">
                        <table class="table table-bordered table-striped table-hover bg-white">

                            <tbody>
                                <tr>
                                    <td>
                                        <table>
                                            @foreach($applicants as $la)
                                             <tr>
                                                 <td class="la-applicant" data-id="{{$la->id}}">
                                                     <b> {{$la->name}} </b>
                                                 </td>
                                                 <td> <input type="checkbox" class="applicants"
                                                             name="applicant_id[]" value="{{$la->id}}"> </td>
                                             </tr>
                                            @endforeach
                                        </table>
                                    </td>
                                    <td id="la-properties">


                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table id="example5" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th style="width: 115px;">Facility Type</th>
                                <th style="width: 100px;">Loan Tenure (Years)
                                </th>
                                <th style="width: 100px;"> Interest Rate (%.p.a)
                                </th>
                                <th style="width: 100px;">Loan Amount (RM)</th>
                                <th style="width: 100px;">Action</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr style="background-color: #c6d8f2;">
                                <td>
                                    <select name="type" id="type">
                                        @foreach($capacity_data as $capacity)
                                            <option value="{{$capacity->name}}">
                                                {{ $capacity->description }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" name="loan_tenure" required  id="loan_tenure" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <input type="number" name="interest_rate" id="interest_rate" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <input type="number" name="loan_amount" id="loan_amount" class="form-control my-colorpicker1"
                                           style="background-color: #fff;">
                                </td>
                                <td>
                                    <button class="btn btn-default" id="Add">Add</button>
                                </td>

                            </tr>
                            <tr>
                                <td class="add-button">
                                    <button type="button" id="submit" class="btn bg-maroon btn-flat margin">ADD</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4" id="right_side_bar">

                    </div>


                </div>
            </div>
        </div>

    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        $(document).ready(function (e) {
            sidebar({{$applicant->id}});

        });
        $(document.body).on("click",".la-applicant",function (e) {
           sidebar($(this).data("id"));
        })
        $(document.body).on("click",".applicants",function (e) {
            $.ajax({
                url: "{{ route("la_properties") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: $("input[name='applicant_id[]']:checked").serializeArray(),
                success: function (response) {
                    $("#la-properties").html(response);
                },
                error: function () {
                }
            });

        })
        function sidebar(id) {
            $.ajax({
                url: "{{ route("comments") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + id,
                success: function (response) {
                    $("#tab-2").html(response);
                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("documents") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "id=" + id,
                success: function (response) {
                    $("#tab-1").html(response);
                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("applicant_sidebar") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + id,
                success: function (response) {
                    $("#tab-3").html(response);
                },
                error: function () {
                }
            });
            $.ajax({
                url: "{{ route("existing_commitment") }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                data: "applicant_id=" + id,
                success: function (response) {
                    $("#existing_commitment").html(response);
                },
                error: function () {
                }
            });
            $("#right_side_bar").html("");
            $("#right_side_bar").append($("#tab-3").clone());
            $("#right_side_bar").append($("#existing_commitment").clone());
        }

    </script>
@endpush