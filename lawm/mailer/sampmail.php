<?php
include('mailer.php');
$to="sthanka9@gmail.com";
$subject="hi hero, how r u";
$msg="hi this is sample email from php1";
$from="bhasha.s@thresholdsoft.com";
$res=sendmail($from,$to,$subject,$msg);
echo $res; 
?>
