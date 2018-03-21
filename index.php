<?php
include_once "common/header.php";
?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-4">
        <a data-toggle="tooltip" title="Admin num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user red"></i>
            <div>Admin</div>
            <div>
                <?php
                echo mysqli_fetch_array(mysqli_query($db,"select num from everyRoleNum where role='Admin'"))[0];
                ?>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a data-toggle="tooltip" title="Server num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user green"></i>
            <div>Server</div>
            <div>
                <?php
                echo mysqli_fetch_array(mysqli_query($db,"select num from everyRoleNum where role='Server'"))[0];
                ?>
            </div>
        </a>
    </div>

    <div class="col-md-4">
        <a data-toggle="tooltip" title="Ordinary user num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>
            <div>Ordinary user</div>
            <div>
                <?php
                echo mysqli_fetch_array(mysqli_query($db,"select num from everyRoleNum where role='User'"))[0];
                ?>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a data-toggle="tooltip" title="Services num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-briefcase red"></i>
            <div>Services</div>
            <div>
                <?php
                echo count_num($db,'service');
                ?>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a data-toggle="tooltip" title="Server Records num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-comment green"></i>
            <div>Orders Unfinished</div>
            <div>
                <?php
                echo count_num($db,'orders');
                ?>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a data-toggle="tooltip" title="Server Records num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-comment green"></i>
            <div>Server Records</div>
            <div>
                <?php
                echo count_num($db,'records');
                ?>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a data-toggle="tooltip" title="System Logs num" class="well top-block" href="#">
            <i class="glyphicon glyphicon-file blue"></i>
            <div>System Logs</div>
            <div>
                <?php
                echo count_num($db,'logs');
                ?>
            </div>
        </a>
    </div>
</div>

<div class="box col-md-4">
    <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-list"></i> Weekly Stat</h2>
        </div>
        <div class="box-content">
            <ul class="dashboard-list">
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-arrow-up"></i>
                        <span class="green">92</span>
                        New Service Records
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-arrow-down"></i>
                        <span class="red">15</span>
                        New Registrations
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-minus"></i>
                        <span class="blue">36</span>
                        New Articles
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="glyphicon glyphicon-comment"></i>
                        <span class="yellow">45</span>
                        User reviews
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php  require_once  "common/footer.php";?>
