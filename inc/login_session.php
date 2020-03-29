<?php
    session_start();
    if(!isset($_SESSION['userid'])) {
        echo "<script>window.alert('로그인을 해주세요');</script>";
        echo "<script>location.href='/review/login.php';</script>";
        exit;
    }
    else{

    }
?>