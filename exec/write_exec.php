<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";
include "../inc/function.php";

//공통 변수
$mode       = $_GET['mode'];
$db_gubun   = $_POST['db_gubun'];
$id         = $_SESSION['userid'];
$date       = date("y:m:d H:i:s");
$date_img       = date("ymdHis");
$title      = $_POST['title'];
$title      = htmlspecialchars($title,ENT_QUOTES,'UTF-8');

$content    = $_POST['content'];
//incruit는 admin만입력가능하기에 밑에서 $content    = $_POST['content']; 한번 선언
$content      = htmlspecialchars($content,ENT_QUOTES,'UTF-8');



if(isset($_GET['num'])){$param_num = $_GET['num'];}else{$param_num =1;}
if(isset($_GET['page'])){$page = $_GET['page'];}else{$page = 1;}

if($title == ''){
    echo "<script>window.alert('제목을 입력해주세요');</script>";
    echo "<script>location.href = '../".$db_gubun."_write.php?mode=insert.php'</script>";
    exit;
}
//list view page 카테고리별 insert update
if ($db_gubun == 'community'){
    if($mode=='insert'){
        $query = "INSERT INTO community( id, click, date, title, content) VALUES ('$id','0','$date','$title','$content')";
        $result = mysqli_query($connect,$query);

        echo "<script>location.href = '../community.php'</script>";
    }
    else if ($mode == 'update'){
        $query = "UPDATE community SET date='$date', title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../community_view.php?num=".$param_num."&page=".$page."'</script>";
    }
}
else if($db_gubun == 'license'){
    if($mode=='insert'){
        $query = "INSERT INTO license( id, click, date, title, content) VALUES ('$id','0','$date','$title','$content')";
        $result = mysqli_query($connect,$query);

        echo "<script>location.href = '../license.php'</script>";
    }
    else if ($mode == 'update'){
        $query = "UPDATE license SET date='$date', title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../license_view.php?num=".$param_num."&page=".$page."'</script>";
    }
}
else if($db_gubun == 'employment'){
    $category   = $_POST['category'];

    if($mode=='insert'){
        $query = "INSERT INTO employment( id, click, date, category, title, content) VALUES ('$id','0','$date','$category','$title','$content')";
        $result = mysqli_query($connect,$query);
        echo "<script>location.href = '../employment.php'</script>";
    }
    else if ($mode == 'update'){
        $param_num  = $_GET['num'];
        $param_category =  $_GET['category'];
        $query = "UPDATE employment SET date='$date',category='$category' , title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../employment_view.php?num=".$param_num."&category=".$param_category."&page=".$page."'</script>";

    }
}
else if($db_gubun == 'incruit'){
    $content    = $_POST['content'];
    $category   = $_POST['category'];
    if($mode=='insert'){

        $uploadfile = $_FILES['upload']['name'];
        $upload_name = $date_img."_".$uploadfile;
        if(move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/".$upload_name)){
        } else {
            echo "<script>window.alert('이미지는 등록에 실패했습니다.');</script>";
        }

        $query = "INSERT INTO incruit( id, img, click, date, category, title, content) VALUES ('$id','$upload_name','0','$date','$category','$title','$content')";
        $result = mysqli_query($connect,$query);

        echo "<script>location.href = '../incruit.php'</script>";
    }
    else if ($mode == 'update'){
        $param_num  = $_GET['num'];
        $param_category =  $_GET['category'];

        $uploadfile = $_FILES['upload']['name'];
        $upload_name = $date_img."_".$uploadfile;
        if(move_uploaded_file($_FILES['upload']['tmp_name'], "../uploads/".$upload_name)){
        } else {
            echo "<script>window.alert('이미지는 등록에 실패했습니다.');</script>";
        }

        $query = "UPDATE incruit SET date='$date',category='$category' , title='$title',img='$upload_name', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../incruit_view.php?num=".$param_num."&category=".$param_category."&page=".$page."'</script>";
    }
}

mysqli_close($connect);

?>  