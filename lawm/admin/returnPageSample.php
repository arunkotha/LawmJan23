<?php
/**
 * @author Payfort
 * @copyright Copyright PayFort 2012-2015 
 * @version 1.0 2015-10-11 2:39:41 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'Classes/PayfortIntegration.php';

$payfortIntegration = new PayfortIntegration();

echo '<pre>';
print_r($_REQUEST);

//check if there are return parameters inside payfort responce (option "Send Response Parameters" should be activated inside your account)
if (isset($_REQUEST['signature']) AND !empty($_REQUEST['signature'])) {
    //calculate Signature after back to merchant and comapre it with request Signature 
    $arrData = $_REQUEST;
    unset($arrData['signature']);
    $returnSignature = $payfortIntegration->calculateSignature($arrData, 'kejkeoelleol', 'sha256');
  
    //if ($returnSignature == $_REQUEST['signature']) {
        //valide request
        echo "Response Message : " . $_REQUEST['response_message'];
        echo "<br>";
        echo "Response Code    : " . $_REQUEST['response_code'];
  /*  } else {
        echo "Signature Mismatch";
    }*/

} else {
    //check your (Send Response Parameters) option inside your Technical Settings configration in your Payfort account
}