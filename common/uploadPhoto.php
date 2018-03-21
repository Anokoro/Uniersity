<?php
/**
 * Created by PhpStorm.
 * User: 15801
 * Date: 2018/3/1
 * Time: 9:19
 */
session_start();


include_once "connectDB.php";
$t_name = $_SESSION["table"];
/**
 * @return string
 */
function upload()
{
    global $db,$t_name;
    #define('ROOT',dirname(__FILE__).'/');
    #echo ROOT;
    if($_FILES["photo"]["error"] > 0) {
        return "Error: " . $_FILES["photo"]["error"] . "<br />";
    }
    $filename = $_FILES["photo"]["name"];
    $type = $_FILES['photo']['type'];
    $size = $_FILES['photo']['size'];
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $extension = end(explode(".", $filename));
    #echo exec("whoami");
    #echo "$t_name<br>$filename<br>$type<br>$size<br>$extension ";
    if (($type == "image/jpeg" || $type == "image/jpg" || $type == "image/png")
        && $size < 1024 * 1024 && in_array($extension, $allowedExts)) {
        if ($_FILES["photo"]["error"] > 0)
            echo "Error" . $_FILES["photo"]["error"] . "<br>";
        elseif (!is_dir("../photos"))
            echo "the directory is not exists";
        else {
            $name = strpos($filename,".");
            $upload_path = "../photos/$name.$extension";
            $i=1;
            while (file_exists($upload_path)) { # 如果文件名重复，则设置不同的编号
                $upload_path ="../photos/$name$i.$extension";
                $i++;
            }
            echo "<br>tmp_name:".$_FILES["photo"]["tmp_name"]."<br>";
            if(is_uploaded_file($_FILES['photo']['tmp_name']))
                if(move_uploaded_file($_FILES["photo"]["tmp_name"], $upload_path)) {
                    echo "upload path: " . $upload_path;
                    echo $_SESSION['pk'].$_SESSION['pk_value'];
                    $sq = "update $t_name set photo='photos/" . $filename . "' where " . $_SESSION['pk'] . "=" . $_SESSION['pk_value'];
                    if (mysqli_query($db, $sq)) {
                        return "upload success";
                    }

                }
                else echo "error: file save error";
            else echo "error : no post";
        }
    }
    return "file wrong";
}

$action = $_POST["action"];
echo $action;
if($action == "upload") {
    echo upload();
}

?>
