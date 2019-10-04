@foreach($incomes as $income)
   <?php
   switch($income->type){
       case "salary":
           if(isset($salary))
               $salary++;
           else
               $salary=1;
           $label="Monthly Fixed".$salary;
           break;
       case "business":
           if(isset($business))
               $business++;
           else
               $business=1;
           $label="Monthly Variable".$business;
           break;
       case "incometax":
           if(isset($incometax))
               $incometax++;
           else
               $incometax=1;
           $label="Annual Tax Declared".$incometax;
           break;
       case "iif":
           if(isset($iif))
               $iif++;
           else
               $iif=1;
           $label="Industry Income Factor".$iif;
           break;
       case "monthlyrental":
           if(isset($monthlyrental))
               $monthlyrental++;
           else
               $monthlyrental=1;
           $label="Monthly Rental".$monthlyrental;
           break;
       case "air":
           if(isset($air))
               $air++;
           else
               $air=1;
           $label="Annual Investment Return".$air;
           break;
       default:
           if(isset($i))
               $i++;
           else
               $i=1;
           $label="Income".$i;
           break;
}


   ?>
    <div class="btn-group margin-bottom border-black-1 incomekyc-action-btn" id="btn-salary">
        <button type="button" class="btn btn-default btn-flat editincome"
                data-url="{{ route("incomekyc.edit",["id"=>$income->id]) }}"
                data-id="{{$income->id}}"
                data-type="{{$income->type}}">{{$label}}</button>
        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false">
            <i class="fa fa-list"></i>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu position-relative" id="" role="menu">
            <li><a href="#" class="editincome"
                   data-url="{{ route("incomekyc.edit",["id"=>$income->id]) }}"
                   data-id="{{$income->id}}"
                   data-type="{{$income->type}}" >Edit</a></li>
            <li><a href="#" class="delincome"  data-id="{{$income->id}}" data-type="{{$income->type}}">Delete</a></li>
        </ul>

    </div>
@endforeach
