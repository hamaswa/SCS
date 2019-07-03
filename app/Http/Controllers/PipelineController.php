<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;
use SimpleXMLElement;
use App\ApplicantData;
use App\ApplicantIncome;
use App\ApplicantWealth;
use App\FacilityInfo;

class PipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicantdata = ApplicantData::paginate(2);
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

            $data = ApplicantData::whereRaw("id in( " . implode(",",$inputs['applicant_id']).")");
            $data->update(['status'=>$inputs['statusall']]);

            return back()->with('success','Updated Successfully!');
            return redirect(route("pipeline.index"));
        }
        else if(isset($inputs['pipeline_update_search']) and $inputs['pipeline_update_search']=='Search'){

            $applicantdata =new  ApplicantData();
            $data = $applicantdata->whereRaw("(unique_id = '" . $inputs['term'] . "' or name = '" . $inputs['term'] . "')
            and status = '" . $inputs['status'] . "'")->paginate(2);


            return view("aadata.pipeline")->with("data",$data);

        }
        else if(isset($inputs['submit']) and $inputs['submit']=='Search'){
            $applicantdata = ApplicantData::where($inputs['searchfield'],'=',$inputs['search'])->paginate(2);
            return view("aadata.index")->with("data",$applicantdata);
        }
        else  if ($inputs['formname'] == 'APICall') {

            $options['type']=0;
            $xmlresponse = $this->apiCall($inputs,$options);
            $reponsedata = simplexml_load_string($xmlresponse);// $xmlresponse->children();
            //print_r($reponsedata);
            //print_r($reponsedata->enq_report->summary);
            $accounts = $reponsedata->enq_report->enquiry->section_ccris->accounts;

            foreach ($accounts[0] as $account) {
                $data = [];
                $data['applicant_id'] = $inputs['applicant_id'];
                $data['facilitydate']= $account->approval_date;
                $data['facilitylimit']= $account->limit;
                $data['capacity']= $account->capacity->attributes()->code;
                foreach ($account->sub_accounts[0] as $sub_account) {

                    $data['type']= $sub_account->facility->attributes()->code;
                    $data['facilityoutstanding']= intval(preg_replace('/[^\d.]/','',$sub_account->cr_positions->cr_position->balance));
                    $data['installment']= intval(preg_replace('/[^\d.]/', '', $sub_account->cr_positions->cr_position->inst_amount));
                    if($data['facilityoutstanding']!='0') {
                        $this->saveFacilityData($data);
                    }
                }

            }

        }
    }
    public function saveFacilityData($data)
    {
        $facility = new FacilityInfo();
        $facility->type = $data['type'];
        //$facility->csris = implode(",", $data['csris']);
        $facility->facilitydate = date("Y-m-d",strtotime($data['facilitydate']));
        $facility->capacity = isset($data['capacity']) ? $data['capacity'] : "";
        $facility->facilitylimit = $data['facilitylimit'];
        $facility->facilityoutstanding = $data['facilityoutstanding'];
        $facility->installment = $data['installment'];
        $facility->applicant_id = $data['applicant_id'];
        //$facility->conduct = $data['conduct'];
        $facility->save();
        if ($facility->id) {
            echo "success";
        } else {
            echo "fail";
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

    public function apiCall($inputs,$options){///
        $options['company_code'] 	= "ADPS";
        $options['account_no']		= "ADPS";
        $options['username'] 		= "adps_xml";
        $options['password'] 		= "@d85pS24";
        $options['location_URL'] = 'https://enq.cmctos.com.my:8443/ctos/Proxy?wsdl';
        $options['action_URL'] = "http://ws.proxy.xml.ctos.com.my/";
        $context = array(
            'http' => array(
                'header' => "username: ".$options['username']."\r\n" .
                    "password: ".$options['password']."\r\n"
            )
        );

        $client = new SoapClient($options['location_URL'] , array(
            'location' => $options['location_URL'],
            'uri'      => $options['action_URL'],
            'trace'    => 1,
            'stream_context' => stream_context_create($context),
        ));

        $requestXML = '<batch output="'.$options['type'].'" no="123456"  xmlns="http://ws.cmctos.com.my/ctosnet/request">
          <company_code>'.$options['company_code'].'</company_code>
          <account_no>'.$options['account_no'].'</account_no>
          <user_id>'.$options['username'].'</user_id>
          <record_total>1</record_total>	
          <records>
            <type>'.substr($inputs['aacategory'],0,1).'</type>
            <ic_lc></ic_lc>
            <nic_br>'.$inputs['unique_id'].'</nic_br>
            <name>'.$inputs['name'].'</name>
            <mphone_nos/>
            <ref_no></ref_no>
            <purpose code="200">3</purpose>
            <include_ctos>1</include_ctos>
            <include_trex>1</include_trex>
            <include_ccris sum="1">1</include_ccris>
            <include_dcheq>1</include_dcheq>
            <include_fico>1</include_fico>
            <include_ssm>1</include_ssm>
          </records>
          </batch>
        ';

        $SimpleXMLElement = new SimpleXMLElement($requestXML);


        try{

            $order_return = $client->request(array("input"=>$SimpleXMLElement->asXML())) ;
            return $order_return->return;


        }catch (SoapFault $exception){

            var_dump(get_class($exception));
            echo($exception);
            return "error";
        }
    }

}
