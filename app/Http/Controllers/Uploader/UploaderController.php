<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FacilityInfo;
use App\ApplicantData;
use App\AASource;
use App\ApplicantProperty;
use App\maker\LoanApplication;
use Auth;
use DB;

class UploaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inputs = request()->all();
        $id = $inputs['id'];
        $count=0;
        $la_applicant = LoanApplication::where("la_applicant_id",'=',$id)->get();
        if(count($la_applicant)>0) {

            $applicant_count = LoanApplication::selectRaw("count(*) as count")
                ->whereRaw("la_serial_no='" . date("dmY") . "'")
                ->get()->ToArray();
            $count = (int)$applicant_count[0]["count"];

            foreach ($la_applicant as $applicant) {
                $applicant->la_serial_no = date("dmY");
                $applicant->la_serial_id = $count + 1;
                $applicant->save();
            }
        }

        $arr["la_serial_no"] = date("dmY");
        $arr["la_serial_id"] = $count+1;
        $arr["loan_application"] = $la_applicant;
        $arr["applicant"] = ApplicantData::find($id);
        $arr["applicants"] = ApplicantData::selectRaw("applicant_data.id,name,applicant_approved")
            ->leftjoin('loan_applications',function ($join){
                $join->on("applicant_data.id","=",'loan_applications.applicant_id');
            })
            ->whereRaw(
            "(
                (applicant_data.id = $id)
                    OR
                        (applicant_data.id in (select applicant_id from loan_applications where la_applicant_id=" . $id . "))
                     )
                     
                     OR
                        (
                            applicant_data.id in 
                            (
                                select applicant_id from loan_applications where la_applicant_id in 
                                (
                                    select applicant_data.id from applicant_data where
                                    (
                                        (applicant_data.id = $id)
                                    OR
                                        (applicant_data.id in (select applicant_id from loan_applications where la_applicant_id=" . $id . "))
                                     )
                                )
                            )
                        )            
                              
                    and applicant_data.user_id='" . Auth::id() . "'")->get();


        $arr["capacity_data"] = AASource::where("type", "facility_type")->get();
        $arr["facilities"] = FacilityInfo::whereRaw("
                status='new_facility' and 
                applicant_id=" . $id . " and ".
                "la_id='". $arr["la_serial_no"] . "_".$arr["la_serial_id"]."'")
            ->get();




        return view("uploader.index")->with($arr);
    }


    public function  existingCommitment(Request $request)
    {
        $inputs = $request->all();

        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $arr['existing_commitments'] = FacilityInfo::where("applicant_id","=",$inputs['applicant_id'])
            ->where("la_id",'=', null)
            ->get();

        $arr['income_total'] = DB::table('applicant_income')
            ->select(DB::raw("sum(gross) as total_gross, sum(net) as total_net"))
            ->where("applicant_id","=",$inputs['applicant_id'])
            ->groupby("applicant_id")
            ->first();

        return view("uploader.existing_commitment")->with($arr);
    }

    public function  newCommitment(Request $request)
    {
        $inputs = $request->all();

        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $la_application = LoanApplication::where("applicant_id","=",$inputs['applicant_id'])->first();
        $facility_covered = $la_application->facility_covered;
        $arr['new_commitments'] = FacilityInfo::whereRaw(
            "(applicant_id = '" . $inputs['applicant_id'] . "' 
                and la_id  is NULL "
            . (($facility_covered!="" OR $facility_covered!=null)? "and id not in ($facility_covered)": "").
               " )"
            . " OR la_id = '".  $inputs['la_id']."'")
            ->get();
        $arr['income_total'] = DB::table('applicant_income')
            ->select(DB::raw("sum(gross) as total_gross, sum(net) as total_net"))
            ->where("applicant_id","=",$inputs['applicant_id'])
            ->groupby("applicant_id")
            ->first();

        return view("uploader.new_commitment")->with($arr);
    }

    public function  newFacility(Request $request)
    {
        $inputs = $request->all();
        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $arr['new_facility'] = FacilityInfo::where("applicant_id","=",$inputs['applicant_id'])
            ->where("la_id",'=', $inputs['la_id'])
            ->get();

        return view("uploader.new_facility")->with($arr);
    }

    public function  facilityEdit(Request $request)
    {
        $inputs = $request->all();
        $arr["capacity_data"] = AASource::where("type", "facility_type")->get();

        $arr["facilities"] = FacilityInfo::whereRaw("
                status='new_facility' and 
                applicant_id in (" . implode(",",$inputs['applicant_id']) . ") and ".
            "la_id='".  $inputs['la_id']."'")
            ->get();

        return view("uploader.facility_edit")->with($arr);
    }

    public function laProperties(Request $request){
        $inputs = $request->all();
        $arr["properties"] = ApplicantProperty::whereRaw(
            "applicant_id in (". implode(",",$inputs['applicant_id']).")")->get();
        return view("uploader.properties")->with($arr);
    }

    public function attachProperty(Request $request){
        $inputs = $request->all();
        $serial = explode("_",$inputs['la_id']);

        $la_applicant = LoanApplication::where("la_serial_no", "=", $serial[0])
            ->where("la_serial_id","=",$serial[1])
            ->first();
        $la_applicant->property_id = $inputs['property_id'];
        $la_applicant->save();
        echo $la_applicant->property_id;
    }

    public function laFacilities(Request $request){
        $inputs = $request->all();

        $arr['applicants'] = ApplicantData::find($inputs['applicant_id']);
//        $ids = implode(",",$inputs['applicant_id']);
//        $arr["applicants"] = ApplicantData::selectRaw("applicant_data.id,name,applicant_approved,facility_covered")
//            ->leftjoin('loan_applications',function ($join){
//                $join->on("applicant_data.id","=",'loan_applications.applicant_id');
//            })
//            ->whereRaw(
//                "(
//    (applicant_data.id in (1)
//OR
//(applicant_data.id in (select applicant_id from loan_applications where la_applicant_id in (1)))
//
//)
//    OR
//    (
//        applicant_data.id in
//        (
//            select applicant_id from loan_applications where la_applicant_id in
//            (
//                select applicant_data.id from applicant_data where
//                (
//                    (applicant_data.id in (1))
//                    OR
//                    (applicant_data.id in (select applicant_id from loan_applications where la_applicant_id in (1)))
//                )
//            )
//        )
//    )
//    and applicant_data.user_id ='" . Auth::id() . "'")->get();
        return view("uploader.la_facilities")->with($arr);
    }

    public function coverFacility(Request $request){
        try {
            $inputs = $request->all();

            $inputs['facility_covered'] = implode(",", $inputs['facility_covered']);
            $la_app = LoanApplication::where("applicant_id", "=", $inputs['applicant_id'])
                ->where("la_serial_no", "=", explode("_", $inputs['la_id'])[0])
                ->where("la_serial_id", "=", explode("_", $inputs['la_id'])[1])->first();
            $la_app->facility_covered = $inputs['facility_covered'];
            $la_app->save();
            echo "success";
        }
        catch(\Exception $e){
            echo "error";
        }

    }

    public function SelectApplicant(Request $request){
        try {
            $inputs = $request->all();

            $inputs['applicant_id'] = implode(",", $inputs['applicant_id']);
            LoanApplication::whereRaw("la_serial_no ='" . explode("_",$inputs['la_id'])[0] ."'
             and la_serial_id ='" . explode("_",$inputs['la_id'])[1] ."'")
                ->update(["applicant_approved"=>null]);

            $la_app = LoanApplication::whereRaw("applicant_id in (". $inputs['applicant_id'] . ")
             and la_serial_no ='" . explode("_",$inputs['la_id'])[0] ."'
             and la_serial_id ='" . explode("_",$inputs['la_id'])[1] ."'")
                ->update(["applicant_approved"=>"1"]);

        }
        catch(\Exception $e){
           // print_r($e);
            echo "error";
        }

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

    public function storeNewFacility(Request $request)
    {

        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $inputs['status'] = "new_facility";
        $applicants = $inputs['applicant_id'];
        $inputs['capacity']="own";
        if(count($applicants)>1){
            $inputs['capacity']="ja";
            $inputs['installment'] = $inputs['installment']/count($applicants);
        }
        $arr["capacity_data"] = AASource::where("type", "facility_type")->get();
        if (isset($inputs['id'])) {

            if ($inputs['loan_amount'] != "" or $inputs['interest_rate'] != "" or $inputs['loan_tenure'] != "") {

                $facility = FacilityInfo::where("la_id",$inputs["la_id"])->first();
                $facility->update($inputs);
                if ($facility->id) {
                    $arr["facilities"] = FacilityInfo::whereRaw("
                    status='new_facility' and 
                    la_id='" . $inputs["la_id"] . "'")
                        ->get();
                    return view("uploader.facility_edit")->with($arr);
                }
            }

        }
        else {
            if ($inputs['loan_amount'] != "" or $inputs['interest_rate'] != "" or $inputs['loan_tenure'] != "") {
                foreach ($applicants as $applicant) {
                    $inputs['applicant_id'] = $applicant;
                    $facility = FacilityInfo::create($inputs);
                }
                $arr["facilities"] = FacilityInfo::whereRaw("
                    status='new_facility' and 
                    la_id='" . $inputs["la_id"] . "'")
                    ->get();
                return view("uploader.facility_edit")->with($arr);

            }
        }
    }

    public function deleteFacility(Request $request)
    {
        $inputs=$request->all();
        if (isset($inputs['id']) and $inputs['id'] != "") {
            $des_facility = FacilityInfo::destroy($inputs['id']);
            if(!$des_facility){
                echo "Error occured while deleting facility";
            }
            else {
                echo "success";
            }
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
