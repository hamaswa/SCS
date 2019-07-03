@extends('layouts.app')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Data Entry</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>
        <section class="content">
            <form id="de" name="de">
                @csrf
                <div class="row mar-lr">
                <div class="col-sm-12 de-table-bor">
                    <div class="box-header">
                        <a class="btn btn-default" href="{{ route("housingloan.create") }}">Create</a>
                    </div>
                    <div class="box-body">
                            <div id="response"></div>
                            <table id="example5" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th style="width: 115px;">Facility</th>
                                    <th style="width: 115px;">Facility Date</th>
                                    <th style="width: 100px;">Capacity</th>
                                    <th style="width: 100px;">Facility Limit</th>
                                    <th style="width: 100px;">Facility Outstanding</th>
                                    <th style="width: 100px;">Instalment</th>
                                    <th style="width: 100px;">Actual Installment</th>
                                    <th style="width: 102px;">MIA</th>
                                    <th style="width: 102px;">CONDUCT</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($facilityinfo as $k => $v)
                                    <tr style="background-color: #c6d8f2;">
                                        <td>
                                            @switch($v->type)
                                                @case("housingloan")
                                                Housing Loan
                                                @break
                                                @case("creditcard")
                                                Credit Card
                                                @break
                                                @case("personalloan")
                                                Personal Loan
                                                @break
                                                @case("termloan")
                                                Term Loan
                                                @break
                                                @case("overdraft")
                                                Overdraft
                                                @break
                                                @case("hirepurchase")
                                                Hire Purchase
                                                @break

                                            @endswitch
                                        </td>
                                        <td>
                                            {{$v->facilitydate}}
                                        </td>

                                        <td>
                                            {{$v->capacity}}

                                        </td>
                                        <td>
                                            {{$v->facilitylimit}}

                                        </td>
                                        <td>
                                            {{$v->facilityoutstanding}}

                                        </td>
                                        <td>
                                            {{$v->installment}}
                                        </td>

                                        <td>
                                            @switch($v->type)
                                                @case("housingloan")
                                                  @if($v->capacity=='own')
                                                      {{ $v->installment }}
                                                   @else
                                                      {{ $v->installment/2 }}
                                                  @endif
                                                @break
                                                @case("creditcard")
                                                 {{ $v->facilityoutstanding * .05}}
                                                @break
                                                @case("personalloan")
                                                @if($v->capacity=='own')
                                                    {{ $v->installment }}
                                                @else
                                                    {{ $v->installment/2 }}
                                                @endif
                                                @break
                                                @case("termloan")
                                                @if($v->capacity=='own')
                                                    {{ $v->installment }}
                                                @else
                                                    {{ $v->installment/2 }}
                                                @endif
                                                @break
                                                @case("overdraft")
                                                 {{ ($v->facilitylimit * .07) / 12 }}
                                                @break
                                                @case("hirepurchase")
                                                @if($v->capacity=='own')
                                                    {{ $v->installment }}
                                                @else
                                                    {{ $v->installment/2 }}
                                                @endif
                                                @break

                                            @endswitch
                                        </td>
                                        <td>
                                            {{$v->mia}}

                                        </td>
                                        <td>
                                            {{$v->conduct}}

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                            <div class="pull-right">{{ $facilityinfo->links() }}</div>
                        </div>
                </div>
            </div>
            </form>
        </section>

@endsection

