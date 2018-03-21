<?php
    $host="localhost";
    if(1) { // 
        $db_user = "";//
        $db_pass = "";//
    }
    if(0){ //
        $db_user = $_SESSION['user'];//
        $db_pass = $_SESSION['password'];//
    }
    $db_name="service_center";//

    $db = @mysqli_connect($host, $db_user, $db_pass, $db_name)
        or die("connect error: " . mysqli_connect_error());
    mysqli_query("SET names UTF8");
    echo "connected";
    $_SESSION["DB"] = $db;
?>
