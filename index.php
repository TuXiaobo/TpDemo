<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投票主页</title>

    <link rel="stylesheet" href="https://public.acxjz.cn/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(http://public.acxjz.cn/img/bg_03.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style>
</head>
<body>
    <div class="container bg-light shadow-lg" >
        <div class="row mt-5">
            <div class="col col-sm-10 offset-sm-1" style="height: 100px">
                <h1 class="text-danger" style="margin:30px auto">投票主页
                    <div class="btn-group float-end">
                        <a href="./info.php" class="btn btn-danger me-1">查看投票</a>
                        <a href="./login.php" class="btn btn-success">登录后台</a>
                    </div>
                </h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col col-sm-10 offset-sm-1" >
                <table class="table shadow-sm table-dark table-hover  text-center align-middle table-border table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                投票项目
                            </th>
                            <th>
                                给Ta投票
                            </th >
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include './class/DBCon.class.php';
                        $db = new DBCon;

                        $sql="select * from vote";
                        $rows = $db->executeQuery($sql);
                        foreach($rows as $row){
                            echo "<tr>";
                            echo "<td>".$row['item']."</td>";
                            echo "<td><a href='./voting.php?id=".$row['id']."' class='btn btn-warning' >给Ta投一票</a>" ;
                            echo "</tr>";
                        }                
                    ?>
                    </tbody>
                </table>
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