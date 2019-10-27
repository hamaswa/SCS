<table id="example5" class="table table-bordered table-hover bg-white">
    <thead>
    <tr class="bg-light-blue-gradient">
        <th>Facility</th>
        <th>Facility Date</th>
        <th>Capacity</th>
        <th>Facility Limit</th>
        <th>Facility Outstanding</th>
        <th>Installment</th>
        <th>MIA</th>
        <th>CONDUCT</th>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($facility_data as $k => $v)

        <tr>
            <td>
                <input type="hidden" name="id" value="{{$v->id}}">
                {{strtoupper($v->type) }}

            </td>
            <td>
                <input type="date" required name="facilitydate"
                       placeholder="dd/mm/yyyy" class="form-control facilitydate"
                       data-inputmask="'alias': 'dd/mm/yyyy'"
                       value="{{$v->facilitydate}}">
            </td>
            <td>
                @if($v->type!='crdtcard')
                    <form>
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
                    </form>
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
