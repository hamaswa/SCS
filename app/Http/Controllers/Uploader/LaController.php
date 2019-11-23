<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ApplicantData;
use App\maker\LoanApplication;
use Auth;

class LaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id() == 1) {
            $where = "applicant_id = la_applicant_id 
                and la_serial_no is not NULL and la_serial_id is not NULL";
        } else {
            $where = "applicant_id = la_applicant_id 
                and la_serial_no is not NULL and la_serial_id is not NULL and user_id=" . Auth::id();
        }
        $arr["loan_applications"] = LoanApplication::whereRaw($where)
            ->orderby("id", "desc")->get();
        return view("uploader.la_list")->with($arr);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inputs = $request->all();
            $loan_application = LoanApplication::find($inputs['id']);
            $loan_application->update($inputs);
            echo "success";
        } catch (\Exception $e) {
            echo "error";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
