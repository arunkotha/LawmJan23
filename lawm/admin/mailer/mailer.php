<?php
//error_reporting(E_ALL);
function sendmail($toid,$subject,$message)
{
    include_once('class.phpmailer.php');
    $mail    = new PHPMailer();
    $mail->IsHTML(true);
    $mail->IsSMTP();
    
    //$mail->Host = 'smtp.googlemail.com'; 
    $mail->Host = "p3plcpnl0155.prod.phx3.secureserver.net";
    $mail->Port = 465;
    //$mail->SMTPDebug=true; 
 

    $fromid=SMTP_EMAIL;
    $password=SMTP_PASSWORD;
    /*$fromid='app.mazic@gmail.com';
    $password='app_mazic.';*/
    //$subject = eregi_replace("[\]",'',$subject);

    $subject = preg_replace("[ \ ]","",$subject);
    $mail->From     = $fromid;
    $mail->Username     = $fromid;
    $mail->Password = $password;
    $mail->AddReplyTo($fromid);
    $mail->Subject = $subject;
    $mail->Body=$message;
    if(is_array($toid))
    {
        for($to=0;$to<sizeof($toid);$to++)
        {
            $mail->AddAddress($toid[$to]);
        }
    }
    else
        $mail->AddAddress($toid);


    if(!$mail->Send())
    {
        //echo 'Failed to send mail';
        return 0;
    }
    else
    {
        //echo 'Mail sent';
        return 1;
    }
    //echo "$fromid,$toid,$subject,$message"; exit;
    //include_once('class.pop3.php');
    //$mail    = new PHPMailer();
}



?>
