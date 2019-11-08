<?php
//Tested in PHP Version 5.6.3
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);


$location_URL = 'http://uat.cmctos.com.my:8080/ctos/Proxy?wsdl';
$action_URL = "http://ws.proxy.xml.ctos.com.my/";

// ENQWS Account Info
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

$client = new SoapClient($location_URL , array(
    'location' => $location_URL,
    'uri'      => $action_URL,
    'trace'    => 1,
    'stream_context' => stream_context_create($context),
));

// Subject Info
$output = "2";                    // 0 = XML, 1 = HTML, 2 = PDF
$type 			= "I";  				// I = Individual, B = Business, C = Company
$ic_lc 			= "";					// Old IC / Company Registration No
$nic_br = "771113235530"; //$_REQUEST['nic'];	 	// New IC / Business Registration No / Passport
$name = "VASANTHI ASHOKAN";//$_REQUEST['name'];
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
	<purpose code="200"></purpose>
    <include_ctos>1</include_ctos>
    <include_trex>1</include_trex>
    <include_ccris sum="0">1</include_ccris>
    <include_dcheq>0</include_dcheq>
    <include_fico>0</include_fico>
    <include_ssm>0</include_ssm>
  </records>
  </batch>
';

$SimpleXMLElement = new SimpleXMLElement($requestXML);


try{
    header("Content-disposition: attachment; filename=" . $name . "_" . $nic_br . ".pdf");
    header("Content-Type: text/pdf");
    $order_return = $client->request(array("input"=>$SimpleXMLElement->asXML())) ;
    echo $order_return->return;
    //print_r($order_return);

}catch (SoapFault $exception){

    var_dump(get_class($exception));
    echo($exception);
}




?>