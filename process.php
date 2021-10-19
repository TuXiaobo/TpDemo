<?php
    session_start();
    include './class/DBCon.class.php';


    $userName = $_POST["username"];
    $password = $_POST["password"];
     
    $db = new DBCon();
    $sql = "select * from user where name='{$userName}' and password='{$password}';";
    $rows = $db->executeQuery($sql);
    if($rows){
        $_SESSION["admin"]="ok";
?>
    <script>
        location.href = "./admin/index.php";
    </script>
    <?php
    }else{
?>
        <script>
            alert("账号或者密码错误，请重新登录！")
            location.href = "./login.php";
        </script>
        <?php
    }
?>