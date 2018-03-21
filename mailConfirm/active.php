<?php

include_once("./connectDB.php");

$verify = stripslashes(trim($_GET['verify']));
$nowtime = time();

$query = mysql_query("select id,token_exptime from accounts where status='0' and token='$verify'");
$row = mysql_fetch_array($query);
if ($row) {
    if ($nowtime > $row['token_exptime']) { //30min
        $msg = 'งนกค.';
    } else {
        mysql_query($db,"update accounts set status=1 where UID='$row['UID']'");
        if (mysql_affected_rows($link) != 1)
            die(0);
        $msg = '';
    }
}else {
    $msg = 'error.';
}

echo $msg;
?>
