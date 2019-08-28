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
            if ($request->file("income_doc")) {
                $income_doc = rand(1, 1000) . $request->file("income_doc")->getClientOriginalName();
                $income_doc = $request->file("income_doc")->storeAs("uploads/application_docs", $income_doc);

                $inputs['file_name'] = $income_doc;
                $inputs['doc_name'] = $inputs['primary_doc'];
                $inputs['doc_type'] = $inputs['support_doc'];
                $inputs['doc_hint'] = $inputs['incometype'];
                $inputs['doc_status'] = "Optional";
                $inputs['user_id'] = Auth::id();
                $document = ApplicantDocuments::create($inputs);
                return back()->with("success",$inputs['incometype']. " document successfully uploaded");
            }
        }
        catch (\Exception $exception){
            echo $exception->getMessage();
          //  return back()->with("error", $exception->getMessage());
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
