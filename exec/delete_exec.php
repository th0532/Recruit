<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";

$param_num = $_GET['num'];
$db_gubun   = $_POST['db_gubun'];
$id         = $_SESSION['userid'];
$date       = date("y:m:d h:i:s");


//list view page 카테고리별 delete
if ($db_gubun == 'community'){
        $query = "DELETE FROM community WHERE num ='".$param_num."'";
        $result = mysqli_query($connect,$query);
    echo "<script>location.href = '../community.php'</script>";
}
else if ($db_gubun == 'license'){
    $query = "DELETE FROM license WHERE num ='".$param_num."'";
    $result = mysqli_query($connect,$query);
echo "<script>location.href = '../license.php'</script>";
}

echo $db_gubun.$id.$date;









?>  