<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantIncome;

class IncomekycController extends Controller
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
        if (isset($inputs['income_id']) and $inputs['income_id'] != "") {
            $income= ApplicantIncome::find($inputs['income_id']);
            $income->update($inputs);

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
