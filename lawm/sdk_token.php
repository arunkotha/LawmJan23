<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$service_command = $_REQUEST['service_command'];
$device_id = $_REQUEST['device_id'];
$signature = 'kejkeoelleolaccess_code=GD6GmQHCP0iYZW3Nz8FIdevice_id='.$device_id.'language=enmerchant_identifier=yhrReESEservice_command='.$service_command.'kejkeoelleol';
$signature = hash('sha256', $signature);
$url = 'https://sbpaymentservices.payfort.com/FortAPI/paymentApi';
$arrData = array(
    'access_code' => 'GD6GmQHCP0iYZW3Nz8FI' ,
    'merchant_identifier' => 'yhrReESE',
    'signature' => $signature,
    'service_command' => $service_command ,
    'language' => 'en',
    'device_id' => $device_id
);

$ch = curl_init( $url );
# Setup request to send json via POST.
$data = json_encode($arrData);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
echo $result; exit;
/*$result = json_decode($result);
echo '<pre>';
print_r($result);*/
?>