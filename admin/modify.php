<?php
    include "../class/DBCon.class.php";
   
    session_start();

    if($_SESSION["admin"] !='ok'){
        echo "<script>alert('你还没有登录，请先登录！'); location.href='../login.php'; </script>";
    }

    $db = new DBCon;

    $modifyItemID=$_GET["id"];
    $modifyItemName = $_GET["modifyItemName"];
    $modifyItemCount = $_GET["modifyItemCount"];
    
    if($modifyItemName != null && $modifyItemCount != null){
        $sql_01 = "update vote set item='{$modifyItemName}',count={$modifyItemCount} where id={$modifyItemID}";
        $rs = $db->executeUpdate($sql_01);
        if($rs){
            echo "<script>alert('项目修改成功！'); location.href='./index.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改项目</title>

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
    <div class="container bg-light shadow-lg" style="margin-top: 30px">
        <div class="row pt-3">
            <div class="col col-sm-6 offset-sm-1" style="padding-left: 0px;">
                <h2 class="text-danger bg-warning border rounded-start rounded-pill text-center p-3" >修改投票项目</h2>
            </div>
        </div>
        <div class="row pt-5">
            <div class="col col-sm-4 offset-sm-2" style="background-color: #FFCC99;">
                <div class="text-center" style="margin:100px auto">
                    <h1 class="fw-bolder clearfix text-danger">原始数据浏览</h1>
                    <hr>
                    <?php
                        if($modifyItemID!=null){     
                            $sql_02 = "select * from vote where id={$modifyItemID}";
                            $rows = $db->executeQuery($sql_02);
                            echo "<p class='clearfix'><span class='float-start ms-3'>项目名称：</span> <span id='itemName' class='float-end fw-bold me-3'>".$rows[0]['item']."</p>";
                            echo "<p class='clearfix'><span class='float-start ms-3'>项目投票数：</span> <span id='itemCount' class='float-end fw-bold me-3'>".$rows[0]['count']."</p>";
                        }
                    ?>
                </div>
            </div>
            <div class="col col-sm-4" style="background-color: #FFFFFF;">
                <div style="width: 300px; margin:auto;">
                    <form action="./modify.php" method="GET" style="margin:100px auto" >
                        <div class="form-group text-center">
                            <label for="modifyItemName" class="my-1 fw-bolder text-danger ">请输入新的项目名称</label>
                            <input id="modifyItemName" type="text" class=" form-control" name="modifyItemName" placeholder="项目名称">
                        </div>
                        <div class="form-group text-center">
                            <label for="modifyItemCount" class="my-1 fw-bolder text-danger ">请输入新的项目投票数</label>
                            <input id="modifyItemCount" type="text" class=" form-control" name="modifyItemCount" placeholder="投票数">
                            <input hidden type="text" name="id" value="<?php echo $modifyItemID ?>" />
                        </div>
                        <div class="form-group my-3">
                            <a href="./index.php" class="btn btn-success m-3 float-end">返回</a>
                            <input class="btn btn-success m-3 float-end" type="submit" value="提交">
                        </div>
                    </form>
                </div>
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