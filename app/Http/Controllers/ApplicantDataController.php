<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantData;
use DB;




class ApplicantDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = ApplicantData::paginate(2);

        return view("aadata.index")->with("data",$applicantdata);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $inputs = $request->all();
       //SELECT id, created_at FROM applicant_data WHERE created_at BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 1 day);
        $inputs['serial_no'] =  date('Ymdhis') ."". rand(1000,9999);
        return view("aadata.addform")->with("inputs",$inputs);
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
        if(isset($inputs['applicant_id']) and $inputs['applicant_id']!=""){
            $applicant = ApplicantData::find($inputs['applicant_id']);
            $applicant->update($inputs);
            return json_encode(["applicant_id" => $applicant->id]);

        }
        else {
            $applicant = ApplicantData::create($inputs);
            return json_encode(["applicant_id" => $applicant->id]);
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
