<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\UserDepartmentsDataTable;
use App\User;

class UserController extends Controller
{
    public function getUserDetail($id){
        $arr['user'] = $user  = User::find($id);
        $arr['roles'] = $role = $user->roles()->Pluck("name","slug")->ToArray();

        return view("admin.users.user_details")->with($arr);
    }


    public function departments(UserDepartmentsDataTable $dataTable)
    {

        return $dataTable->render("users.department.index");
    }
}
