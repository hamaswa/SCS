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
        $la_applicant = LoanApplication::find($id);
        if (!$la_applicant->la_serial_no) {
            $la_applicant->la_serial_no = date("dmY");
            $applicant_count = LoanApplication::selectRaw("count(*) as count")
                ->whereRaw("la_serial_no='" . date("dmY") . "'")
                ->get()->ToArray();
            $la_applicant->la_serial_id = (int)$applicant_count[0]["count"] + 1;
            $la_applicant->save();
        }
        $la_serial_no = $la_applicant->la_serial_no;
        $la_serial_id = $la_applicant->la_serial_id;
        $arr["loan_application"] = $la_applicant;
        $arr["applicant"] = ApplicantData::find($id);
        $arr["applicants"] = ApplicantData::whereRaw(
            "(
                        (id = $id)
                    OR
                        (id in (select applicant_id from loan_applications where la_applicant_id=" . $id . "))
                     )
                     
                     OR
                        (
                            id in 
                            (
                                select applicant_id from loan_applications where la_applicant_id in 
                                (
                                    select id from applicant_data where
                                    (
                                        (id = $id)
                                    OR
                                        (id in (select applicant_id from loan_applications where la_applicant_id=" . $id . "))
                                     )
                                )
                            )
                        )            
                              
                    and user_id='" . Auth::id() . "'")->get();
        $arr["capacity_data"] = AASource::where("type", "facility_type")->get();
        $arr["facilities"] = FacilityInfo::whereRaw("
                status='new_facility' and 
                applicant_id=" . $id . " and ".
                "la_id='". $la_serial_no . "_".$la_serial_id."'")
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

        return view("uploader.existing_commitment")->with($arr);
    }

    public function  newCommitment(Request $request)
    {
        $inputs = $request->all();
        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $arr['new_commitments'] = FacilityInfo::whereRaw("(applicant_id = '" . $inputs['applicant_id'] . "' and la_id  is NULL)"
             . " OR la_id = '".  $inputs['la_id']."'")
            ->get();

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

    public function laProperties(Request $request){
        $inputs = $request->all();
        $arr["properties"] = ApplicantProperty::whereRaw("applicant_id in (". implode(",",$inputs['applicant_id']).")")->get();
        return view("uploader.properties")->with($arr);
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
                $facility = FacilityInfo::create($inputs);
                if ($facility->id) {
                    $arr["facilities"] = FacilityInfo::whereRaw("
                    status='new_facility' and 
                    la_id='" . $inputs["la_id"] . "'")
                        ->get();
                    return view("uploader.facility_edit")->with($arr);
                }
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
