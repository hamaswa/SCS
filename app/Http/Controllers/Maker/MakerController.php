<?php

namespace App\Http\Controllers\Maker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ApplicantData;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\ApplicantProperty;
use App\AASource;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = ApplicantData::paginate(5);
        return view("maker.index");//->with("data", $applicantdata);
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
    public function edit($id)
    {

        $arr["applicant"] = ApplicantData::find($id);
        $arr["primary_docs"]  = AASource::where("type","primary_docs")->get();
        $arr["support_docs"]  = AASource::where("type","support_docs")->get();
        return view("maker.editform")->with("applicant", $arr);
    }


    public function newla($id)
    {
        $arr['income'] = ApplicantIncome::where("applicant_id","=",$id)->first();
        $arr['wealth'] = ApplicantWealth::where("applicant_id","=",$id)->first();
        $arr['properties'] = ApplicantProperty::where("applicant_id","=",$id)->get();
        $arr['income']->form_data = json_decode($arr['income']->form_data);
        $arr['wealth']->form_data = json_decode($arr['wealth']->form_data);
        $applicant = ApplicantData::find($id);
        $arr["applicant"] = $applicant;

        return view("maker.newla")->with($arr);
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
