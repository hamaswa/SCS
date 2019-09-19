<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AASource;
use App\DataTables\FieldsDatatable;
use Auth;

class AASourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FieldsDatatable $datatable)
    {
      return    $datatable->render("aasource.index");
    }


    /**
     * return select options on cretaria
     *
     * @return \Illuminate\Http\Response
     */
    public function selectoptions(Request $request){
        $inputs = $request->all();
        $arr["options"] = AASource::whereRaw("type like '".$inputs['type']."%'")->get();
        $arr["name"]=$inputs["name"];
        $arr["id"] = $inputs["id"];
        $arr["label"] = $inputs["label"];
        $arr["type"] = $inputs['type'];

        return view("maker.docs")->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("aasource.addform");
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
        $inputs['user_id']=Auth::id();
        $aasource = new AASource();
        $aasource->name = $data['name'];
        $aasource->description = $data['description'];
        $aasource->type = $data['type'];
        $aasource->save();
        if ($aasource->id) {
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
        $select = AASource::find($id);
        return view("aasource.editform")->with("select",$select);


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
        $inputs = $request->all();
        $source = AASource::find($id);
        if(isset($inputs['status'])) {
            $source->update($inputs);
            return back()->with("success", "Status successfull Updated");
        }
        else {
            $source->update($inputs);
            return redirect(route("aafields.index")->with("success","Successfully Updated"));
        }
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
