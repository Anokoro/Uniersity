

<!--  per page & search begin -->
<div class="row">
    <div class="col-md-6">
        <div id="DataTables_Table_0_length" class="dataTables_length">
            <label><select size="1" name="DataTables_Table_0_length" aria-controls="DataTables_Table_0">
                    <option value="10" selected="selected">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> records per page
            </label>
        </div>
    </div>
    <div class="col-md-6"><div class="dataTables_filter" id="DataTables_Table_0_filter">
            <label>Search: <input type="text" aria-controls="DataTables_Table_0">
            </label>
        </div>
    </div>
</div>
<!--  per page & search end -->
<!-- page row start -->
<div class="row">
    <div class="col-md-12">
        <div class="dataTables_info" id="DataTables_Table_0_info">Showing 1 to 10 of <?php echo $totalRecords=count_num($db,$t_name);?> entries
        </div>
    </div>
    <div class="col-md-12 center-block">
        <div class="dataTables_paginate paging_bootstrap pagination">
            <ul class="pagination pagination-centered">
                <?php
                $perPage=$_SESSION["perPage"]?$_SESSION["perPage"]:10; # 

                $nowpage=$_GET["page"]?$_GET["page"]:1; #
                $totalRecords=100;
                $totalPage=ceil($totalRecords/$perPage); //
                $startCount=($nowpage - 1) * $perPage; //,

                if ($nowpage != 1)
                    echo "<li><a class='prev' href='$self_url?page=".($nowpage-1)."'> Prev</a></li>";
                for ($i=1;$i<= $totalPage;$i++) {
                    if($i == $nowpage)
                        echo "<li class='active'><a href=$self_url?page=$i>$i</a></li>";
                    else
                        echo "<li class='next'><a href='$self_url?page=$i'>$i</a></li>";
                }
                if ($nowpage<$totalPage)
                    echo "<li><a href='$self_url?page=".($nowpage+1)."'>Next </a></li><br><br>";

                ?>
            </ul>
        </div>

    </div>
</div>
<!-- page row end -->
