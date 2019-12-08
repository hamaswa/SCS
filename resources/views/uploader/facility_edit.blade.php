@php
    $collapse = "in";
    $total_loan = 0;
$facility_type_array = array("Term Loan","OverDraft","Housing Loan");
@endphp
@foreach($applicants as $applicant)
    <tr class="bg-aqua-active text-white font-weight-bolder with-border"
        data-toggle="collapse" data-target=".{{ $applicant->id }}_edit_facility">
        <th colspan="6">
            {{ $applicant->name }}
        </th>
    </tr>
    @php
        $facilities = $applicant->facilityInfo()
                        ->whereRaw("status='new_facility' and
                    applicant_id = " . $applicant->id . " and ".
                "la_id='".  $inputs['la_id']."'")->get();
    @endphp
    @foreach($facilities as $facility)
        <tr style="background-color: #c6d8f2;" class="collapse {{$collapse}} {{$applicant->id}}_edit_facility">
            <td>
                <input type="hidden" name="id" value="{{$facility->id}}">
                <input type="hidden" name="la_id" value="{{$facility->la_id}}">
                <select name="type" id="type" class="form-control select2 ">
                    @foreach($capacity_data as $capacity)
                        @if(in_array($capacity->name,$facility_type_array))
                        <option {{ ($capacity->name==$facility->type?"selected":"") }} value="{{$capacity->name}}">
                            {{ $capacity->description }}
                        </option>
                        @endif
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="loan_tenure" required id="loan_tenure" class="form-control my-colorpicker1"
                       value="{{ $facility->loan_tenure }}"
                       style="background-color: #fff;">
            </td>
            <td>
                <input type="number" name="interest_rate" id="interest_rate" class="form-control my-colorpicker1"
                       value="{{ $facility->interest_rate }}"
                       style="background-color: #fff;">
            </td>
            <td>
                <input type="number" name="loan_amount" id="loan_amount" class="form-control my-colorpicker1"
                       value="{{ $facility->loan_amount }}"
                       style="background-color: #fff;">
                @php
                    $total_loan += $facility->loan_amount
                @endphp
            </td>
            <td>
                <input type="number" disabled class="form-control my-colorpicker1"
                       value="{{ $facility->installment }}"
                       style="background-color: #fff;">
            </td>
            <td>
                <button class="btn btn-primary btn-xs text-white" id="facility_submit"><i class="fa fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-xs text-white" data-id="{{$facility->id}}" id="facility_delete"><i
                            class="fa fa-trash"></i></button>
            </td>

        </tr>
    @endforeach
    @php
        $collapse  = "out";
    @endphp
@endforeach
<input type="hidden" name="la_loan_amount" id="la_loan_amount" value="{{$total_loan}}">
