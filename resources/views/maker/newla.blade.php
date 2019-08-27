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
                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">
                            <div class="col-md-3">
                                <select name="la_source" class="form-control">
                                    <option value="as">AS</option>
                                    <option value="ps">PS</option>
                                    <option value="bk">BK</option>
                                    <option value="dv">DV</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="la_branch" class="form-control">
                                    <option value="kl">KL</option>
                                    <option value="jb">JB</option>
                                    <option value="pn">PN</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="la_category" class="form-control">
                                    <option value="C">Company</option>
                                    <option value="I">Individual</option>
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
