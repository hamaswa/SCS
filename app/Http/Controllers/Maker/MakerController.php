<?php

namespace App\Http\Controllers\Maker;

use App\ApplicantBusiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ApplicantData;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\ApplicantProperty;
use App\AASource;
use App\Applicant_ApplicantData;
use App\maker\LoanApplication;
use Auth;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = DB::table("applicant_data")
            ->leftjoin("applicant_property","applicant_data.id","=","applicant_property.applicant_id")
            ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
            ->where("applicant_data.user_id","=",Auth::id())
            ->where("applicant_data.status","=",'Incomplete')
            ->orderBy("id","desc")
            ->groupBy("applicant_data.id")
            ->paginate(5);
//        $applicantdata = ApplicantData::paginate(5);
        return view("maker.maker")->with("data", $applicantdata);
    }

    public function search(Request $request){
        $inputs = $request->all();
        $user=request()->user();
        $childs = implode(",",$user->childs()->Pluck("id")->ToArray());
        if($user->childs()) {
            $str  =  $this->getChildrens($user->childs);
            $childs .= (($childs != "" and $str!="") ? "," : "").$str;
        }

        $childs .= (($childs!="")?",":""). $user->id;

        $applicantdata = ApplicantData::whereRaw('unique_id = '. $inputs['search']." and user_id in (". $user->id .")")->paginate(5);
        return view("aadata.index")->with("data",$applicantdata);
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
        try {
            if ($applicant = Applicant_ApplicantData::find($inputs['id'])) {
                $inputs['user_id'] = Auth::id();
                $applicant->update($inputs);
            } else {
                $applicant = Applicant_ApplicantData::create($inputs);
            }

            return back()->with("success", "Applicant Data Successfully Saved");
        }
        catch (\Exception $exception){
            return back()->with("success", "Data not Saved" . $exception->getMessage());
        }
        //
    }



    public function storela(Request $request)
    {
        $inputs = $request->all();
        try {
            $applicant = ApplicantData::find($inputs['id']);
            $applicant->aasource = $inputs['aasource'];
            $applicant->aabranch = $inputs['aabranch'];
            $applicant->aacategory = $inputs['aacategory'];
            $applicant->status = "Incomplete";
            $applicant->save();
            return redirect(route("maker.edit", $applicant->id));
        }
        catch(\Exception $e){
            return back()->with("error",$e->getMessage());
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
    public function edit($id,Request $request)
    {

        $inputs=$request->all();
        if(isset($inputs['la_applicant_id'])) {
            $arr['la_applicant_id'] = $id = $inputs['la_applicant_id'];
            $arr["applicant"] = ApplicantData::find($id);
            $arr["applicant_data"] = ApplicantData::find($inputs['applicant_id']);
        }
        else {

            $arr["applicant_data"] = $arr["applicant"] = ApplicantData::find($id);
            $arr['la_applicant_id'] = $id;
        }
        if($arr["applicant_data"]->aacategory=="C"){

            $attached_applicants = LoanApplication::select('applicant_id')
                ->where("la_applicant_id","=",$arr["applicant_data"]->id)
                ->Pluck("applicant_id")->ToArray();
            $attached_applicants_id = implode(",",$attached_applicants);
            if($attached_applicants_id!="")
                $arr['com_attached_applicants'] = ApplicantData::whereRaw("aacategory='I' and id in (". $attached_applicants_id .")")->get();
        }
        $attached_applicants = LoanApplication::select('applicant_id')
            ->where("la_applicant_id","=",$id)->Pluck("applicant_id")->ToArray();
        $attached_applicants_id = implode(",",$attached_applicants);
        if($attached_applicants_id!="")
       $arr['attached_applicants'] = ApplicantData::whereRaw("aacategory=\"". $arr["applicant_data"]->aacategory ."\" and id in (". $attached_applicants_id .")")->get();
        $arr["options"]  = AASource::all();

        $arr['businesses'] = ApplicantBusiness::where("applicant_id","=",$id)->get();

        return view("maker.editform")->with($arr);
    }


    public function newla($id)
    {
        $arr['income'] = ApplicantIncome::where("applicant_id","=",$id)->first();
        $arr['wealth'] = ApplicantWealth::where("applicant_id","=",$id)->first();
        if(!isset($arr["income"])){
            $arr['income'] =  new \stdClass();

        }
        if(!isset($arr["wealth"])){
            $arr['wealth'] =  new \stdClass();

        }
        $arr['properties'] = ApplicantProperty::where("applicant_id","=",$id)->get();
        $arr['income']->form_data = json_decode(isset($arr['income']->form_data)?$arr['income']->form_data:"");
        $arr['wealth']->form_data = json_decode(isset($arr['wealth']->form_data)?$arr['wealth']->form_data:"");
        $applicant = ApplicantData::find($id);
        $arr["applicant"] = $applicant;

        return view("maker.newla")->with($arr);
    }

    /**
     * @param $id
     */
    public function create_aa($id){
        $arr['applicant_maker_id'] = $id;
        return view("maker.maker_create_aa")->with($arr);
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
