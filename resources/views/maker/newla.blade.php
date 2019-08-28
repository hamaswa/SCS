@extends('maker.layouts.app')

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <legend class="text-center padding-5"><label for="">NO AA</label>
                    <input type="text" disabled value="{{$applicant->serial_no}}">

                </legend>

            </div>
            <div class="col-md-12" style="overflow:auto">
                <div class="box">
                    <div class="box-body bg-white">
                        <form method="post" action="{{route("maker.storela")}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$applicant->id}}">
                            <div class="col-md-3">
                                <select name="aasource" class="form-control" id="aasource">
                                    <option value="AS" {{ ((isset($applicant->aasource) and $applicant->aasource=="AS")?"selected=selected":"") }}>AS</option>
                                    <option value="PS" {{ ((isset($applicant->aasource) and $applicant->aasource=="PS")?"selected=selected":"") }}>PS</option>
                                    <option value="BK" {{ ((isset($applicant->aasource) and $applicant->aasource=="BK")?"selected=selected":"") }}>BK</option>
                                    <option value="DV" {{ ((isset($applicant->aasource) and $applicant->aasource=="DV")?"selected=selected":"") }}>DV</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="aabranch" class="form-control" id="aabranch">
                                    <option value="KL" {{ ((isset($applicant->aabranch) and $applicant->aabranch=="KL")?"selected=selected":"") }}>KL</option>
                                    <option value="JB" {{ ((isset($applicant->aabranch) and $applicant->aabranch=="JB")?"selected=selected":"") }}>JB</option>
                                    <option value="PN" {{ ((isset($applicant->aabranch) and $applicant->aabranch=="PN")?"selected=selected":"") }}>PN</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="aacategory" class="form-control" id="aacategory">
                                    <option value="C" {{ ((isset($applicant->aacategory) and $applicant->aacategory=="C")?"selected=selected":"") }}>Company</option>
                                    <option value="I" {{ ((isset($applicant->aacategory) and $applicant->aacategory=="I")?"selected=selected":"") }}>Individual</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" value="Proceed" class="btn btn-primary" />
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">

    </script>
@endpush
