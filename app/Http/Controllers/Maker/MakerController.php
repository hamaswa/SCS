<?php

namespace App\Http\Controllers\Maker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ApplicantData;

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
        return view("maker.editform")->with("applicant", $applicant);
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
