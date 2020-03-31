<?php

    $localhost = 'localhost';
    $dbname = 'review';
    $id = 'root';
    $pass = '';

    $connect = mysqli_connect($localhost, $id, $pass, $dbname);

    mysqli_close($connect);

    // search div 초기화 스크립트
echo "<script>$('.search input').val('".$search_text."');</script>";
echo "<script>$('.search select').val('".$search_type."');</script>";

?>
<script>
//textarea 높이조절
autosize($(".cotent_text"));

</script>