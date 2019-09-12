<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantDocuments;
use Auth;
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
        $inputs['user_id']=Auth::id();
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


        try {
            $inputs = $request->all();
            echo "<pre>";
            print_r($inputs);
            exit();
            if ($request->file("income_doc")) {
                $income_doc = rand(1, 1000) . $request->file("income_doc")->getClientOriginalName();
                if($request->file("income_doc")->storeAs("uploads/application_docs", $income_doc)) {
                    $inputs['file_name'] = $income_doc;
                    $inputs['doc_name'] = $inputs['primary_doc'];
                    $inputs['doc_type'] = $inputs['support_doc'];
                    $inputs['doc_hint'] = "income+" . $inputs['incometype'];
                    $inputs['doc_status'] = "Optional";
                    $inputs['user_id'] = Auth::id();
                    $document = ApplicantDocuments::create($inputs);
                    return view("maker.docs_upload")->with("success", $inputs['incometype'] . " document successfully uploaded");
                }
            }

            else if ($request->file("wealth_doc")) {
                $wealth_doc = rand(1, 1000) . $request->file("wealth_doc")->getClientOriginalName();
                if($request->file("wealth_doc")->storeAs("uploads/application_docs", $wealth_doc)) {

                    $inputs['file_name'] = $wealth_doc;
                    $inputs['doc_name'] = $inputs['primary_doc'];
                    $inputs['doc_type'] = $inputs['support_doc'];
                    $inputs['doc_hint'] = "wealth+" . $inputs['wealthtype'];
                    $inputs['doc_status'] = "Optional";
                    $inputs['user_id'] = Auth::id();
                    $document = ApplicantDocuments::create($inputs);
                    return view("maker.docs_upload")->with("success", $inputs['wealthtype'] . " document successfully uploaded");
                }
            }

            else if ($request->file("property_doc")) {
                $property_doc = rand(1, 1000) . $request->file("property_doc")->getClientOriginalName();
                if($request->file("property_doc")->storeAs("uploads/application_docs", $property_doc)) {

                    $inputs['file_name'] = $property_doc;
                    $inputs['doc_name'] = $inputs['primary_doc'];
                    $inputs['doc_type'] = $inputs['support_doc'];
                    $inputs['doc_hint'] = $inputs['doc_hint'];
                    $inputs['doc_status'] = "Optional";
                    $inputs['user_id'] = Auth::id();
                    $document = ApplicantDocuments::create($inputs);
                    return view("maker.docs_upload")->with("success", $inputs['doc_hint'] . " document successfully uploaded");
                }
            }
            return view("docs_upload",["success","Document Successfully Uploaded"]);

        }
        catch (\Exception $exception){
           return view("maker.docs_upload",["error","Error Occured Uploading Document","details"=>$exception->getMessage()]);
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
