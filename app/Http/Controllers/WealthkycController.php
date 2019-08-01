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

        $wealth = ApplicantWealth::where("applicant_id",$inputs['applicant_id'])->first();
        if($wealth){
            $wealth->update($inputs);
            $wealth->form_data = json_encode($inputs);
            $wealth->save();
            return json_encode(["applicant_id" => $wealth->applicant_id, "wealth_id" => $wealth->id]);
        }
       else if (isset($inputs['welath_id']) and $inputs['welath_id'] != "") {
            $wealth = ApplicantWealth::find($inputs['welath_id']);
            $wealth->update($inputs);
        } else {

            if (isset($inputs['total'])) {
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
