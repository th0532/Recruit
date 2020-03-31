<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";
include "../inc/top.php";

$param_num = $_GET['num'];
$param_page = $_GET['page'];
$db_gubun  = $_POST['db_gubun'];
$comment_text = $_POST['comment_text'];
$id         = $_SESSION['userid'];
$date       = date("y:m:d h:i:s");

$query = "SELECT content from comment where postnum = '".$param_num."'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);

    if($db_gubun == 'license' || $db_gubun == 'community'){
        if($comment_text == ''){
            echo "<script>window.alert('내용을 입력해주세요');</script>";
            echo "<script>location.href = '../".$db_gubun."_view.php?num=".$param_num."&page=".$param_page."&mode=search&type=".$type."&search=".$search."'</script>";
            exit;
        }

        $query = "INSERT INTO comment (postnum, page, id, date, content) values('$param_num','$db_gubun', '$id', '$date','$comment_text')";
        $result = mysqli_query($connect, $query);

        echo "<script>location.href = '../".$db_gubun."_view.php?num=".$param_num."&page=".$param_page."&mode=search&type=".$type."&search=".$search."'</script>";
    }
    else if($db_gubun == 'incruit' || $db_gubun == 'employment'){
        if($comment_text == ''){
            echo "<script>window.alert('내용을 입력해주세요');</script>";
            echo "<script>location.href = '../".$db_gubun."_view.php?num=".$param_num."&category=".$param_category."&page=".$param_page."&mode=search&type=".$type."&search=".$search."'</script>";
            exit;
        }

            $query = "INSERT INTO comment (postnum, page, id, date, content) values('$param_num','$db_gubun', '$id', '$date','$comment_text')";
            $result = mysqli_query($connect, $query);

            echo "<script>location.href = '../".$db_gubun."_view.php?num=".$param_num."&category=".$param_category."&page=".$param_page."&mode=search&type=".$type."&search=".$search."'</script>";

    }

?>