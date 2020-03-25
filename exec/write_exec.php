<?php
include "../inc/login_session.php";
include "../inc/dbconnect.php";

$mode       = $_GET['mode'];
$db_gubun   = $_POST['db_gubun'];
$id         = $_SESSION['userid'];
$date       = date("y:m:d h:i:s");
$title      = $_POST['title'];
$content    = $_POST['content'];

//list view page 카테고리별 insert update
if ($db_gubun == 'community'){
    if($mode=='insert'){
        $query = "INSERT INTO community(num, id, click, date, title, content) VALUES ('','$id','1','$date','$title','$content')";
        $result = mysqli_query($connect,$query);

        echo "<script>location.href = '../community.php'</script>";
    }
    else if ($mode == 'update'){
        $param_num  = $_GET['num'];
        $query = "UPDATE community SET date='$date', title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../community.php'</script>";
    }
}
else if($db_gubun == 'license'){
    if($mode=='insert'){
        $query = "INSERT INTO license(num, id, click, date, title, content) VALUES ('','$id','1','$date','$title','$content')";
        $result = mysqli_query($connect,$query);

        echo "<script>location.href = '../license.php'</script>";
    }
    else if ($mode == 'update'){
        $param_num  = $_GET['num'];
        $query = "UPDATE license SET date='$date', title='$title', content='$content' WHERE num = '$param_num' ";
        $result = mysqli_query($connect,$query);
        
        echo "<script>location.href = '../license.php'</script>";
    }
}

echo $db_gubun.$id.$date;









?>  