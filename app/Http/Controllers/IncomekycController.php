<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\ApplicantProperty;
use Auth;

class IncomekycController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $inputs = $request->all();
        $arr['income'] = ApplicantIncome::where("applicant_id","=",$inputs['id'])->first();
        $arr['wealth'] = ApplicantWealth::where("applicant_id","=",$inputs['id'])->first();
        $arr['properties'] = ApplicantProperty::where("applicant_id","=",$inputs['id'])->get();
        $arr['income']->form_data = json_decode($arr['income']->form_data);
        $arr['wealth']->form_data = json_decode($arr['wealth']->form_data);
        return view("aadata.income")->with($arr);

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

        $income = ApplicantIncome::where("applicant_id",$inputs['applicant_id'])->first();
        if($income){
            $income->update($inputs);
            $income->form_data = json_encode($inputs);
            $income->save();
            return json_encode(["applicant_id" => $income->applicant_id, "income_id" => $income->id]);
        }
        else if (isset($inputs['income_id']) and $inputs['income_id'] != "") {
            $income= ApplicantIncome::find($inputs['income_id']);
            $income->update($inputs);
            return json_encode(["applicant_id" => $income->applicant_id, "income_id" => $income->id]);
        } else {
            if (isset($inputs['gross'])) {
                $income = ApplicantIncome::create($inputs);
                $income->form_data = json_encode($inputs);
                $income->save();
                return json_encode(["applicant_id" => $income->applicant_id, "income_id" => $income->id]);
            } else {
                return json_encode(["error" => "No Income Data submitted"]);
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
