<?phpecho 1; exit;$signature = 'kejkeoelleolaccess_code=GD6GmQHCP0iYZW3Nz8FIamount=1000command=PURCHASEcurrency=SARcustomer_email=test@payfort.comlanguage=enmerchant_identifier=yhrReESEmerchant_reference=Test01003return_url=http://lawm.sa/payfort_response.phpkejkeoelleol';$signature = hash('sha256', $signature);$requestParams = array(    'access_code' => 'GD6GmQHCP0iYZW3Nz8FI' ,    'merchant_reference' => 'Test01003',    'merchant_identifier' => 'yhrReESE',    'signature' => $signature,    'command' => 'PURCHASE',    'amount' => '1000',    'currency' => 'SAR',    'language' => 'en',    'customer_email' => 'test@payfort.com',    'return_url' => 'http://lawm.sa/payfort_response.php');$redirectUrl = 'https://sbcheckout.payfort.com/FortAPI/paymentPage';echo "<html xmlns='http://www.w3.org/1999/xhtml'>\n<head></head>\n<body>\n";echo "<form action='$redirectUrl' method='post' name='frm'>\n";foreach ($requestParams as $a => $b) {    echo "\t<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>\n";}echo "\t<script type='text/javascript'>\n";echo "\t\tdocument.frm.submit();\n";echo "\t</script>\n";echo "</form>\n</body>\n</html>";function httpPost($url,$params){    $postData = '';    //create name value pairs seperated by &    foreach($params as $k => $v)    {        $postData .= $k . '='.$v.'&';    }    $postData = rtrim($postData, '&');    $ch = curl_init();    curl_setopt($ch,CURLOPT_URL,$url);    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);    curl_setopt($ch,CURLOPT_HEADER, false);    curl_setopt($ch, CURLOPT_POST, count($postData));    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    $output=curl_exec($ch);   /* echo '<pre>';    print_r($output); exit;*/    curl_close($ch);    return $output;}//error_reporting(E_ALL);//ini_set('display_errors', '1');$url = 'https://sbcheckout.payfort.com/FortAPI/paymentPage';$requestParams = array(    'access_code' => 's31bpM1ebfNnwqo' ,    'amount' => '1000',    'currency' => 'USD',    'customer_email' => 'test@payfort.com',    'merchant_reference' => 's2b3rj1vrjrhc1x',    'order_description' => 'Item',    'language' => 'en',    'merchant_identifier' => 'FD1Ptq',    'signature' => 'a9b02b3ebb8355d4444695a4c3f6be83d11328c9a2001fa528ab7210dc443333',    'merchant_identifier' => 'FD1Ptq',    'command' => 'AUTHORIZATION',);$result = httpPost($url,$requestParams);/*echo '<pre>';print_r($result);exit;*/$requestParams = array(    'access_code' => 'GD6GmQHCP0iYZW3Nz8FI' ,    'amount' => '1000',    'currency' => 'USD',    'customer_email' => 'test@payfort.com',    'merchant_reference' => '123456',    'order_description' => 'Item',    'language' => 'en',    'merchant_identifier' => 'yhrReESE',    'signature' => '7e35ab543fc7188f9919e9154264927e8d3f74d5ea23bb45adbe142ec21de216',    'command' => 'AUTHORIZATION',);$redirectUrl = 'https://sbcheckout.payfort.com/FortAPI/paymentPage';echo "<html xmlns='http://www.w3.org/1999/xhtml'>\n<head></head>\n<body>\n";echo "<form action='$redirectUrl' method='post' name='frm'>\n";foreach ($requestParams as $a => $b) {    echo "\t<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>\n";}echo "\t<script type='text/javascript'>\n";echo "\t\tdocument.frm.submit();\n";echo "\t</script>\n";echo "</form>\n</body>\n</html>";?>