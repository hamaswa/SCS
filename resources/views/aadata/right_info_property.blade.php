@if(isset($applicants))
    <div data-toggle="collapse" data-target=".right_property_new" class="panel-heading bg-light-blue-gradient"><strong>Property</strong></div>
    <div class="collapse in right_property_new">
    <table class="table table-bordered table-striped table-hover bg-white">
        <thead class="bg-light-blue">

        <tr class="bg-aqua">
            <th>MV</th>
            <th>OS</th>
            <th>CO</th>
        </tr>
        </thead>
        <tbody id="propertyright" class="propertyright">

        @php
            $collapse = "in";
        @endphp
        @foreach($applicants as $applicant)
            @php
                $total_mv = 0;
                $total_os = 0;
                $total_co = 0;
            @endphp
            <tr class="bg-aqua-active text-white font-weight-bolder with-border"
                data-toggle="collapse" data-target=".{{ $applicant->name }}_property">
                <th colspan="3">
                    {{ $applicant->name }}
                </th>
            </tr>
            @foreach($applicant->applicantProperty as  $property)
                <?php
                $total_mv += $property->property_market_value;
                $total_os += $property->property_loan_outstanding;

                ?>
                <tr class="property_right property_{{ $property->id }}
                        collapse {{$collapse}} {{$applicant->name}}_property">
                    <td>{{$property->property_market_value}}</td>
                    <td>{{$property->property_loan_outstanding}}</td>
                    <td>{{ ($property->property_market_value * (0.9) - $property->property_loan_outstanding*1) }}</td>
                </tr>
            @endforeach
            <tr class="bg-green collapse {{$collapse}} {{$applicant->name}}_property">
                <td colspan=3>Total</td>
            </tr>
            <tr class="bg-green collapse {{$collapse}} {{$applicant->name}}_property">
                <td>{{$total_mv}}</td>
                <td>{{$total_os}}</td>
                <td>{{ $total_mv * (0.9) - $total_os }}</td>
            </tr>
            @php
                $collapse = "out";
            @endphp
        @endforeach


        </tbody>

    </table>
    </div>
@endif