<?php
include "./inc/left.php";
include "./inc/top.php";
include "./inc/dbconnect.php";

    $mode = $_GET['mode'];
    $param_num = $_GET['num'];
    $query = "select * from community where num = '".$param_num."'";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $content = $row['content'];
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>&num=<?=$param_num?>" method ="post">
<input type="hidden" value ="community" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>자유게시판</h3></li>
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
                <button type="button" class=""><a href="./community.php">목록</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>