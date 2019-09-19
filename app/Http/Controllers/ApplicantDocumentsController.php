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


    public function documents(Request $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = Auth::id();
        $arr['documents'] = ApplicantDocuments::where("applicant_id", $inputs['id'])->get();
        return view("aadata.documents")->with($arr);
    }


    public function download(Request $request)
    {
        $inputs = $request->all();
        $id = $inputs["id"];
        $document = ApplicantDocuments::find($id);
        return response()->download(storage_path("app/uploads/application_docs/" . $document->file_name));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //print_r($request->all());


//foreach ($request->income_doc as $k=>$v){
//    echo $k;
//}
//exit();
        try {
            $inputs = $request->all();
            if ($request->income_doc) {
                foreach ($request->income_doc as $file) {
                    $income_doc = $inputs['incometype'] ."_". $file->getClientOriginalName();
                    if ($file->storeAs("uploads/application_docs", $income_doc)) {
                        $inputs['file_name'] = $income_doc;
                        $inputs['doc_name'] = $income_doc;//(isset($inputs['primary_doc'])?$inputs['primary_doc']:$inputs['support_doc']);
                        $inputs['doc_type'] = $file->getMimeType();
                        $inputs['doc_hint'] = "income++" . $inputs['incometype'];
                        $inputs['doc_status'] = "Optional";
                        $inputs['user_id'] = Auth::id();
                        $document = ApplicantDocuments::create($inputs);
                    }

                }
                return view("maker.docs_upload")->with("success", $inputs['incometype'] . " document successfully uploaded");

            }
            else if ($request->wealth_doc) {
                foreach ($request->wealth_doc as $file) {
                    $wealth_doc = $inputs['wealthtype'] . "_" . $file->getClientOriginalName();
                    if ($file->storeAs("uploads/application_docs", $wealth_doc)) {

                        $inputs['file_name'] = $wealth_doc;
                        $inputs['doc_name'] = $wealth_doc;//(isset($inputs['primary_doc']) ? $inputs['primary_doc'] : $inputs['support_doc']);
                        $inputs['doc_type'] = $file->getMimeType();
                        $inputs['doc_hint'] = "wealth++" . $inputs['wealthtype'];
                        $inputs['doc_status'] = "Optional";
                        $inputs['user_id'] = Auth::id();
                        $document = ApplicantDocuments::create($inputs);
                    }
                }
                return view("maker.docs_upload")->with("success", $inputs['wealthtype'] . " document successfully uploaded");

            } else if ($request->property_doc) {
                foreach ($request->property_doc as $file) {

                    $property_doc = rand(1, 1000) . $file->getClientOriginalName();
                    if ($file->storeAs("uploads/application_docs", $property_doc)) {

                        $inputs['file_name'] = $property_doc;
                        $inputs['doc_name'] = "Property".(($inputs['number']*1)+1). "_".$property_doc;//(isset($inputs['primary_doc']) ? $inputs['primary_doc'] : $inputs['support_doc']);
                        $inputs['doc_type'] = $file->getMimeType();
                        $inputs['doc_hint'] = $inputs['doc_hint'];
                        $inputs['doc_status'] = "Optional";
                        $inputs['user_id'] = Auth::id();
                        $document = ApplicantDocuments::create($inputs);
                    }
                }
                return view("maker.docs_upload")->with("success", $inputs['doc_hint'] . " document successfully uploaded");

            }
            return view("docs_upload", ["success", "Document Successfully Uploaded"]);

        } catch (\Exception $exception) {
            print_r(["error", "Error Occured Uploading Document", "details" => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
