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
use DB;
use Auth;


class PipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$applicantdata = new ApplicantData();
        $sql = "select a_d.*, sum(property_market_value) * 0.9 as market_value from applicant_data a_d join applicant_property a_p on a_d.id=a_p.applicant_id group by id";
        //$data = DB::select($sql)>paginate(5);
        if (Auth::id() == 1) {
            $data = DB::table("applicant_data")
                ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
                ->orderBy("id", "desc")
                ->groupBy("applicant_data.id")
                ->paginate(5);
        } else {
            $data = DB::table("applicant_data")
                ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
                ->whereRaw("applicant_data.user_id", "=", Auth::id())
                ->orderBy("id", "desc")
                ->groupBy("applicant_data.id")
                ->paginate(5);
        }




        return view("aadata.pipeline")->with("data",$data);
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
        $inputs['user_id']=Auth::id();
        if(isset($inputs['statusupdate']) and $inputs['statusupdate']=='statusupdate'){

            if(isset($inputs['applicant_id']) and $inputs['applicant_id']!="") {
                $data = ApplicantData::whereRaw("id in( " . implode(",", $inputs['applicant_id']) . ")");
                $data->update(['list_status' => $inputs['statusall']]);

                return back()->with('success', 'Updated Successfully!');
            }
            else
                return back()->with('error', 'Please select atlease on record!');



        }
        else if(isset($inputs['pipeline_update_search']) and $inputs['pipeline_update_search']=='Search') {

            $applicantdata = new  ApplicantData();
            $data = DB::table("applicant_data")
                ->leftjoin("applicant_property", "applicant_data.id", "=", "applicant_property.applicant_id")
                ->select(DB::raw("applicant_data.*, sum(applicant_property.property_market_value)* .9 as market_value"))
                ->whereRaw(
                    "(unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')" .
                    ($inputs['term'] == "" ? " OR" : " and ") . " status = '" . $inputs['status'] . "'" .
                    (Auth::id() == 1 ? " and applicant_data.user_id='" . Auth::id() . "'" : ""))
                ->orderBy("id", "desc")
                ->groupBy("applicant_data.id")
                ->paginate(5);


            /*
            if(isset($data->status) and $data->status == "Incomplete"){
                $id= $data->id;
                $data = $applicantdata->whereRaw(
                    "(
                        (unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
                    OR
                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
                     )
                     
                     OR
                        (
                            id in 
                            (
                                select applicant_id from loan_applications where la_applicant_id in 
                                (
                                    select id from applicant_data where
                                    (
                                        (unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
                                    OR
                                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
                                     )
                                )
                            )
                        )" .
                    (Auth::id() == 1 ? " and user_id='" . Auth::id() . "'" : ""))
                    ->paginate(50);
                $ids = $data->Pluck("id")->ToArray();

            }

            */

            return view("aadata.pipeline")->with("data", $data);

        }
        else if(isset($inputs['submit']) and $inputs['submit']=='Search'){
            $applicantdata =  new ApplicantData();
            if (Auth::id() == 1)
                $data = $applicantdata->where('unique_id','=',$inputs['search'])
                    ->first();
            else
                $data = $applicantdata->where('unique_id', '=', $inputs['search'])
                    ->where("user_id", "=", Auth::id())
                    ->first();

            /*
            if(isset($data->status) and $data->status == "Incomplete"){
                $inputs['term'] = $inputs['search'];
                $id= $data->id;
                $data = $applicantdata->whereRaw(
                    "(
                        (unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
                    OR
                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
                     )
                     
                     OR
                        (
                            id in 
                            (
                                select applicant_id from loan_applications where la_applicant_id in 
                                (
                                    select id from applicant_data where
                                    (
                                        (unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
                                    OR
                                        (id in (select applicant_id from loan_applications where la_applicant_id=". $id . "))
                                     )
                                )
                            )
                        )" .
                    (Auth::id() == 1 ? " and user_id='" . Auth::id() . "'" : ""))
                    ->paginate(50);
                $ids = $data->Pluck("id")->ToArray();

            }
            */
            return view("aadata.index")->with("data",$data);
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
