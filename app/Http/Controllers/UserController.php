<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UserDepartmentsDataTable;

class UserController extends Controller
{
    public function departments(UserDepartmentsDataTable $dataTable)
    {

        return $dataTable->render("users.department.index");
    }
}
