<?php
/**
 * Created by PhpStorm.
 * User: 15801
 * Date: 2018/2/28
 * Time: 20:28
 */
session_start();
include_once "common/header.php";
$filename = get_file_name($_SERVER["PHP_SELF"]);

if(isset($_GET['service'])) {
    $serviceName = $_GET["service"];
    if (isset($_GET['server'])) {
        $userName = $_SESSION["user"];
        $userName = "name111";
        $serverName = $_GET["server"];
        $time = date("Y-m-d H:i:s");
        $sq = "select addOrder('$userName','$serverName','$serviceName','$time')";
        mysqli_query($db, $sq) or die ("Error:".mysqli_error());
        header("location:order.php");
        echo "<script type='application/javascript'>alert('order success');</script>";
        mysqli_query($db,"call viewOrder('$userName')") or die ("Error:".mysqli_error());
        showOneDataAsTable($db,"orderList");
        $orderSuccess=true;

    }
}
?>

<?php
if(!$orderSuccess) {
    $sq = "SELECT * FROM service";
    $result = mysqli_query($db, $sq);
    while ($ServiceInfo = mysqli_fetch_array($result)) {
        $service = $ServiceInfo['name'];
        if (isset($_GET["service"]))
            if ($serviceName != $service)
                continue;
        echo "<div class='panel panel-default col-sm-3'>
    <div class='panel-heading'>
        <h3 class='panel-title center-block'>$service</h3>
    </div>
    <div class='panel-body'>
        
    </div>
    <table class='table'>
        <tr ><td colspan='2'> <img src='" . $ServiceInfo['photo'] . " 'class='img-rounded center'width =100 height=100 '></td></tr>
        <tr><td>Time           </td><td>7*24h</td></tr>
        <tr><td>Duration      </td><td>" . $ServiceInfo['duration'] . "</td></tr>
        <tr><td>Price          </td><td>" . $ServiceInfo['price'] . "</td></tr>
        <tr ><td colspan='2'>" . $ServiceInfo['description'] . "</td></tr>
        ";
        if ($serviceName == $service) {
            if (!mysqli_query($db, "call getServer('$serviceName')"))
                echo mysqli_error($db);

            $serverList = mysqli_query($db, "SELECT * FROM serverList");
            $attrs = select_filed_name($db, 'serverList');
            echo "<tr>";
            for ($i = 0; $i < count($attrs); $i++)
                echo "<td class='h4'>" . $attrs[$i] . "</td>";
            echo "</tr>";
            while ($one_server = mysqli_fetch_array($serverList)) {
                echo "<tr><td>" . $one_server['name'] . "</td>
                      <td>" . $one_server['level'] . "</td>
                      <td>" . $one_server['avgscore'] . "</td>
                  <tr>
                <tr><td colspan='3'><a class='btn btn-success' href='$filename?service=$service&server=" . $one_server['name'] . "'>Order</a></td></tr>";
            }
            echo "
    </table>
    <ul class='list-group'>
        <li class='list-group-item center-block'><a class='btn btn-primary' href='$filename'>Back</a></li>
    </ul>
</div>";
            break;
        }
        echo "
    </table>
    <ul class='list-group'>
        <li class='list-group-item center-block'><a class='btn btn-primary' href='" . $_SERVER['PHP_SELF'] . "?service=$service'>Detail</a></li>
    </ul>
</div>";

    }
}
?>

<?php require_once "common/footer.php";?>
