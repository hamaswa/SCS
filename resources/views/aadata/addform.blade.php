@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>Pipeline</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <legend><label for="">NO AA</label> <input type="text" placeholder="dKL/IND/123456789012"></legend>

                <legend><a id="form-upload" class="btn btn-app">
                        <i class="fa fa-upload"></i> Upload Form</a>
                    <div style="display:none"><input type="file" name="doc" id="upload"></div>
                    <a class="btn btn-app"><i class="fa fa-refresh"></i> Refresh</a>
                    <a class="btn btn-app" id="d_pdf"><i class="fa fa-download"></i> CTOS Report</a>
                </legend>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form id="applicantform" name="applicantform">
                    @csrf
                    <input type="hidden" name="formname" value="applicantform">
                    @include('aadata.applicantkyc')
                </form>
                <form id="incomeform" name="incomeform">
                    @csrf
                    <input type="hidden" name="formname" value="incomeform">
                    @include('aadata.incomekyc')
                </form>
                <form id="wealthform" name="wealthform">
                    @csrf
                    <input type="hidden" name="formname" value="wealthform">
                    @include('aadata.wealthkyc')
                </form>
                <form id="propertyform" name="propertyform">
                    <input type="hidden" name="formname" value="propertyform">
                    @include('aadata.propertykyc')
                </form>
            </div>

            </form>

        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">


        $("#incometype").change(function (e) {
            $("#incomekyc .box .box-body").addClass("hide");
            id = $(this).val();
            $("#incomekyc").find("#" + id).removeClass("hide").show();
        })


        $(document).ready(function () {
            $('.select2').select2();
            $("#form-upload").click(function () {
                event.preventDefault(); //prevent default action
                $.ajax({
                    url: '{{ route('aadata.store') }}',
                    type: 'POST',
                    data: $("#applicantform").serialize()
                }).done(function (response) {
                    response = JSON.parse(response);
                    if (response.error) {

                    }
                    else {

                        $.ajax({
                            url: '{{ route('aadata.store') }}',
                            type: 'POST',
                            data: $("#incomeform").serialize() + "&applicant_id="+ response.applicant_id
                        }).done(function (response) {
                            response = JSON.parse(response);
                            if(response.error){

                            }
                            else {

                                                        }
                        })

                        $.ajax({
                            url: '{{ route('aadata.store') }}',
                            type: 'POST',
                            data: $("#wealthform").serialize() + "&applicant_id="+ response.applicant_id
                        }).done(function (response) {
                            response = JSON.parse(response);
                            if(response.error){

                            }
                            else {

                            }
                        })

                        let data = {};
                        data['form']  = forms;
                        data['formname']  = 'propertyform';
                        data['applicant_id'] = response.applicant_id
                        $.ajax({
                            url: '{{ route('aadata.store') }}',
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                                 },
                            data: data
                        }).done(function (response) {
                            response = JSON.parse(response);
                            if(response.error){

                            }
                            else {

                            }
                        })
                    }
                })

            });


        })
    </script>
@endpush
