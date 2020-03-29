<?php
include "./inc/login_session.php";
include "./inc/dbconnect.php";
include "./inc/top.php";

$query = "select * from community where num = '".$param_num."'";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
        $name = $row['id'];
        if($_SESSION['userid'] != $name ){ 
            echo "접근자가 올바르지 않습니다.";
            exit;
        }   
?>