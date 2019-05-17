<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AASource;
use App\ApplicationAccount;

class ApplicationAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // return view("applicationaccount");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['aafields'] = AASource::all()->where('status','=',1)->ToArray();
        return view("applicationaccount")->with($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->all();
        $aa = new ApplicationAccount();
        $aa->aasource_id = $data['aasource'];
        $aa->aacategory_id = $data['aacategory'];
        $aa->aabranch_id = $data['aabranch'];
        $aa->aatype_id = $data['aatype'];
        $aa->date = $data['aadate'];
        $aa->save();
        if($aa->id){
            echo "success";
        }
        else {
            echo "error";
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
