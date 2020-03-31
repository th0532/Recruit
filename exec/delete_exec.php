<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
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
        echo "<script>window.alert('삭제되었습니다')</script>";
    echo "<script>location.href = '../community.php'</script>";
}
else if ($db_gubun == 'license'){
    $query = "DELETE FROM license WHERE num ='".$param_num."'";
    $result = mysqli_query($connect,$query);
    echo "<script>window.alert('삭제되었습니다')</script>";
    echo "<script>location.href = '../license.php'</script>";
}
else if ($db_gubun == 'employment'){
    $query = "DELETE FROM employment WHERE num ='".$param_num."'";
    $result = mysqli_query($connect,$query);
    echo "<script>window.alert('삭제되었습니다')</script>";
    echo "<script>location.href = '../employment.php'</script>";
}
else if ($db_gubun == 'incruit'){
    $query = "DELETE FROM incruit WHERE num ='".$param_num."'";
    $result = mysqli_query($connect,$query);
    echo "<script>window.alert('삭제되었습니다')</script>";
    echo "<script>location.href = '../incruit.php'</script>";
}


echo $db_gubun.$id.$date;









?>  