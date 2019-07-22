<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantData;
use App\ApplicantDocuments;
use DB;
use App\Repository\SoapAPIRepo;
use Session;
use Illuminate\Support\Facades\Storage;




class ApplicantDataController extends Controller
{
    private $ctos_api;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(SoapAPIRepo $ctos_api)
    {
        $this->ctos_api = $ctos_api;
    }

    public function index()
    {
        $applicantdata = ApplicantData::paginate(5);
        return view("aadata.index")->with("data", $applicantdata);
    }

    public function applicantData(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $inputs = $request->all();
        //SELECT count(*) FROM applicant_data WHERE ;
        $applicant = ApplicantData::find($inputs['id']);
        return view("aadata.addform")->with("applicant", $applicant);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $inputs = $request->all();
        if (isset($inputs['form']) and $inputs['form'] == 'new_application') {
            $applicant_count = ApplicantData::selectRaw("count(*) as count")->whereRaw("created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)")
                ->get()->ToArray();
            $inputs['serial_no'] = date('Ymdhis') . "" . $applicant_count[0]["count"];
            $applicant = ApplicantData::create($inputs);
            return back()->with("success", "New Appointment Created");

        } else {
            $applicant = ApplicantData::find($inputs['applicant_id']);
            if ($request->file("consent")) {
                $concent_form_name = rand(1, 1000) . $request->file("consent")->getClientOriginalName();
                $concent_form = $request->file("consent")->storeAs("uploads/application_docs", $concent_form_name);
                if ($concent_form != "") {
                    $applicant->consent = "1";
                    $applicant->status = "Consent Obtained";
                    $applicant->save();
                }
                $inputs['file_name'] = $concent_form_name;
                $inputs['doc_name'] = "Consent form";
                $inputs['doc_type'] = "consent";
                $inputs['doc_status'] = "Mandatory";
                $inputs['aacategory'] = "I";
                $document = ApplicantDocuments::create($inputs);
                $this->ctos_api->CTOSpdf($inputs);
                $this->ctos_api->CTOSFacilityData($inputs);
                return redirect()->route("aadata.create", ["id" => $applicant->id]);
            } else {
                try {
                    $applicant->update($inputs);
                    if($applicant->status=="Appointment"){
                        return back()->with("success", "Data Updated Successfully");
                    }
                    else if (isset($inputs['status']) and $inputs['status'] == "Appointment-Attendent") {
                        return back()->with("success", "Attendent Status Updated");

                        //return json_encode(["status" => $applicant->status,"success"=>"Attendent Status Updated"]);
                    } else {
                        return back()->with("error", "Data is saved without consent form. but you can't proceed");
                    }
                } catch (\Exception $e) {
                    return back()->with("error",$e->getMessage());
                    //return json_encode(["error" => $e->getMessage()]);

                }
            }

        }

//    else
//        if (isset($inputs['applicant_id']) and $inputs['applicant_id'] != "") {
//            $applicant = ApplicantData::find($inputs['applicant_id']);
//            $applicant->update($inputs);
//            return json_encode(["applicant_id" => $applicant->id]);
//        } else {
//            $applicant = ApplicantData::create($inputs);
//            return json_encode(["applicant_id" => $applicant->id]);
//        }
//    }
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
