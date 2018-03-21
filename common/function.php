<?php
/**
 * Created by PhpStorm.
 * User: 15801
 * Date: 2018/2/24
 * Time: 11:32
 */
session_start();
function get_file_name( $self_url )
{
    $arr = explode('/', $self_url);
    $filename = $arr[count($arr) - 1]; # filename,??
    return $filename;
}
function count_num($db,$table,$attr=1, $value=1,$condition = '=')
{
    $count = mysqli_query($db, "select count(*) from $table where $attr $condition $value");
    $total = mysqli_fetch_array($count)[0];
    return $total;
}

# 
function select_filed_name($db,$table){
    $select_attrs = "select * from $table"; #
    $attrs_name_array = array();
    if($attrs = mysqli_query($db,$select_attrs)){
        #$attrs_num = mysqli_num_fields($attrs);
        #echo "attrs_num:$attrs_num";
        $fields = mysqli_fetch_fields($attrs);
        foreach ($fields as $field) {
            array_push($attrs_name_array,$field->name);
        }
        mysqli_free_result($attrs);
    }
    $_SESSION["pk"]= $attrs_name_array[0];
    return $attrs_name_array;
}

function check_input($db,$value)
{
// ??
    if (get_magic_quotes_gpc())
    {
        $value = stripslashes($value);
    }
// 
    if (!is_numeric($value))
    {
        $value = "'" . mysqli_real_escape_string($db,$value) . "'";
    }
    return $value;
}
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
function showPhoto($db,$t_name,$pk,$pk_value)
{
    $photo = "select photo from $t_name where $pk=$pk_value";
    $photoPath = mysqli_fetch_array(mysqli_query($db,$photo))[0];
    if ($photoPath)
        echo "<img src='$photoPath' class='img-rounded' WIDTH='100' HEIGHT='100'>";
    else echo " Read photo wrong";
}
function showOneDataAsTable($db,$table){
    $attrs= select_filed_name($db,$table);
    echo "<table class='table'>
                <tr>";
    for($i=0;$i<count($attrs);$i++)
        echo "<td class='h4'>".$attrs[$i]."</td>";
    echo "</tr>";
    $sq = "select * from $table";
    $dataList = mysqli_query($db,$sq);
    while ($oneData = mysqli_fetch_array($dataList)) {
        echo "<tr>";
        for($i=0;$i<count($attrs);$i++)
            echo "<td>" . $oneData[$i] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>