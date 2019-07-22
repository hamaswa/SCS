<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SimpleXMLElement;
use App\ApplicantData;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\FacilityInfo;
use App\ApplicantDocuments;
use Illuminate\Support\Facades\Storage;


class PipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = ApplicantData::paginate(5);
        return view("aadata.pipeline")->with("data",$applicantdata);
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



    public function store(Request $request)
    {
        $inputs = $request->all();

        if(isset($inputs['statusupdate']) and $inputs['statusupdate']=='statusupdate'){

            if(isset($inputs['applicant_id']) and $inputs['applicant_id']!="") {
                $data = ApplicantData::whereRaw("id in( " . implode(",", $inputs['applicant_id']) . ")");
                $data->update(['list_status' => $inputs['statusall']]);

                return back()->with('success', 'Updated Successfully!');
            }
            else
                return back()->with('error', 'Please select atlease on record!');



        }
        else if(isset($inputs['pipeline_update_search']) and $inputs['pipeline_update_search']=='Search'){

            $applicantdata =new  ApplicantData();
                $data = $applicantdata->whereRaw("(unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
            ". ($inputs['term']==""?" OR" : " and ") . " status = '" . $inputs['status'] . "'")->paginate(5);



            return view("aadata.pipeline")->with("data",$data);

        }
        else if(isset($inputs['submit']) and $inputs['submit']=='Search'){
            $applicantdata = ApplicantData::where('unique_id','=',$inputs['search'])->paginate(5);
            return view("aadata.index")->with("data",$applicantdata);
        }

    }


    public function downloadpdf(Request $request){

        $inputs  = $request->all();
        $options['type']=2;
        header("Content-disposition: attachment; filename=".$inputs['name']."_".$inputs['unique_id'].".pdf");
        header("Content-Type: text/pdf");
        echo $this->apiCall($inputs,$options);
        exit();
    }


}
