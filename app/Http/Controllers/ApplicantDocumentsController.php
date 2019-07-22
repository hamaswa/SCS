<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantDocuments;
use Illuminate\Support\Facades\Storage;

class ApplicantDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }


    public function documents(Request $request){
        $inputs = $request->all();
        $arr['documents'] = ApplicantDocuments::where("applicant_id",$inputs['id'])->get();
        return view("aadata.documents")->with($arr);
    }


    public function download(Request $request){
        $inputs = $request->all();
        $id= $inputs["id"];
        $document = ApplicantDocuments::find($id);
        return response()->download(storage_path("app/uploads/application_docs/". $document->file_name));
        // Storage::download($document->file_name);
        //echo $document->file_name;

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
