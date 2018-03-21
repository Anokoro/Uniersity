<?php
/**
 * Created by PhpStorm.
 * User: 15801
 * Date: 2018/3/15
 * Time: 10:05
 */
include_once "common/header.php";

# 按照给定的标准统一修改工资
function changeSalary(){
    global $db;
    $standard = $_POST['standard'];
    $method = $_POST['method'];
    $base = $_POST['base']; # 如果选定时按照给定一个基准，则需要输入基准工资
    $more = $_POST['more']; # 比标准多的
    $less = $_POST['less']; # 比标准少的
    if($standard&&$method) {
        $sq = "select updateSalary($standard,$method,$base,$more,$less)";
        mysqli_query($db, $sq) or die(mysqli_error($db)); # 更新工资表
    }
}
if(isset($_GET["op"])){
    changeSalary();
}

# profile start

echo "<div class='box col-md-4'>
    <div class='box-inner'>
        <div class='box-header well' data-original-title='Salary Profile'>
            <h2><i class='glyphicon glyphicon-list'></i> Salary Profile</h2>
        </div>
        <div class='box-content'>";
if(!$salary_summary=mysqli_query($db,"select * from salary_summary"))
    echo mysqli_error();
else {
    $summary_data = mysqli_fetch_array($salary_summary);
    $attrs = select_filed_name($db, 'salary_summary');
    echo "<table>";
    for ($i = 0; $i < count($attrs); $i++) {
        echo "               
                    <tr>
                    <td>$attrs[$i]</td>
                    <td><span class='blue'>" . $summary_data[$attrs[$i]] . "</span></td>
                    </tr>
                ";
    }
    echo "</table>
            
        </div>
    </div>
</div>";
}
# profile end
?>
    <div class="box col-sm-4">
        <div class="box-inner">
            <div class='box-header well' data-original-title='Adjust'>
                <h2><i class='glyphicon glyphicon-list'></i> Adjust</h2>
            </div>
            <div class="box-content">
                <form role="form" action="#?op=update" method="post">
                    <label>To choose a standard</label>
                    <div class="radio">
                        <label><input type="radio" name="standard" value="average" checked>average salary</label>
                        <label><input type="radio" name="standard" value="standard">give a standard base</label>
                    </div>
                    <div class="number">
                        <label>Input the standard base:</label> <input type="number" name="base">
                    </div>
                    <label>To choose a method</label>
                    <div class="radio">
                        <label><input type="radio" name="method" value="rate">By rate</label>
                        <label><input type="radio" name="method" value="value" checked>By numerical value</label>
                    </div>
                    <div class="number">
                        <label>Input the value for more: </label><input type="number" name="more">
                    </div>
                    <div class="number">
                        <label>Input the value for less:</label> <input type="number" name="less">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php

require_once "common/footer.php"
?>