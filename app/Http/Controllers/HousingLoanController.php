<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FacilityInfo;
use SoapClient;
use SimpleXMLElement;


class HousingLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_code 	= "APUAT";
        $account_no		= "APUAT";
        $username 		= "ap_xml";
        $password 		= "a1234567";
        $context = array(
            'http' => array(
                'header' => "username: ".$username."\r\n" .
                    "password: ".$password."\r\n"
            )
        );
        $location_URL = 'http://uat.cmctos.com.my:8080/ctos/Proxy?wsdl';
        $action_URL = "http://ws.proxy.xml.ctos.com.my/";
        $client = new SoapClient($location_URL , array(
            'location' => $location_URL,
            'uri'      => $action_URL,
            'trace'    => 1,
            'stream_context' => stream_context_create($context),
        ));

        $output			= "2";					// 0 = XML, 1 = HTML, 2 = PDF
        $type 			= "I";  				// I = Individual, B = Business, C = Company
        $ic_lc 			= "";					// Old IC / Company Registration No
        $nic_br			= "691223085024";	 	// New IC / Business Registration No / Passport
        $name			= "MANDY WONG";
        $ref_no			= "";					// Optional

        $requestXML = '<batch output="'.$output.'" no="123456"  xmlns="http://ws.cmctos.com.my/ctosnet/request">
  <company_code>'.$company_code.'</company_code>
  <account_no>'.$account_no.'</account_no>
  <user_id>'.$username.'</user_id>
  <record_total>1</record_total>	
  <records>
    <type>'.$type.'</type>
    <ic_lc>'.$ic_lc.'</ic_lc>
    <nic_br>'.$nic_br.'</nic_br>
    <name>'.$name.'</name>
    <mphone_nos/>
	<ref_no>'.$ref_no.'</ref_no>
	<purpose code="200">3</purpose>
    <include_ctos>1</include_ctos>
    <include_trex>1</include_trex>
    <include_ccris sum="1">1</include_ccris>
    <include_dcheq>1</include_dcheq>
    <include_fico>1</include_fico>
    <include_ssm>1</include_ssm>
  </records>
  </batch>';

        $SimpleXMLElement = new SimpleXMLElement($requestXML);


        try{

            $order_return = $client->request(array("input"=>$SimpleXMLElement->asXML())) ;
           // header("Content-disposition: attachment; filename=test.pdf");
           // header("Content-Type: text/pdf");
           // echo $order_return->return;
            //exit();
            //return response()->download($order_return->return);


        }catch (SoapFault $exception){

            var_dump(get_class($exception));
            echo($exception);
        }


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
        $facility->capacity = isset($data['capacity'])?$data['capacity']:"";
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
