<?php
session_start();
$op=$_GET["op"];
$url = $_SERVER['PHP_SELF'];
# $arr = explode( '/' , $url );
# $filename= $arr[count($arr)-1];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Accounts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='css/animate.min.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
<?php
if ($op=="" or $op=="regist") {
    ?>
<h1 align="center">Regist</h1>
<div class="row">
    <div class="well col-md-5 center login-box">
        <div class="alert alert-info">
            Regist
        </div>
        <form class="form-horizontal" name="regist" action="mailConfirm/register.php" method="post"
             style="filter:alpha(opacity=60);">
            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <input name="username" required="required" type="text" class="form-control"
                       placeholder="Username">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                <input name="password" required="required" type="password" class="form-control" minlength="7"
                       placeholder="Password">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                <input name="confirm" required="required" type="password" class="form-control" minlength="7"
                       placeholder="Confirm">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-edit red"></i></span>
                <input name="name" required="required" type="text" class="form-control" placeholder="name">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <select name="gender" class="form-control">
                    <option>male</option>
                    <option>female</option>
                </select>
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-edit red"></i></span>
                <input name="age" required="required" type="number" class="form-control" placeholder="age">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                <select name="nation" class="form-control">
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option>??</option>                    <option></option>
                    <option></option>                    <option></option>
                    <option>??	</option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>
                    <option></option>                    <option></option>


                </select>
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-transfer red"></i></span>
                <input name="email" required="required" type="email" class="form-control" placeholder="email">
            </div>
            <br>

            <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone red"></i></span>
                <input name="phone" required="required" type="number" class="form-control" maxlength="11" minlength="11"
                       placeholder="phone">
            </div>
            <br>

            <input style="width:45%;box-sizing:border-box;"
                   name="regist" type="submit" value="submit" class="btn btn-primary">
            <input style="width:45%;box-sizing:border-box;"
                   name="reset" type="reset" value="reset" class="btn btn-primary"><br><br>
            </form>
            <a href=<?php echo $url . "?op=login"; ?>>login</a><br>
        </div><!--/row-->
    </div>
    <?php
    }
    elseif ($op=="login") {
        $_SESSION["user"]=null; # 
        $_SESSION["password"]=null;
        ?>
        <div class="row">
            <h1 align="center">Login</h1>
            <div class="row">
                <div class="well col-md-5 center login-box">
                    <div class="alert alert-info">
                        Login
                    </div>
                    <form class="form-horizontal" action="check.php?op=login" method="post">
                        <fieldset>
                            <input class="hidden" name="op" value="login">
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                <input name="username" type="text" class="form-control" placeholder="Username">
                            </div>
                            <br>

                            <div class="input-group input-group-lg">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>

                            <input style="width:45%;box-sizing:border-box;"
                                   name="login" type="submit" value="login" class="btn btn-primary">

                            <input style="width:45%;box-sizing:border-box;"
                                   name="reset" type="reset" value="reset" class="btn btn-primary"><br><br>
                            <a href=<?php echo $url . "?op=regist"; ?>>regist!</a>
                            <a href=<?php echo $url . "?op=modify"; ?>>modify</a><br>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    elseif ($op=="modify"){
        ?>
        <h1 align="center">Modify</h1>
        <div class="row">
            <div class="well col-md-5 center login-box">
                <div class="alert alert-info">
                </div>
                <form class="form-horizontal" name="modify" action="check.php?op=modify" method="post"
                      style="filter:alpha(opacity=60);">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input name="username" required="required" type="text" class="form-control" placeholder="Username">
                    </div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input name="old_password" required="required" type="password" class="form-control"  placeholder="old Password">
                    </div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock green"></i></span>
                        <input name="new_password" required="required" type="password" class="form-control" minlength="7" placeholder="new Password">
                    </div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock green"></i></span>
                        <input name="confirm_new" required="required" type="password" class="form-control" minlength="7" placeholder="new Password">
                    </div>
                    <input style="width:45%;box-sizing:border-box;"
                           name="modify" type="submit" value="submit" class="btn btn-primary">
                    <input style="width:45%;box-sizing:border-box;"
                           name="reset" type="reset" value="reset" class="btn btn-primary"><br><br>

                </form>
                <a href="<?php echo $url."?op=login";?>">Login;</a>
                <a href="<?php echo $url."?op=regist";?>">Regist</a>
            </div><!--/row-->
        </div>
<?php
    }
?>
</body>
</html>


