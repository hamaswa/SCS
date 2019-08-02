<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantProperty;
use App\ApplicantData;
use Auth;
class PropertykycController extends Controller
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
        if (isset($inputs['applicant_id']) and $inputs['applicant_id'] != "") {
            $property = ApplicantProperty::where("applicant_id", $inputs["applicant_id"]);
            $property->delete();
        }


            if (isset($inputs['form'])) {
                foreach ($inputs['form'] as $input) {
                    unset($input['formname']);
                    unset($input['number']);
                    $input['applicant_id'] = $inputs['applicant_id'];
                    $input['user_id']=Auth::id();
                    $property = ApplicantProperty::create($input);
                    $applicant = ApplicantData::find($inputs['applicant_id']);
                    $applicant->status="Documentation";
                    $applicant->save();
                }
                return json_encode(["applicant_id" => $property->applicant_id, "property_id" => $property->id]);
            } else {
                if (isset($inputs['applicant_id']) and $inputs['applicant_id'] != "") {
                    $property = ApplicantProperty::where("applicant_id", $inputs["applicant_id"]);
                    $property->delete();
                }

                return json_encode(["error" => "No Property Data submitted"]);
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
