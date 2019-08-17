<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $arr["users"] = User::where("position_id","=",auth()->user()->position_id)
                        ->where("id",">",1)->get();
        $arr['roles'] = Role::all();
        return view("admin.permissions.index")->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);
       foreach ($role->users as $user) {
            if($user->id>1)
            $user->roles()->detach($id);
       }
        $inputs = $request->all();
       if(isset($inputs["users"])) {
           foreach ($inputs["users"] as $user_id) {
               $user = User::find($user_id);
               $user->roles()->attach($id);
           }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public static function userOptions($users,$role)
    {
        $html = "";
        foreach ($users as $user) {
            $html .= "<option " . ($user->hasRole($role->slug) ? "selected" : "") . "  value=\"" . $user->id . "\">
                $user->username</option>";
        }
        return $html;


    }
}
