<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        ===
        This comment should NOT be removed.

        Charisma v2.0.0

        Copyright 2012-2014 Muhammad Usman
        Licensed under the Apache License v2.0
        http://www.apache.org/licenses/LICENSE-2.0

        http://usman.it
        http://twitter.com/halalit_usman
        ===
    -->
    <meta charset="utf-8">
    <title>Datatrans</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $("#file").change(function(){  //  id  file 
            var fileSize = this.files[0].size;
            var size = fileSize / 1024 / 1024;
            if (size > 5) {
                alert("5M,");
                this.value="";
                return false;
            }else{
                $("#file_name").val($("#file").val());  // #file  #file_name
            }
        })
    });

    </script>
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <style type="text/css">
        table td {
            vertical-align: middle !important;
            text-align: center; 
        }
        #file_name{
            width: 400px;
            height: 30px;
        }
        a.input {
            width:70px;
            height:30px;
            line-height:30px;
            background:#3091d1;
            text-align:center;
            display:inline-block;/*D */
            overflow:hidden;/**/
            position:relative;/* #file */
            top:10px;
        }
        a.input:hover {
          background:#31b0d5;
          color: #ffffff;
        }
    </style>

</head>

<body>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php?admin=<?php echo $_GET["admin"];?>"> 
                <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>Data Transform Center</a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> 
					<?php echo $_GET["admin"];?>
					</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Information</a></li>
                    <li class="divider"></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Dashboard</li>
						<li class="accordion">
                            <a href="#?admin=<?php echo $_GET["admin"];?>"><i class="glyphicon glyphicon-th-list"></i><span> Filelist</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="users.php?admin=<?php echo $_GET["admin"];?>">Read Only</a></li>
                                <li><a href="microposts.php?admin=<?php echo $_GET["admin"];?>">Read-Write</a></li>
								<li><a href="relationships.php?admin=<?php echo $_GET["admin"];?>">Group</a></li>
                            </ul>
                        </li>
                        <li><a href="login.html">
                        	<i class="glyphicon glyphicon-lock"></i><span> Login-Intranet</span></a>
                        </li>
                        <li><a href="Regist.html">
                            <i class="glyphicon glyphicon-edit"></i><span> Regist</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
<!-- left menu ends -->
    

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    <li>
                        <a href="index.php?admin=<?php echo $_GET["admin"];?>">Home</a>
                    </li>
                    <li>
                        <a href="relationships.php?admin=<?php echo $_GET["admin"];?>">file_list</a>
                    </li>
                </ul>
            </div>

        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-user"></i> file_list</h2>
                        <div class="box-icon">
                            <a href="#?admin=<?php echo $_GET["admin"];?>" class="btn btn-setting btn-round btn-default"><i     class="glyphicon glyphicon-cog"></i></a>
                            <a href="#?admin=<?php echo $_GET["admin"];?>" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#?admin=<?php echo $_GET["admin"];?>" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="container">
                        <form  target="upload_file" method="post" enctype="multipart/form-data">
                            <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">file</span>
                                <input type="text"  id="file_name" class="form-control" readonly="readonly" placeholder="choose file" aria-describedby="basic-addon1">
                                <a href="javascript:void(0);" class="btn btn-primary btn-sm">
                                    <i class="glyphicon glyphicon-cloud-upload"></i> &nbsp;&nbsp;Upload
                                </a>
                            </div>
                            <input type="file" id="file" name="file[]" style="display:none" required="required" multiple="multiple">
                        </form>
                    </div>
                <div class="box-content">
                <table class="table table-hover">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <tr>
                            <td text-align="center" width="10">#</td>
                            <td text-align="center" width="10">file name</td>
                            <td text-align="center">operate</td>
                        </tr>
                    </div>
                
                    <?php 
                        #   
                        #$db = @mysqli_connect('localhost', 'root','YQZ@0@0@0')//@ //
                        #or die("<br>");//die
                        #mysqli_select_db($db,'dataTrans'); //
                        #$sq = "select count(*) from relationships";
                    ?>
                    <div class="panel-body">
	                <?php
                        // 
	             	$floder = array("\/NAS\/6-DBSACN.rar","\/NAS\/6-DBSACN.pptx","\/NAS\/zxb\/6-DBSACN.pptx","\/NAS\/test.file");
                        $file_floder_nums = count($floder);
                        // 
	             	for($x=0; $x<$file_floder_nums; $x++){
                            $token = strtok($floder[x], "\/");
                
                        ?>
                                <tr>
                                    <td align="center" width="10"><?php echo $row["nas_id"] ?></td>
                                    <td align="center"><?php echo $row["file_name"] ?></td>
                                    <td align="center" width="100"> 
                                        <a class="btn btn-success" href="details.php?id=<?php echo $row['id'];?>&table=3&op=1 ">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>Download</a>
                	   			    <a class="btn btn-danger " href="update_db.php?id=<?php echo $row['id'];?>&table=3&op=2">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>&nbsp;&nbsp;Delete&nbsp;&nbsp;</a>
                                    </td>
                            </tr>
                    </div>
                </div>
	   	       <?php
                        }
	   	       	if ($page != 1) { //1
	   	       ?>
	   	       	<a href="#?page=<?php echo $page - 1;?>"></a> <!---->
	   	       <?php
	   	       	}
	   	       	for ($i=1;$i<=$totalPage;$i++) {  //
	   	       ?>
	   	       
	   	       	<a href="#?page=<?php echo $i;?>"><?php echo $i." ";?></a>
	   	       <?php
	   	       	}
	   	       	if ($page<$totalPage) { //page,
	   	       ?>
	   	       	<a href="#?page=<?php echo $page + 1;?>"></a>
	   	       <?php
	   	       } 
	   	        mysqli_close($db);
	           ?>
                
                </table>

                </div>
            </div>
        </div>
    </div>
    <hr>
    <footer class="row">
		<p align="right"calss="col-md-3 col-sm-3 col-xs-12 powered-by">&copy;Created by Kuro & Anokoro</p>
    </footer>
</div><!--/.fluid-container-->
        
<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>
