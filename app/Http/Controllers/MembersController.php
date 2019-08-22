<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MembersController extends Controller
{
    public function getMembers(){
        $user_id = Auth::id();
        $arr["user"] = Auth::user();
        $arr["users_tree"] = User::where("id",">",1)
            ->where("id","=",$user_id)
            ->get();
        return view("admin.permissions.index")->with($arr);
    }
}
