<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";
include "../inc/function.php";

//공통 변수
$mode       = $_GET['mode'];
$db_gubun   = $_POST['db_gubun'];
$id         = $_SESSION['userid'];
$date       = date("y:m:d h:i:s");
$title      = $_POST['title'];
$content    = $_POST['content'];

if(isset($_GET['num'])){
    $param_num = $_GET['num'];
}
else{
    $param_num =1;
}
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

if($title == '' || $content == ''){
    echo "<script>window.alert('제목과 내용 모두 입력해주세요');</script>";
    echo "<script>location.href = '../".$db_gubun."_write.php?mode=insert.php'</script>";
    exit;
    
}
//list view page 카테고리별 insert update
if ($db_gubun == 'community'){
    if($mode=='insert'){
        $query = "INSERT INTO community(num, id, click, date, title, content) VALUES ('','$id','1','$date','$title','$content')";
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
        $query = "INSERT INTO license(num, id, click, date, title, content) VALUES ('','$id','1','$date','$title','$content')";
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
        $query = "INSERT INTO employment(num, id, click, date, category, title, content) VALUES ('','$id','1','$date','$category','$title','$content')";
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
    $category   = $_POST['category'];
    if($mode=='insert'){
        $query = "INSERT INTO incruit(num, id, click, date, category, title, content) VALUES ('','$id','1','$date','$category','$title','$content')";
        $result = mysqli_query($connect,$query);
        echo "<script>location.href = '../incruit.php'</script>";
    }
    else if ($mode == 'update'){
        $param_num  = $_GET['num'];
        $param_category =  $_GET['category'];
        $query = "UPDATE incruit SET date='$date',category='$category' , title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../incruit_view.php?num=".$param_num."&category=".$param_category."&page=".$page."'</script>";
    }
}

?>  