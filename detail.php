<?php
include_once "common/header.php";
?>
<div class="box col-md-4">
    <div class="box-inner">
        <div class="box-header well-lg">
            <h2><i class="glyphicon glyphicon-list"></i>Detail</h2>
        </div>
        <div class="box-content">
            <ul class="dashboard-list">
                <?php
                $user = $_SESSION['user'];
                $t_name = $_SESSION['table'];
                if(isset($_GET["pk_value"])) {
                    switch ($t_name){
                        case "userInfo":
                            $_SESSION['pk']="UID";
                            break;
                        case "assistInfo":
                            $_SESSION['pk']="AID";
                            break;
                        case "service":
                            $_SESSION['pk']="SID";
                            break;
                    }
                    $_SESSION["pk_value"]=$_GET["pk_value"];
                }
                $sq = "select * from $t_name where ".$_SESSION["pk"]."=".$_GET["pk_value"];
                $Info = mysqli_fetch_array(mysqli_query($db,$sq));

                $attrs_name=select_filed_name($db,$t_name);
                echo "<li ><a><span class='blue'></span><img src=".$Info['photo']." class='img-rounded' width='100' height='100'></a></li>";
                for($i=0;$i<count($attrs_name);$i++){
                    if($attrs_name[$i] == 'photo')
                        continue;
                    else
                        echo "<li><a><span class='blue'>$attrs_name[$i]</span>". $Info[$attrs_name[$i]]."</a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <hr>

    <?php
    if($_GET["id"]) {
        echo "<a class=\" btn btn-block\" href='update_db.php'>Update</a>";
    }
    echo "<a class=\" btn btn-primary\" href=".$_SESSION["file"].">back</a>";
    if($t_name == "service" || $t_name == "userInfo" || $t_name =="assistInfo") {
        echo "<form class='form-group-sm' method='post' action='common/uploadPhoto.php' enctype='multipart/form-data' accept='image/jpeg,image/jpg,image/png'>
            <input type='file' name='photo'>
            <input type='hidden' name='action' value='upload'>
            <input type='submit' class='ajax-link btn btn-primary' value='upload'> 
        </form>";
    }
    ?>
</div>
<?php require 'common/footer.php'?>
