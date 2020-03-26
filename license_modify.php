<?php
include "./inc/login_session.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/dbconnect.php";

    $mode = $_GET['mode'];
    $param_num = $_GET['num'];
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $query = "select * from license where num = '".$param_num."'";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $content = $row['content'];
        $name = $row['id'];
        if($_SESSION['userid'] != $name ){ 
            echo "접근자가 올바르지 않습니다.";
            exit;
        }   
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>&num=<?=$param_num?>&page=<?=$page?>" method ="post">
<input type="hidden" value ="license" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>자격증후기</h3></li>
                <li>
                    <span>제목</span>
                    <input type="text" value="<?=$title?>" maxlength=45 name="title" >
                </li>
                <li>
                    <p>내용</p>
                    <textarea name="content" ><?=$content?></textarea>
                </li>
            </ul>
            <div class="active">
                <input type="submit" value="작성">
                <button type="button" class=""><a href="./license_view.php?num=<?=$param_num?>&page=<?=$page?>">취소</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>