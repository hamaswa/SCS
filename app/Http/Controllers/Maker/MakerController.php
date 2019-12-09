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
use DB;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$applicantdata = new ApplicantData();
        $sql = "select a_d.*, sum(property_market_value) * 0.9 as market_value from applicant_data a_d join applicant_property a_p on a_d.id=a_p.applicant_id group by id";
        //$data = DB::select($sql)>paginate(5);
        if (Auth::id() == 1) {
            $data = DB::table("applicant_data")
                ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
                ->orderBy("id", "desc")
                ->groupBy("applicant_data.id")
                ->paginate(5);
        } else {
            $data = DB::table("applicant_data")
                ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
                ->whereRaw("applicant_data.user_id = " . Auth::id())
                ->orderBy("id", "desc")
                ->groupBy("applicant_data.id")
                ->paginate(5);
        }

        return view("maker.pipeline")->with("data", $data);
    }

    public function newAA(){
        return view("maker.new_aa")->with("data","view");
    }

    public  function storeNewAA(Request $request){
        $inputs = $request->all();
        $inputs['status'] = "Consent Obtained";
        $inputs['user_id'] = Auth::id();
        $applicant_count = ApplicantData::selectRaw("count(*) as count")->whereRaw("created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day)")
            ->get()->ToArray();
        $inputs['serial_no'] = date('Ymdhis') . "" . $applicant_count[0]["count"];

        if(ApplicantData::where("unique_id","=",$inputs['unique_id'])->exists()){
            return back()->with("error","Applicant Already Exists");
        }
        $applicant = ApplicantData::create($inputs);

        return redirect()->route("maker.index");
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

    public function statusInprogress(Request $request)
    {

        $inputs = $request->all();
        $applicant = ApplicantData::find($inputs['id']);
        $applicant->status = "Inprogress";
        $applicant->save();
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
            if (isset($inputs['pipeline_update_search']) and $inputs['pipeline_update_search'] == 'Search') {

                $applicantdata = new  ApplicantData();
                $data = DB::table("applicant_data")
                    ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                    ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value) * .9 as market_value"))
                    ->whereRaw(
                        "(unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')" .
                        ($inputs['term'] == "" ? " OR" : " and ") . " status = '" . $inputs['status'] . "'" .
                        (Auth::id() == 1 ? "" : " and applicant_data.user_id='" . Auth::id() . "'"))
                    ->orderBy("id", "desc")
                    ->groupBy("applicant_data.id")
                    ->paginate(5);

                return view("maker.pipeline")->with("data", $data);

            } else if ($applicant = Applicant_ApplicantData::find($inputs['id'])) {
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
            LoanApplication::create([
                "la_applicant_id" => $applicant->id,
                "applicant_id" => $applicant->id,
                "status" => "Incomplete",
            ]);
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
        $applicant_id = isset($_GET['applicant_id']) ? $_GET['applicant_id'] : $id;
//        $arr['businesses'] = ApplicantBusiness::where("applicant_id","=",$id)->get();
        $arr['businesses'] = ApplicantBusiness::where("applicant_id","=",$applicant_id)->get();
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
