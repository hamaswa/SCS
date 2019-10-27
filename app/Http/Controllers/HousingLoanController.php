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
        $applicantdata = ApplicantData::where("user_id","=",Auth::id())
            ->orderBy("id","desc")
            ->paginate(5);

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
        $arr["capacity_data"]  = AASource::where("type","facility_type")->get();
        $inputs = $request->all();
        $arr['applicant']= ApplicantData::find($inputs['applicant_id']);
        $arr["applicant_id"] =  $inputs['applicant_id'];
        $arr["facility_data"] = FacilityInfo::where("applicant_id","=",$inputs['applicant_id'])->get();
        return view("de")->with($arr);
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
        $data['user_id']=Auth::id();

        if(isset($data['submit']) and $data['submit']=='Search') {
            $applicantdata = ApplicantData::where($data['searchfield'], '=', $data['search'])
                ->where("user_id","=",Auth::id())
                ->orderBy("id","desc")->paginate(5);
            return view("deview")->with(['applicantdata'=>$applicantdata]);
        }
        else {
            $data['csris'] = implode(",", $data['csris']);
            $arr["facility"] = FacilityInfo::create($data);
            $arr["facility_data"] = FacilityInfo::where("applicant_id","=",$data['applicant_id'])->get();


            if ($arr["facility"]->id) {
               return view("facility_info_view")->with($arr);
            } else {
                echo "error";
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
