<?php
session_start();
include_once "common/connectDB.php";
$t_name =  strpos($_SESSION["table"],'accounts')? "accounts":$_SESSION["table"];
# strpos 
if($_SESSION['user']=="root")
    header("location:SysDB.php");
else {
    $id = $_GET["id"]; //
    $pk = $_SESSION["pk"];//get
    $op = $_GET["op"]; // 
    header("location:SysDB.php");
    /*$sq = "select * from $t_name where $pk=$id";
    $result = mysqli_query($db, $sq);
    $rs = mysqli_fetch_array($result);
    $username = $rs['username'];*/
    $username=$_SESSION['user'];
    if ($op == "reset") { // 
        $password = md5("123456"); //
        $result = mysqli_query($db, "select resetAccounts($id,$password)");
    }
    if ($op == "delete") {// 
        if ($t_name == "accounts") {
            # 
            mysqli_query($db, "select deleteUser($username)");
        }
    }
}
mysqli_close($db);
?>