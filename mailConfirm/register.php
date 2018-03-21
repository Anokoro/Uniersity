<?php
session_start();
include_once "../common/connectDB.php";
function check_level($password){
    $have_ch = 0;
    $have_num = 0;
    $have_CH = 0;
    for($i = 0;$i <= strlen($password);$i++){
        if($password[$i] >='a' && $password[$i] <='z')
            $have_ch = 1;
        else if ($password[$i] >='A' && $password[$i] <='Z')
            $have_CH = 1;
        else if($password[$i] >='0' && $password[$i] <='9')
            $have_num = 1;
    }
    $level = $have_ch + $have_num + $have_CH;
    return $level;
}

@$username = check_input($db,$_POST["username"]);
@$password = check_input($db,$_POST["password"]);
$confirm = check_input($db,$_POST["confirm"]);
$name = check_input($db,$_POST["name"]);
$gender = check_input($db,$_POST["gender"]);
$age = check_input($db,$_POST["age"]);
$nation=check_input($db,$_POST["nation"]);
$phone = check_input($db,$_POST["phone"]);
@$email = check_input($db,$_POST["email"]);
@$register = check_input($db,$_POST["register"]);
$regtime = time();

$token = md5($username . $password . $regtime); //
$regtime =date('y-m-d h:i:s',$regtime);
echo $regtime;
$token_exptime =date('y-m-d h:i:s', $token_exptime); //30min
@$regist_success =false;
$sq = "select * from accounts where username = '$username'";
$result = mysqli_query($db,$sq);
if($result->num_rows == 0) { //งา
    if ($confirm == $password) {
        $level = check_level($password);
        if ($level == 3) {
            $password = md5($password);
            #$sq = "insert into accounts(username,password,token,token_exptime,regtime,tag)
            #            values('$username','$password','$token','$token_exptime','$regtime','3')";
            $sq = "select addUserAccounts($username,$password)";
            $result1 = mysqli_query($db, $sq);
            $sq = "select UID from accounts where username= '$username'";
            $UID = mysqli_fetch_assoc(mysqli_query($db, $sq))[0];
            echo "UID:".$UID;
            $sq = "select addUserInfo($UID,$name,$gender,$age,$nation,$phone,$email)";
            $result2 = mysqli_query($db, $sq);
            echo "add Accounts :".$result1." add Info:".$result2;
            $regist_success = $result1 and $result2;
            if ($regist_success) {
                echo "register done";
                //include_once "smtp.class.php";
                //require_once "sendMail.php";
                header("location:../accounts.php?op=login");
            }
        } else echo "<script type='text/javascript'>alert('low level');</script>";
    } else echo "<script type='text/javascript'>alert('password different');</script>";
} else echo "<script type='text/javascript'>alert('user existed');</script>";

?>