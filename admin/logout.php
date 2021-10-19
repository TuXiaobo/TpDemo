<?php
    session_start();
    $_SESSION=array();
    session_destroy();
    setcookie("PHPSESSID");
    echo "<script> location.href='../index.php'; </script>";
?>