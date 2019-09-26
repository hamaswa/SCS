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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeIncomeSource(Request $request)
    {
        $inputs = $request->all();
        if (isset($inputs['business_forms'])) {
            $inputs['user_id']=Auth::id();
            $business = ApplicantBusiness::create($inputs);
            return back()->with("success", "Income Source Successfully Saved");
        } elseif (isset($inputs['bussiness_id']) && $inputs['bussiness_id'] != ''){
            $business = ApplicantBusiness::find($inputs['bussiness_id']);
            $business['business_nature'] = $inputs['business_nature'];
            $business['business_position'] = $inputs['business_position'];
            $business['business_email'] = $inputs['business_email'];
            $business['bussiness_company_name'] = $inputs['bussiness_company_name'];
            $business['bussiness_date_established'] = $inputs['bussiness_date_established'];
            $business['bussiness_office_phone_no'] = $inputs['bussiness_office_phone_no'];
            $business['bussiness_office_address'] = $inputs['bussiness_office_address'];
            $business->save();
            return back()->with("success", "Income Source Successfully Updated");
        } else {
            return back()->with("error", "An error has occurred please try again later.");
        }
    }

    /**
     * @param Request $request
     */
    public function deleteIncomeSource(Request $request){
        $inputs = $request->all();
        $business = ApplicantBusiness::findOrFail($inputs['id']);
        $business->delete();
    }
}
