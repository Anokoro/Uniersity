<?php include_once "common/header.php";?>
<?php
$_SESSION["file"]=get_file_name($self_url = $_SERVER['PHP_SELF']);
$_SESSION["table"] = isset($_GET["table"])?$_GET["table"]:$_SESSION["table"];
$t_name = $_SESSION["table"];

$_SESSION["perPage"]=isset($_POST["perPage"])?$_POST["perPage"]:(isset($_SESSION["perPage"])?$_SESSION["perPage"]:10);
?>
<div>
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li><a href="#"><?php  echo $t_name;?></a></li>
    </ul>
</div>

<?php
$_SESSION['attrs']='*';
require ('common/table.php');
?>
<?php require ('common/footer.php'); ?>
