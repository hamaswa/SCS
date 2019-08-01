<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityInfo;
use App\ApplicantData;
use App\AASource;
use SoapClient;
use SimpleXMLElement;
use Auth;

class HousingLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = ApplicantData::paginate(5);

        $capacity_types_data  = AASource::where("type","capacity_type")->get();
        $capacity_type = [];
        foreach ($capacity_types_data as $item) {
            $capacity_type[strtolower($item->name)] = $item->description;
        }

        return view("deview")->with(['applicantdata'=>$applicantdata,'capacity_type'=>$capacity_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $capacity_data  = AASource::where("type","capacity_type")->get();
        $inputs = $request->all();
        return view("de")->with(["applicant_id" => $inputs['applicant_id'],"capacity_data"=>$capacity_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $inputs['user_id']=Auth::id();

        if(isset($data['submit']) and $data['submit']=='Search') {
            $applicantdata = ApplicantData::where($data['searchfield'], '=', $data['search'])->paginate(5);
            return view("deview")->with(['applicantdata'=>$applicantdata]);
        }
        else {
            $data['csris'] = implode(",", $data['csris']);
            $facility = FacilityInfo::create($data);
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
            if ($facility->id) {
                echo "success";
            } else {
                echo "fail";
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
        $inputs = $request->all();
        $facility = FacilityInfo::find($inputs['id']);
        try {
            $facility->update($inputs);
            return back()->with('success','Facility Data Updated Successfully!');
        }
        catch (\Exception $exception){
            return back()->with('error','There is an error');
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
        FacilityInfo::destroy($id);
        return back()->with('success','Facility Data Deleted Successfully!');
    }
}
