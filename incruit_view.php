<?php
include "./inc/login_session.php";
include "./inc/dbconnect.php";
include "./inc/left.php";
include "./inc/top.php";
    
    if(isset($_GET['num'])){
        $param_num = $_GET['num'];
    }
    else{
        echo "<script>location.href='./incruit.php'</script>";
    }
    if(isset($_GET['category'])){
        $param_category = $_GET['category'];
    }
    else{
        $param_category = 1;
    }
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $query = "select * from incruit where num = '".$param_num."'";

    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
       
        $name = $row['id'];
        $click = $row['click'];
        $date = $row['date'];
        $title = $row['title'];
        $content = $row['content'];
        $category = $row['category'];
?>  
<link rel="stylesheet" href="./assets/css/view.css">

<form action="./exec/delete_exec.php?num=<?=$param_num?>" method ="post">
    <input type="hidden" value ="incruit" name="db_gubun" id="">
        <div class="content">
            <div class="section1">
                <ul>
                    <li><h3>취업후기</h3></li>
                    <li><span class="bold">구분 :</span>
                        <span ><?=$category?></span> 
                    </li>
                    <li>
                        <span class="bold">작성자 :</span> 
                        <span style="margin-right:5%;"><?=$name?></span>
                        <span class="bold">조회수 :</span> 
                        <span><?=$click?></span>
                        <div style="margin-top:2%;">
                            <span class="bold">시간 : </span>
                            <span ><?=$date?></span> 
                        </div>
                    </li>
                    <li>
                        <span class="bold"><?=$title?></span>
                    </li>
                    <li>
                        <span><?=$content?></span>
                    </li>
                </ul>
                <div class="active">
                    <button type="button" class=""><a href="./incruit.php?category=<?=$param_category?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">목록</a></button>
                    <?php //로그인 한 회원과 글 작성자 와 동일할때 삭제 가능
                        if($_SESSION['userid'] == $name ){ ?>
                            <button type="button" class=""><a href="./incruit_modify.php?num=<?=$param_num?>&category=<?=$param_category?>&page=<?=$page?>&mode=update">수정</a></button>
                            <input type="submit" value="삭제">
                    <?php } ?>
                    
                </div>
            </div>
        </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>