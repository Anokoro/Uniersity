<?php
include_once "common/header.php";
$t_name=$_SESSION['table'];
?>
    <script type="text/javascript">
        function changNum() {
            op = getElementByName("vehicle");
            document.write(op.value);
        }
    </script>
    <form action="#" method="post">
        <?php
        $attrs_name=select_filed_name($db,$t_name);
        for($i=0;$i<count($attrs_name);$i++){
            echo "<label class=\"checkbox-inline\"> 
                            <input type='checkbox' name='attrs[]' value='$attrs_name[$i]'>$attrs_name[$i] </label>";
        }
        ?>
        <input class="btn btn-md btn-default" type="submit" value="search">
        <input class="btn btn-md btn-default" type="reset" name="button" id="button" value="reset">
    </form>
<?php
$v=$_POST["attrs"];
$select_attrs = $_SESSION["pk"];
for ($i=0;$i<count($v);$i++)
    $select_attrs=$select_attrs.",".$v[$i];
$sq="select $select_attrs from $t_name";
$Info = mysqli_fetch_array(mysqli_query($db,$sq));
?>
<?php
$_SESSION['attrs']=$select_attrs;
echo $_SESSION['attrs'];
require ('common/table.php');
?>
<?php
require "common/footer.php";
?>


