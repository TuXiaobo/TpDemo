<?php
    include "./class/DBCon.class.php";

    $db = new DBCon;
    $voteID = $_GET['id'];

    $sql = "update vote set count=count+1 where id={$voteID}";

    $rs = $db->executeUpdate($sql);

    if($rs){
        echo "<script>alert('投票成功！'); location.href='./index.php'; </script>";
    }
?>