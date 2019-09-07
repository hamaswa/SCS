<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantData;
use App\AASource;
use App\maker\LoanApplication;
use Auth;

class LoanApplicationController extends Controller
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

        $inputs['user_id']=Auth::id();
        if(isset($inputs['create_company'])){
            $applicant_count = ApplicantData::selectRaw("count(*) as count")->whereRaw("created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)")
                ->get()->ToArray();
            $inputs['serial_no'] = date('Ymdhis') . "" . $applicant_count[0]["count"];
            $applicant = ApplicantData::create($inputs);

            $arr["applicant"] = $applicant;
            $arr["options"]  = AASource::whereRaw(
                'type in ("income_primary_docs","income_support_docs","wealth_primary_docs","wealth_support_docs", "property_primary_docs","property_support_docs", "salutation","position","nature_of_business")')->get();

            $arr["success"] =  "New Company Created";
            return view("maker.editform")->with($arr);

        }
        else if(isset($inputs['update_ind']) and $inputs['update_ind']=="update_ind") {
            $applicant = ApplicantData::find($inputs['applicant_id']);
            $applicant->update($inputs);
            $this->showAttachAA($request);
        }

    }

    public function attachIndAASearch(Request $request)
    {
        $inputs = $request->all();

        $applicant = new  ApplicantData();
        $data = $applicant->whereRaw("(unique_id = '" . $inputs['unique_id'] . "' or name = '" . $inputs['unique_id'] . "')
            " . ($inputs['unique_id'] == "" ? " OR" : " and ") . " aacategory='I' and status = 'Documentation' and id!=".$inputs['la_applicant_id'])->paginate(5);

        if (count($data) > 0) {
            return view("maker.aa_attach_form")->with("data", $data);
        } else {
            return json_encode(["error" => "No Data Found"]);
        }

    }

    public function attachIndAA(Request $request){
        $inputs = $request->all();
        $applicant = ApplicantData::find($inputs["id"]);
        if($applicant) {
            $loan = LoanApplication::create([
                "la_applicant_id" => $inputs['la_applicant_id'],
                "applicant_id" => $applicant->id,
            ]);
            return json_encode(["success"=>"success","applicant"=>$applicant]);
        }
        else {
            return json_encode(["error"=>"No Data Found"]);
        }

    }


    public function deleteIndAA(Request $request){
        $inputs = $request->all();
        if(LoanApplication::where("applicant_id","=",$inputs['applicant_id'])
            ->where("la_applicant_id","=",$inputs["la_applicant_id"])->delete()){
            return json_encode(["success"=>"Application Removed Successfully"]);
        } else
        {
            return json_encode(["error"=>"No Data Found To Delete"]);

        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function show(loan_application $loan_application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function showAttachAA(Request $request)
    {
        $inputs= $request->all();

        $arr['la_applicant_id'] =  $id = $inputs['la_applicant_id'];
        $arr["applicant"] = ApplicantData::find($id);
        $arr["applicant_data"] = ApplicantData::find($inputs['applicant_id']);

        $attached_applicants = LoanApplication::select('applicant_id')
            ->where("la_applicant_id","=",$id)->Pluck("applicant_id")->ToArray();
        $attached_applicants_id = implode(",",$attached_applicants);
        if($attached_applicants_id!="")
            $arr['attached_applicants'] = ApplicantData::whereRaw("id in (". $attached_applicants_id .")")->get();
        $arr["options"]  = AASource::whereRaw(
            'type in ("income_primary_docs","income_support_docs","wealth_primary_docs","wealth_support_docs", "property_primary_docs","property_support_docs", "salutation","position","nature_of_business")')->get();
        echo "<pre>";
        print_r($arr);
        exit();
        return view("maker.editform")->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, loan_application $loan_application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\loan_application  $loan_application
     * @return \Illuminate\Http\Response
     */
    public function destroy(loan_application $loan_application)
    {
        //
    }
}
