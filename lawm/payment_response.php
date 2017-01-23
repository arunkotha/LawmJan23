<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
$signature = 'kejkeoelleolaccess_code=GD6GmQHCP0iYZW3Nz8FIlanguage=enmerchant_identifier=yhrReESEmerchant_reference=Test01003query_command=CHECK_STATUSkejkeoelleol';
$signature = hash('sha256', $signature);
$url = 'https://sbpaymentservices.payfort.com/FortAPI/paymentApi';
$arrData = array(
    'access_code' => 'GD6GmQHCP0iYZW3Nz8FI' ,
    'merchant_reference' => 'Test01003',
    'merchant_identifier' => 'yhrReESE',
    'signature' => $signature,
    'query_command' => 'CHECK_STATUS' ,
    'language' => 'en'

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
$result = json_decode($result);
echo '<pre>';
print_r($result);
?>