<table class="table table-bordered table-striped table-hover bg-white">

    <tbody id="propertyright" class="propertyright">
   <?php
   $i=0;
   ?>
    @foreach($properties as  $property)
        <?php
       $i++;

        ?>
        <tr>
            <td>Property {{$i}}</td>
            <td><input class="la_property" data-id="{{$property->id}}" value="{{$property->id}}" type="radio"> </td>
        </tr>
    @endforeach

    </tbody>

</table>
