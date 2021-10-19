<?php
    include "../class/DBCon.class.php";

    session_start();

    if($_SESSION["admin"] !='ok'){
        echo "<script>alert('你还没有登录，请先登录！'); location.href='../login.php'; </script>";
    }

    $db = new DBCon;
    $sql_02 = "select count(*) from vote;";
    $rows_02 = $db->executeQuery($sql_02);
  
    $count = $rows_02[0]["count(*)"];


    $currPage = $_GET["currPage"];
    $prePage = $_GET["prePage"];
    $nextPage = $_GET["nextPage"];


    $sumRows = $count;
    $sumPages = ceil($sumRows/5);

    if($currPage == null && $prePage == null && $nextPage == null){
        $currPage=1;
    }

    if($prePage != null){
        $currPage--;
        if($currPage<1){
            $currPage=1;
        }
    }

    if($nextPage != null){
        $currPage++;
        if($currPage>$sumPages){
            $currPage=$sumPages;
        }
    }
    $limitStart=($currPage-1)*5;

    $sql_01 = "select * from vote order by id asc limit {$limitStart},5";
    $rows_01 = $db->executeQuery($sql_01);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员后台</title>
    <link rel="stylesheet" href="https://public.acxjz.cn/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(http://public.acxjz.cn/img/bg_03.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>


<body class="bg-light">
<div class="container bg-light shadow-lg">
    <div class="row pt-3" style="margin-top: 30px;">
        <div class="col-sm-6 pt-3 offset-sm-1">
            <div class="bg-warning rounded-start rounded-pill">
                <h3 class='text-center text-danger p-3'>投票项目管理</h3>
            </div>
        </div>
        <div class="col col-sm-2 offset-sm-2">
            <div class="btn-group">
                <a href="../index.php" class="btn btn-danger me-1">返回首页</a>
                <a href="./logout.php" class="btn btn-success ">退出后台</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-1">
            <a href="./add.php"  class="btn btn-secondary mt-3 btn-lg align-self-end">添加项目</a>
        </div>
        <div class="col-sm-3 offset-sm-1 float-end">
            <p class="mt-3">本站共有 <mark> <b> <?php
                echo $count;
            ?> </b> </mark> 条数据</p>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-10 offset-sm-1">
            <table class="table text-center align-middle table-border table-bordered table-striped ">
                <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>书名</th>
                    <th>投票数</th>
                    <th>删除</th>
                    <th>修改</th>
                </tr>
                </thead>
                <tbody>

                <?php
                    foreach($rows_01 as $row){
                        echo("<tr>");
                        echo("<td>".$row["id"]."</td>");
                        echo("<td>".$row["item"]."</td>");
                        echo("<td>".$row["count"]."</td>");
                        echo("<td><a href='./delete.php?id=".$row["id"]."' class='btn btn-danger' >删除</a>");
                        echo("<td><a href='./modify.php?id=".$row["id"]."' class='btn btn-primary' >修改</a>");
                        echo("</tr>");
                    }
                ?>

                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="./index.php?currPage=1">
                    << </a>
                </li>
                <li class="page-item"><a class="page-link" href="./index.php?prePage=1&currPage=<?php echo $currPage; ?>">
                    < </a>
                </li>
                <?php
                    for ($i = 1; $i <= $sumPages; $i++) {
                        if ($i == $currPage) {
                            echo "<li class='page-item active'><a class='page-link' href='./index.php?currPage=".$i."'>".$i."</a></li>";
                        } else {
                            echo "<li class='page-item '><a class='page-link' href='./index.php?currPage=".$i."'>".$i."</a></li>";
                        }
                    }
                ?>
                <li class="page-item"><a class="page-link" href="./index.php?nextPage=1&currPage=<?php echo $currPage; ?>"> > </a></li>
                <li class="page-item"><a class="page-link" href="./index.php?currPage=<?php echo $sumPages; ?>"> >> </a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
            <footer class="mt-5 mb-3 text-muted text-center">
                Copyright &copy; 2021 by 爱吃小橘子
            </footer>
        </div>
    </div>
</div>
</body>
</html>