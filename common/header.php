<?php
session_start();
include_once 'config.php';
include_once 'connectDB.php';
include_once 'authority.php';
include_once 'function.php';
include_once 'uploadPhoto.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['file']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <a class="navbar-brand" href="index.php"> <span>Service center</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo ($_SESSION['user'] ? $_SESSION['user']:($_SESSION['role']=='test'?'test': 'Not logged in'));?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="detail.php">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="accounts.php?op=login">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->


            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="#"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Dropdown <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->
<?php } ?>
<div class="ch-container">
    <div class="row">
        <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <!--<li><a class="ajax-link" href="../ui.php"><i class="glyphicon glyphicon-eye-open"></i><span> UI Features</span></a>
                        </li>
                        <li><a class="ajax-link" href="form.html"><i
                                        class="glyphicon glyphicon-edit"></i><span> Forms</span></a></li>-->
                        <?php
                        $_SESSION['role'] = 'test';
                        switch ($_SESSION['role']){
                            case 'test':
                            case 'Root':
                            case 'Admin':
                                ?>
                                <li class="accordion">
                                    <a href="#"><i class="glyphicon glyphicon-th-list"></i><span> System database</span></a>
                                    <ul class="nav nav-pills nav-stacked">
                                        <li><a class="ajax-link" href="SysDB.php?table=userInfo">Users</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=assistInfo">Servers</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=accounts">Accounts</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=service">Services</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=works">Work</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=salary">Salary</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=records">Records</a></li>
                                        <li><a class="ajax-link" href="SysDB.php?table=logs">Logs</a></li>
                                    </ul>
                                </li>
                                <li><a class="ajax-link" href="salary.php">
                                    <i class="glyphicon glyphicon-edit"></i><span> Salary Profile</a></li>
                            <?php
                                break;
                            case 'Server':
                                ?> <li class="accordion">
                                <a href="#"><i class="glyphicon glyphicon-th-list"></i><span> Personal database</span></a>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a class="ajax-link" href="SysDB.php?table=service">Services</a></li>
                                    <li><a class="ajax-link" href="SysDB.php?table=salary">Salary</a></li>
                                    <li><a class="ajax-link" href="SysDB.php?table=records">Records</a></li>
                                </ul>
                            </li><?php
                                break;
                            case 'User':
                            case 'Guest':
                            default:
                                ?>
                            <li><a class="ajax-link" href="SysDB.php?table=service">Services</a></li>
                            <?php
                        }
                        ?>
                        <li><a class="ajax-link" href="order.php">
                                <i class="glyphicon glyphicon-edit"></i><span> Order service</a></li>
                        <li><a class="ajax-link" href="select.php">
                                <i class="glyphicon glyphicon-search"></i><span> Select</span></a>
                        </li>
                        <!--<li><a class="ajax-link" href="../calendar.php"><i class="glyphicon glyphicon-calendar"></i><span> Calendar</span></a>
                        </li>-->
                        <li><a class="ajax-link" href="accounts.php?op=login"><i class="glyphicon glyphicon-lock"></i><span> Login Page</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php }
            ?>
