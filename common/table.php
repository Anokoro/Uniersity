<?php session_start(); ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-th-list"></i>Table</h2>
            </div>
            <br>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <?php
                    /* make sql start */
                    if($_SESSION['role']=="Server"){
                        $condition_attr = $_SESSION['table']=="salary"||$_SESSION['table']=="records"?"AID":''; # ??
                        $condition_value= mysqli_fetch_array(mysqli_query($db,"select AID from assistInfo where username =".$_SESSION['user']))[0]; # ??
                    }
                    $attrs_name_all=select_filed_name($db,$t_name);
                    $condition_attr = $attrs_name_all[0]; # ??
                    switch ($_SESSION['role']){
                        case "Server":
                            $condition_value= mysqli_fetch_array(mysqli_query($db,"select AID from assistInfo where username =".$_SESSION['user']))[0]; # ??
                        default:
                            $condition_value = $condition_attr=1;
                    }
                    $sq = "select ". $_SESSION['attrs']." from $t_name where $condition_attr = $condition_value order by $condition_attr ASC";
                    $data_content=mysqli_query($db,$sq); //
                    /* make sql end */

                    echo "<tr>";
                    if($_SESSION['attrs']!='*')
                        $attrs_To_show = explode(',',$_SESSION['attrs']);
                    else{
                        $attrs_To_show = $attrs_name_all;
                    }

                    for($i=0;$i<count($attrs_To_show);$i++){
                        echo "<td class='center-text'><p>$attrs_To_show[$i]</p></td>";
                    }
                    if(count($attrs_To_show))
                        echo "<td class='center-text'><p>opration</p></td>";
                    echo "</tr>";
                    echo "</thead>";

                    while($row = mysqli_fetch_array($data_content)) {//??
                        echo "<tr>";
                        for($i=0;$i<count($attrs_To_show);$i++)
                            echo "<td class='center-text'>
                                      <p>" . $row[$i] . "</p>
                                  </td>";
                        echo "<td class='center-text'>";
                        if($_SESSION["table"] == "accounts")
                            echo" <a class='btn btn-success'href=\"update_db.php?pk_value=".$row[0]."&op=reset\">
                                    <i class='glyphicon glyphicon-edit icon-white'></i>Reset</a>";
                        elseif($_SESSION["table"] == "userInfo" || $_SESSION["table"] == "assistInfo" || $_SESSION["table"] == "service")
                            echo"<a class='btn btn-success' href='detail.php?pk_value=".$row[0]."'>
                                   <i class='glyphicon glyphicon-zoom-in icon-white'></i>View</a>";
                        echo" <a class='btn btn-danger'href=\"update_db.php?pk_value=\".$row[0].\"&op=delete\">
                                <i class='glyphicon glyphicon-trash icon-white'></i>Delete</a>";
                        echo "</td>
                               </tr>";
                    }
                    mysqli_close($db);
                    ?>
                </table>
            </div><!--box-content-->
        </div><!--box-inner-->
    </div>
</div>