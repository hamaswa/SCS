<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function getExcludeIds($users){
        $current_childs="";
        foreach ($users as $user){
            if($user->childs()) {
                $str  =  $this->getExcludeIds($user->childs);
                $current_childs .= (($current_childs != "" and $str!="") ? "," : "").$str;
            }
        }
        return  $current_childs;

    }
}
