<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";

if(isset($_GET['num'])){$param_num = $_GET['num'];}else{$param_num = 1;}
if(isset($_GET['page'])){$param_page = $_GET['page'];}else{$param_page = 1;}
if(isset($_GET['type'])){$type = $_GET['type'];}else{$type = 1;}
if(isset($_GET['search'])){$search = $_GET['search'];}else{$search = 1;}
if(isset($_GET['category'])){$param_category = $_GET['category'];}else{$param_category = 1;}
$db_gubun  = $_POST['db_gubun'];
$comment_text = $_POST['comment_text'];
$comment_text_save = htmlspecialchars($comment_text,ENT_QUOTES,'UTF-8');
$comment_text =str_replace("\n","<br/>", $comment_text_save);
$id         = $_SESSION['userid'];
$date       = date("y:m:d H:i:s");

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
    mysqli_close($connect);

    

?>