<?php
/**
 * Created by PhpStorm.
 * User: Hamayun Khan
 * Date: 6/1/2019
 * Time: 4:16 PM
 */

namespace App\Repository;


use SoapClient;
use SimpleXMLElement;
use App\ApplicantDocuments;
use App\FacilityInfo;
use Illuminate\Support\Facades\Storage;
use Auth;

class SoapAPIRepo
{


    public function __construct()
    {


    }


    public function CTOSpdf($inputs){
        $options['type']=2;
        $file = $inputs['name']."_".$inputs['unique_id'].".pdf";
       // Storage::put("uploads/application_docs/".$file, $this->apiCall($inputs,$options));
        $inputs['file_name'] = $file;
        $inputs['doc_name'] = "Ctos report";
        $inputs['doc_type'] = "ctos";
        $inputs['doc_status'] = "Mandatory";
        $inputs['user_id'] = Auth::id();
        $document = ApplicantDocuments::create($inputs);
    }


    public function CTOSFacilityData($inputs)
    {
        $options['type'] = 0;

        $xmlresponse = strtolower($this->apiCall($inputs, $options));
        $reponsedata = simplexml_load_string($xmlresponse);// $xmlresponse->children();
        if (isset($reponsedata->enq_report->enquiry->section_ccris->accounts)) {
            $accounts = $reponsedata->enq_report->enquiry->section_ccris->accounts;

            foreach ($accounts[0] as $account) {
                $data = [];
                $data['applicant_id'] = $inputs['applicant_id'];
                $data['facilitydate'] = $account->approval_date;
                $data['facilitylimit'] = $account->limit;
                $data['capacity'] = $account->capacity->attributes()->code;
                foreach ($account->sub_accounts[0] as $sub_account) {

                    $data['type'] = $sub_account->facility->attributes()->code;
                    $data['facilityoutstanding'] = intval(preg_replace('/[^\d.]/', '', $sub_account->cr_positions->cr_position->balance));
                    $data['installment'] = intval(preg_replace('/[^\d.]/', '', $sub_account->cr_positions->cr_position->inst_amount));
                    $data['mia'] = intval(preg_replace('/[^\d.]/', '', $sub_account->cr_positions->cr_position->inst_arrears));
                    $data['conduct'] = intval(preg_replace('/[^\d.]/', '', $sub_account->cr_positions->cr_position->inst_arrears));
                    if ($data['facilityoutstanding'] != '0') {
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
        $facility->user_id = Auth::id();
        $facility->facilitydate = date("Y-m-d",strtotime($data['facilitydate']));
        $facility->capacity = strtolower(isset($data['capacity']) ? $data['capacity'] : "");
        $facility->facilitylimit = $data['facilitylimit'];
        $facility->facilityoutstanding = $data['facilityoutstanding'];
        $facility->installment = $data['installment'];
        $facility->applicant_id = $data['applicant_id'];
        $facility->mia = $data['mia'];
        $facility->conduct = $data['conduct'];
        $facility->save();
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
