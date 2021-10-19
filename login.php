<?php
    session_start();

    if($_SESSION["admin"]=='ok'){
        echo "<script>alert('你已经登录了！'); location.href='./admin/'; </script>";
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>后台登录</title>

        <link rel="stylesheet" href="https://public.acxjz.cn/css/bootstrap.min.css">
        <style>
            .formMain {
                width: 300px;
                margin: 100px auto;
            }
            
            body {
                background-image: url(https://public.acxjz.cn/img/bg_03.jpg );
                background-repeat: no-repeat;
                background-size: 100%;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="row" style="margin-top: 150px; margin-bottom:150px ;">
                <div class="col col-sm-4 offset-sm-2 shadow-lg" style="background-color: #FFCC99;">
                    <div style="margin:100px auto">
                        <div class=" rounded-pill">
                            <h3 class='text-center fw-bolder text-dark p-3'>后台登录</h3>
                            <h3 class='text-center fw-bolder text-dark p-3'>请输入管理员账号和密码登录后台</h3>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-4 shadow-lg" style="background-color: #FFFFFF;">
                    <main class="formMain">
                        <form class="" action="./process.php" method="POST">
                            <div class="mb-1 form-floating">
                                <input class="form-control" placeholder="username" type="text" name="username" id="username">
                                <label for="username">账号</label>
                            </div>
                            <div class="mb-3 form-floating">
                                <input class="form-control mb-3" placeholder="password" type="password" name="password" id="password">
                                <label for="password">密码</label>
                            </div>
                            <div class="">
                                <input type="submit" class="w-100 btn btn-primary" value="登录">
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </body>

    </html>