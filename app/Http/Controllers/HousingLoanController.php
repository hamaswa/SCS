<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityInfo;


class HousingLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilityinfo = FacilityInfo::paginate(10);
        return view("deview")->with(['facilityinfo'=>$facilityinfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("de")->with(array("type"=>'housingloan','button'=>"Housing Loan"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $facility = new FacilityInfo();
        $facility->type = $data['type'];
        $facility->csris = implode(",", $data['csris']);
        $facility->facilitydate = $data['facilitydate'];
        $facility->capacity = $data['capacity'];
        $facility->facilitylimit = $data['facilitylimit'];
        $facility->facilityoutstanding = $data['facilityoutstanding'];
        $facility->installment = $data['installment'];
        $facility->mia = $data['mia'];
        $facility->conduct = $data['conduct'];
        $facility->save();
        if ($facility->id) {
            echo "success";
        } else {
            echo "fail";
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
