<?php

  

    include "../class/DBCon.class.php";

    session_start();

    if($_SESSION["admin"] !='ok'){
        echo "<script>alert('你还没有登录，请先登录！'); location.href='../login.php'; </script>";
    }

    $db = new DBCon;
    $addItem = $_POST["addItem"];
    if($addItem != null){
        $sql = "insert into vote(item,count) values('{$addItem}',0)";
        echo $sql;
        $rs = $db->executeUpdate($sql);
        if($rs){
            echo "<script>alert('项目添加成功！'); location.href='./index.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加项目</title>
    <link rel="stylesheet" href="https://public.acxjz.cn/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(http://public.acxjz.cn/img/bg_03.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body class="bg-light ">
    <div class="container shadow-lg bg-light" style="margin-top: 30px;">
        <div class="row pt-3">
            <div class="col-sm-6  offset-sm-1">
                <h2 class="text-danger bg-warning border rounded-start rounded-pill text-center p-3">添加投票项目</h2>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-sm-6 offset-sm-3">
                <form action="./add.php" method="POST">
                    <div class="form-group text-center">
                        <label for="addItem" class="my-1 fw-bolder text-danger ">请输入添加的项目名称</label>
                        <input id="addItem" type="text" class=" form-control" name="addItem" placeholder="项目名称">
                    </div>
                    <div class="form-group my-3">
                        <a href="./index.php" class="btn btn-success m-3 float-end">返回</a>
                        <input class="btn btn-secondary m-3 float-end" type="submit" value="提交">
                    </div>
                </form>
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