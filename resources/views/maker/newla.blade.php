@extends('maker.layouts.app')

@section('content')


    <section class="content">
        <div class="row">
            <div class="col-lg-12">

                <legend class="text-center padding-5"><label for="">NO AA</label>
                    <input type="text" disabled value="{{$applicant->serial_no}}">

                </legend>

            </div>

            <div class="container"> <!-- style="overflow:hidden" -->

                <div class="row">
                    <div class="col-md-12" style="overflow:auto">
                        <form method="post" action="{{route("maker.storela")}}">
                            @csrf
                            <input type="hidden" name="applicant_id" value="{{$applicant->id}}">

                        <table class="table">
                        <tr>
                            <td>

                                <select name="la_source">
                                    <option value="as">AS</option>
                                    <option value="ps">PS</option>
                                    <option value="bk">BK</option>
                                    <option value="dv">DV</option>
                                </select>

                            </td>

                            <td>

                                <select name="la_branch">
                                    <option value="kl">KL</option>
                                    <option value="jb">JB</option>
                                    <option value="pn">PN</option>
                                </select>

                            </td>

                            <td>

                                <select name="la_category">
                                    <option value="C">Company</option>
                                    <option value="I">Individual</option>
                                </select>

                            </td>

                        </tr>
                        <tr><td colspan="3" style="text-align:right"><input type="submit" value="Proceed" /> </td> </tr>
                        </table>
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
