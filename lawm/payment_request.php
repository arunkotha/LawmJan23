<?php
$signature = 'kejkeoelleolaccess_code=GD6GmQHCP0iYZW3Nz8FIamount=1000command=PURCHASEcurrency=SARcustomer_email=test@payfort.comlanguage=enmerchant_identifier=yhrReESEmerchant_reference=Test01003return_url=http://lawm.sa/payment_response.phpkejkeoelleol';
$signature = hash('sha256', $signature);
$requestParams = array(
    'access_code' => 'GD6GmQHCP0iYZW3Nz8FI' ,
    'merchant_reference' => 'Test01003',
    'merchant_identifier' => 'yhrReESE',
    'signature' => $signature,
    'command' => 'PURCHASE',
    'amount' => '1000',
    'currency' => 'SAR',
    'language' => 'en',
    'customer_email' => 'test@payfort.com',
    'return_url' => 'http://lawm.sa/payment_response.php'
);

$redirectUrl = 'https://sbcheckout.payfort.com/FortAPI/paymentPage';
echo "<html xmlns='http://www.w3.org/1999/xhtml'>\n<head></head>\n<body>\n";
echo "<form action='$redirectUrl' method='post' name='frm'>\n";
foreach ($requestParams as $a => $b) {
    echo "\t<input type='hidden' name='".htmlentities($a)."' value='".htmlentities($b)."'>\n";
}
echo "\t<script type='text/javascript'>\n";
echo "\t\tdocument.frm.submit();\n";
echo "\t</script>\n";
echo "</form>\n</body>\n</html>";

?>
