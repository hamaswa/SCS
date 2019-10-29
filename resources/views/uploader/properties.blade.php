<table class="table table-bordered table-striped table-hover bg-white">
    @php
        $property_covered = app('App\Http\Controllers\Uploader\UploaderController')->checkPropertyIfCovered(request()->all())
    @endphp
    <tbody id="propertyright" class="propertyright">
   <?php
   $i=0;
   ?>
   @foreach($applicant as $aa)
       <tr><td>{{$aa->name}}<td></td></tr>
    @foreach($aa->applicantProperty as  $property)
        <?php
       $i++;

        ?>
        <tr>
            <td>Property {{$i}}</td>
            @php
                $ar = explode(",",$property_covered);

            @endphp
            <td><input class="la_property"  {{ in_array($property->id, $ar)?"checked":""  }} data-id="{{$property->id}}" value="{{$property->id}}" type="radio"> </td>
        </tr>
    @endforeach
   @endforeach

    </tbody>

</table>
