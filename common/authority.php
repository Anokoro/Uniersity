<?php
/**
 * Created by PhpStorm.
 * User: 15801
 * Date: 2018/2/24
 * Time: 11:23
 */

if($_SESSION["user"]!="root") # ==
    return; # root
elseif(strpos($_SESSION["user"],"admin")==true) {
    # admin
    if ($_SESSION["table"] == "logs") {
        echo "<script type='text/javascript'>alert('root');</script>";
        exit('root');
    }
}

?>