<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantBusiness;
use Auth;

class BusinesskycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs = $request->all();

        if (isset($inputs['applicant_id']) and $inputs['applicant_id'] != "") {
            $business = ApplicantBusiness::where("applicant_id", $inputs["applicant_id"]);
            $business->delete();
        }


        if (isset($inputs['business_forms'])) {
            foreach ($inputs['business_forms'] as $input) {
                $input['user_id']=Auth::id();
                $input['applicant_id'] = $inputs['applicant_id'];
                $business = ApplicantBusiness::create($input);
            }
            return json_encode(["applicant_id" => $business->applicant_id, "business_id" => $business->id]);
        } else {
            if (isset($inputs['applicant_id']) and $inputs['applicant_id'] != "") {
                $business = ApplicantBusiness::where("applicant_id", $inputs["applicant_id"]);
                $business->delete();
            }

            return json_encode(["error" => "No Business Data submitted"]);
        }
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
        //
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
}
