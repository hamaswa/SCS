@foreach($wealths as $wealth)
    <?php

    switch($wealth->type){
        case "saving":
            if(isset($saving))
                $saving++;
            else
                $saving=1;
            $label="Saving".$saving;
            break;
        case "epf":
            if(isset($epf))
                $epf++;
            else
                $epf=1;
            $label="EPF Account Balance".$epf;
            break;
        case "tpf":
            if(isset($tpf))
                $tpf++;
            else
                $tpf=1;
            $label="Total Fixed Deposits".$tpf;
            break;
        case "tsv":
            if(isset($tsv))
                $tsv++;
            else
                $tsv=1;
            $label="Total Shares Value".$tsv;
            break;
        case "utv":
            if(isset($utv))
                $utv++;
            else
                $utv=1;
            $label="Unit Trust Value".$utv;
            break;
        default:
            if(isset($i))
                $i++;
            else
                $i=1;
            $label="Bank Statement $i";
    }

    ?>
    <div class="btn-group margin-bottom border-black-1 wealthkyc-action-btn" id="btn-salary">
        <button type="button" class="btn btn-default btn-flat editwealth"
                data-url="{{ route("wealthkyc.edit",["id"=>$wealth->id]) }}"
                data-id="{{$wealth->id}}"
                data-type="{{$wealth->type}}">{{$label}}</button>
        <button type="button" class="btn btn-default btn-flat dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false">
            <i class="fa fa-list"></i>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu position-relative" id="" role="menu">
            <li><a href="#" class="editwealth"
                   data-url="{{ route("wealthkyc.edit",["id"=>$wealth->id]) }}"
                   data-id="{{$wealth->id}}"
                   data-type="{{$wealth->type}}" >Edit</a></li>
            <li><a href="#" class="delwealth"  data-id="{{$wealth->id}}" data-type="{{$wealth->type}}">Delete</a></li>
        </ul>

    </div>
@endforeach
