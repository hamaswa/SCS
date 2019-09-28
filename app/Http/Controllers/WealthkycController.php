<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantWealth;
use Auth;

class WealthkycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs['user_id']=Auth::id();

        if(isset($inputs['action']) and $inputs['action']=='delete'){
            $wealth = ApplicantWealth::find($inputs['id']);
            $wealth->delete();
            echo json_encode(["success" => "Wealth Deleted Successfully"]);

        }
        else  if(isset($inputs['wealth_id']) and $inputs['wealth_id']!=""){
            $wealth = ApplicantWealth::find($inputs['wealth_id']);
            $wealth->update($inputs);
            $wealth->form_data = json_encode($inputs);
            $wealth->save();
            return json_encode(["applicant_id" => $wealth->applicant_id, "wealth_id" => $wealth->id]);
        }
       else {

            if (isset($inputs['total']) and $inputs['total']!="") {
                $wealth = ApplicantWealth::create($inputs);
                $wealth->form_data = json_encode($inputs);
                $wealth->save();
                return json_encode(["applicant_id" => $wealth->applicant_id, "wealth_id" => $wealth->id]);
            } else {
                return json_encode(["error" => "No Wealth Data submitted"]);
            }

        }
    }

    /**
     * Display the action buttons for added wealth data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function actionbtns(Request $request){
        $inputs = $request->all();
        $id=$inputs['applicant_id'];
        $wealths = ApplicantWealth::where("applicant_id","=",$id)->get();
        return view("aadata.wealthkyc_action_btns")->with("wealths",$wealths);
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
        $inputs = request()->all();
        $arr["wealth"] = ApplicantWealth::find($id);
        $arr['type'] = $inputs["type"];
        return view("aadata.wealth_edit")->with($arr);
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
