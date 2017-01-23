<?php
include('mailer.php');
$to="bhasha.s@thresholdsoft.com";
$subject="hi manikanta how r u";
$msg="hi this is sample email from php1";
$from="bhasha.s@thresholdsoft.com";
$res=sendmail($from,$to,$subject,$msg);
echo $res; 
?>
