<?php
    include "../class/DBCon.class.php";

    session_start();

    if($_SESSION["admin"] !='ok'){
        echo "<script>alert('你还没有登录，请先登录！'); location.href='../login.php'; </script>";
    }
    
    $deleteItem = $_GET['id'];

    if($deleteItem != null){
        $db = new DBCon;
        $sql = "delete from vote where id ={$deleteItem};";
        $rs = $db->executeUpdate($sql);
        if(!$rs){
            echo "<script>alert('删除失败！'); location.href='./index.php'; </script>";
        }else{
            echo "<script>location.href='./index.php'; </script>";
        }
    }
?>