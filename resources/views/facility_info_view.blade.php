<table id="example5" class="table table-bordered table-hover bg-white">
    <thead>
    <tr class="bg-light-blue-gradient">
        <th>Facility</th>
        <th>Facility Date</th>
        <th>STS</th>
        <th>Capacity</th>
        <th>Facility Limit</th>
        <th>Facility Outstanding</th>
        <th>Installment</th>
        <th>Col Type</th>
        <th>MIA</th>
        <th>CONDUCT</th>
        <th>Adverse Remark</th>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($facility_data as $k => $v)

        <tr>
            <td>
                <input type="hidden" name="id" value="{{$v->id}}">
                <select name="type" id="type" class="select2">
                    @foreach($capacity_data as $capacity)
                        <option value="{{$capacity->name}}"
                                {{ (strtoupper($v->type)==strtoupper($capacity->name)?"selected":"") }}>
                            {{ $capacity->description }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="date" required name="facilitydate"
                       placeholder="dd/mm/yyyy" class="form-control facilitydate"
                       data-inputmask="'alias': 'dd/mm/yyyy'"
                       value="{{$v->facilitydate}}">
            </td>
            <td>
                <select name="sts">
                    <option value="O" {{ ($v->sts=="O"?"selected":"") }}>O</option>
                    <option value="K" {{ ($v->sts=="K"?"selected":"") }}>K</option>
                    <option value="T" {{ ($v->sts=="T"?"selected":"") }}>T</option>
                </select>

            </td>
            <td>
                @if($v->type!='crdtcard')
                        <div class="form-group">
                            <label>
                                <input type="radio" checked="true" name="capacity"
                                     value="own"
                                       {{ (strtolower($v->capacity)=="own"?" checked":"") }} class="minimal"
                                       checked="">
                                OWN
                            </label>
                            <label>
                                <input type="radio" name="capacity" value="ja"
                                       {{ ((strtolower($v->capacity)=="joint" or strtolower($v->capacity)=='partner')?"checked ":"") }}
                                       class="minimal">
                                JA
                            </label>

                        </div>
                @endif
            </td>
            <td>
                <input name="facilitylimit"
                       value="{{$v->facilitylimit}}" required type="number" min="0"
                       class="form-control my-colorpicker1"
                       style="background-color: #fff;">


            </td>
            <td>
                <input type="number" name="facilityoutstanding"
                       value="{{$v->facilityoutstanding}}" required class="form-control my-colorpicker1"
                       style="background-color: #fff;">

            </td>
            <td>
                <input type="text"
                       {{ ($v->type=='crdtcard'? 'readonly':'') }} value=" {{$v->installment}}"
                       name="installment"
                       class="form-control my-colorpicker1"
                       style="background-color: #fff;">

            </td>
            <td>


                <select name="col_type">
                    <option value="00" {{ ($v->col_type=="00"?"selected":"") }}>00</option>
                    <option value="11" {{ ($v->col_type=="11"?"selected":"") }}>11</option>
                    <option value="22" {{ ($v->col_type=="22"?"selected":"") }}>22</option>
                </select>
            </td>
            <td>
                <select  class="form-control" name="mia">
                    <option value="0" {{ ($v->mia=="0"?"selected":"") }}>0</option>
                    <option value="1" {{ ($v->mia=="1"?"selected":"") }}>1</option>
                    <option value="2" {{ ($v->mia=="2"?"selected":"") }}>2</option>
                    <option value="3" {{ ($v->mia=="3"?"selected":"" )}}>3</option>
                </select>
            </td>
            <td>
                <select class="form-control" name="conduct">
                    <option value="0" {{ ($v->conduct=="0"?"selected":"") }}>0</option>
                    <option value="1" {{ ($v->conduct=="1"?"selected":"") }}>1</option>
                    <option value="2" {{ ($v->conduct=="2"?"selected":"") }}>2</option>
                    <option value="3" {{ ($v->conduct=="3"?"selected":"") }}>3</option>
                </select>
            </td>
            <td>
                <select name="adverse_remark">
                    <option value="amla" {{ ($v->adverse_remark=="amla"?"selected":"") }}>AMLA</option>
                    <option value="courtcase" {{ ($v->adverse_remark=="courtcase"?"selected":"") }}>Court Case</option>
                    <option value="bankruptcy" {{ ($v->adverse_remark=="bankruptcy"?"selected":"") }}>Bankruptcy
                    </option>
                </select></td>
            <td><a class="btn btn-default update_facility">Update</a>
                {!! Form::open(['route' => ['housingloan.destroy', $v->id], 'method' => 'delete']) !!}
                <div class='btn-group'>


                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'onclick' => "return confirm('Are you sure?')"
                    ]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach


    </tbody>

</table>
