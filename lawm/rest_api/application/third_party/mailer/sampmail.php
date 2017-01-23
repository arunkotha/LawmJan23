<?php
include('mailer.php');
$to="manikanta.b@thresholdsoft.com";
$subject="hi manikanta how r u";
$msg="hi this is sample email from php1";
$from="manikanta.b@thresholdsoft.com";
$res=sendmail($from,$to,$subject,$msg);
echo $res; 
?>
