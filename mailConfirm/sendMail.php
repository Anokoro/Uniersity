<?php
	session_start();
	$filePath="192.168.70.30/dbDesign/";
    $smtpserver = "smtp.163.com"; //SMTP
    $smtpserverport = 25; //SMTP
    $smtpusermail = "15801755230@163.com"; //SMTP
    $smtpuser = "15801755230@163.com"; //SMTP
    $smtppass = "YQZ@0@0@0"; //SMTP
    $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //true,.
    $emailtype = "HTML"; //:textHTML
    $smtpemailto = $email;
    $smtpemailfrom = $smtpusermail;
    $emailsubject = "";
    $emailbody = "". $username . "<br/>��<br/><br/> <a href='$filePath/mailConfirm/active.php?verify=" . $token . "' target='_blank'>".$token."</a><br/>
    ��30min��<br/>��<br/>";
    $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
    if ($rs == 1) {
        echo "<script type='text/javascript'>alert('<br/>��');</script>";
    } else {
        echo "<script type='text/javascript'>alert('');</script>";
    }
?>