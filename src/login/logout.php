<?php
session_start();
$res = session_destroy();
if($res){
    echo "<script>location.href = './login.php' </script>";
}
?>