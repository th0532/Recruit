<?php
    $localhost = 'localhost';
    $dbname = 'review';
    $id = 'root';
    $pass = '';

    $connect = mysqli_connect($localhost, $id, $pass, $dbname) or die ('connect error');
    $connectResult = mysqli_select_db($connect, $dbname);
?>