<?php
    session_start();
    include_once "common/connectDB.php";
    echo "checking";
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>checking</title>
    </head>
    <body>
    <?php
        @$username = check_input($db,$_POST["username"]);
        @$op = check_input($db,$_GET["op"]);
        echo $op;
        @$login_success = false;

        if($op=="login") {
            @$password = check_input($db,$_POST["password"]);
            $sq = "select * from accounts where username='$username'";
            $result = mysqli_query($db, $sq);
            echo 'here1';
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_array($result);
                if ($row["password"] == md5($password)) {
                    $login_success = true;
                    $_SESSION["user"]=$username;
                    $_SESSION["password"]=$password;
                    if ($row["loginTimes"] == 0) //First time login.
                        header("location:accounts.php?op=modify");
                    else{
                        $_SESSION['role']=$row["role"];
                        header("location:index.php");
                    }
                    $sq = "select updateLogin($username)";
                    mysqli_query($db, $sq);
                } else echo "<script type='text/javascript'>alert('wrong password');</script>";
            } else echo "<script type='text/javascript'>alert('no user');</script>";
            //if ($login_success == false)
                //header("location:login_error.html");
        }
        elseif($op=="modify") {
            $old_password = check_input($db,$_POST["old_password"]);
            $new_password = check_input($db,$_POST["new_password"]);
            $confirm_new = check_input($db,$_POST["confirm_new"]);
            echo $new_password, "<br>", $confirm_new;
            $sq = "select * from accounts where username='$username'";
            $result = mysqli_query($db, $sq);
            if ($result > 0) {
                $row = mysqli_fetch_array($result);
                if ($row["password"] == md5($old_password)) {
                    if ($new_password == $confirm_new) {
                        if (check_level($new_password) == 3) {
                            header("location:accounts.php?op=login");
                            $new_password = md5($new_password);
                            $sq = "select updatePassword($username,$new_password)";
                            $result = mysqli_query($db, $sq);
                        } else echo "<script type='text/javascript'>alert('low level');</script>";
                    } else echo "<script type='text/javascript'>alert('password different');</script>";
                } else echo "<script type='text/javascript'>alert('wrong old password');</script>";
            } else echo "<script type='text/javascript'>alert('not exists');</script>";
        }

        mysqli_close($db);
    ?>
   
</body>
</html>
