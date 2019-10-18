<?php

namespace App\Http\Controllers\Uploader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FacilityInfo;
use App\ApplicantData;
use App\AASource;
use App\ApplicantProperty;
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
        $inputs=request()->all();
        $id=$inputs['id'];
        $arr["applicant"] = ApplicantData::find($id);
        $arr["applicants"]= ApplicantData::whereRaw(
            "(
                        (id = $id)
                    OR
                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
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
                                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
                                     )
                                )
                            )
                        )            
                              
                    and user_id='" . Auth::id() . "'")->get();
        $arr["capacity_data"]  = AASource::where("type","facility_type")->get();

        return view("uploader.index")->with($arr);
    }


    public function  existingCommitment(Request $request)
    {
        $inputs = $request->all();
        $arr['applicant'] = ApplicantData::find($inputs['applicant_id']);
        $arr['existing_commitments'] = FacilityInfo::where("applicant_id","=",$inputs['applicant_id'])
            ->get();

        return view("aadata.existing_commitment")->with($arr);
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

    public function storeNewFacility(Request $request){

        $inputs = $request->all();
        $facility = FacilityInfo::create($inputs);
//        $facility->type = $data['type'];
//        $facility->csris = implode(",", $data['csris']);
//        $facility->facilitydate = $data['facilitydate'];
//        $facility->capacity = isset($data['capacity'])?$data['capacity']:"";
//        $facility->facilitylimit = $data['facilitylimit'];
//        $facility->facilityoutstanding = $data['facilityoutstanding'];
//        $facility->installment = $data['installment'];
//        $facility->mia = $data['mia'];
//        $facility->conduct = $data['conduct'];
//        $facility->save();
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
