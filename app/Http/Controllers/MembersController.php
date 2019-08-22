<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function getMembers(){
        $user =request()->user()->get();
        return view("admin.permissions.members_tree")->with("users_tree",$user);
    }
}
