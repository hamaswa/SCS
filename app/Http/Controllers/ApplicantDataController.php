<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantData;
use App\ApplicantDocuments;
use App\Repository\SoapAPIRepo;
//use Illuminate\Support\Facades\Storage;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\ApplicantProperty;
use Session;
use DB;
use Auth;




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
        return view("aadata.index")->with("data", "View");
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

    public function  applicantSidebar(Request $request)
    {
        $inputs = $request->all();
        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $arr['incomes'] = ApplicantIncome::where("applicant_id","=",$inputs['applicant_id'])
            ->orderby("type")
            ->get();
        $arr['wealths'] = ApplicantWealth::where("applicant_id","=",$inputs['applicant_id'])
            //->orderby("type")
            ->get();
        $arr['income_total'] = DB::table('applicant_income')
            ->select(DB::raw("sum(gross) as total_gross, sum(net) as total_net"))
            ->where("applicant_id","=",$inputs['applicant_id'])
            ->groupby("applicant_id")
            ->first();
        $arr['wealth_total'] = DB::table('applicant_wealth')
            ->select(DB::raw("sum(gross) as total_gross, sum(total) as total_net"))
            ->where("applicant_id","=",$inputs['applicant_id'])
            ->groupby("applicant_id")
            ->first();

        $arr['properties'] = ApplicantProperty::where("applicant_id","=",$inputs['applicant_id'])->get();
        return view("aadata.applicant_sidebar")->with($arr);
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

        $inputs['user_id']=Auth::id();
        if (isset($inputs['form']) and $inputs['form'] == 'new_application') {
            $applicant_count = ApplicantData::selectRaw("count(*) as count")->whereRaw("created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)")
                ->get()->ToArray();
            $inputs['serial_no'] = date('Ymdhis') . "" . $applicant_count[0]["count"];

            if(ApplicantData::where("unique_id","=",$inputs['unique_id'])->exists()){
                return back()->with("error","Applicant Already Exists");
            }
            $applicant = ApplicantData::create($inputs);
            // return back()->with("success", "New Appointment Created");
            return redirect()->route("pipeline.index")->with("success", "New Appointment Created");;

        } else {

            $applicant = ApplicantData::find($inputs['applicant_id']);
            if ($request->file("consent") and isset($inputs['is-consent']) and $inputs['is-consent']=='consent') {
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
                // Need to enable ctos api calls later.
                $this->ctos_api->CTOSpdf($inputs);
                //$this->ctos_api->CTOSFacilityData($inputs);
                if($applicant->aacategory=="I")
                    return redirect()->route("aadata.create", ["id" => $applicant->id]);
                else
                    return redirect()->route("pipeline.index");

            } else {

                try {
                    $applicant->update($inputs);
                    if($applicant->status=="Appointment"){
                        return back()->with("success", "Data Updated Successfully");
                    }
                    else if (isset($inputs['status']) and $inputs['status'] == "Appointment-Attended") {
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
        $applicant = ApplicantData::find($id);
        return view("aadata.editform")->with("applicant", $applicant);
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
        try{
            $inputs = $request->all();
            $applicant = ApplicantData::find($id);
            $applicant->update($inputs);
            echo "Succesfully Updated";
        }
        catch (\Exception $exception){
            echo "Error Occured ". $exception->getMessage();
        }
        exit();
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


    public function storeAA(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id']=Auth::id();

        if (isset($inputs['form']) and $inputs['form'] == 'new_application') {
            if(ApplicantData::where("unique_id","=",$inputs['unique_id'])->exists()){
                return back()->with("error","Applicant Already Exists");
            }
            $applicant_count = ApplicantData::selectRaw("count(*) as count")->whereRaw("created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)")
                ->get()->ToArray();
            $inputs['serial_no'] = date('Ymdhis') . "" . $applicant_count[0]["count"];
            if(ApplicantData::where("unique_id","=",$inputs['unique_id'])->exists()){
                return back()->with("error","Applicant Already Exists");
            }
            $applicant = ApplicantData::create($inputs);
            $return_data = array(
                'msg' => 'New Appointment Created',
                'data' => $applicant
            );
            return back()->with("success", $return_data);

        }
        else {
            $applicant = ApplicantData::find($inputs['applicant_id']);
            if ($request->file("consent") and isset($inputs['is-consent']) and $inputs['is-consent']=='consent') {

                $concent_form_name = rand(1, 1000) . $request->file("consent")->getClientOriginalName();
                $concent_form = $request->file("consent")->storeAs("uploads/application_docs", $concent_form_name);
                if ($concent_form != "") {
                    $applicant->consent = "1";
                    $applicant->status = "Documentation";
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
//                return redirect()->route("aadata.create", ["id" => $applicant->id]);
                return view("maker.docs_upload")->with("success", "Consent successfully uploaded");
            }
            else {
                try {
                    $applicant->update($inputs);
                    if($applicant->status=="Appointment"){
                        $return_data = array(
                            'msg' => "Data Updated Successfully",
                            'data' => $inputs
                        );
                        return back()->with("success", $return_data);
                    }
                    else if (isset($inputs['status']) and $inputs['status'] == "Appointment-Attended") {
                        $return_data = array(
                            'msg' => 'Attendent Status Updated',
                            'data' => $inputs
                        );
                        return back()->with("success", $return_data);

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
    }
}
