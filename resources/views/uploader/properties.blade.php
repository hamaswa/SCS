<table class="table table-bordered table-striped table-hover bg-white">
    @php
        $property_covered = app('App\Http\Controllers\Uploader\UploaderController')->checkPropertyIfCovered(request()->all());
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
            <td><input name="la_property" class="la_property"
                       {{ $property->id==$property_covered?"checked":""  }} data-id="{{$property->id}}"
                       value="{{$property->id}}" type="radio"></td>
        </tr>
    @endforeach
   @endforeach

    </tbody>

</table>
