<?php
include "./inc/login_session.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/dbconnect.php";
include "./inc/function.php";

    $mode = $_GET['mode'];
    $param_num = $_GET['num'];

    $query = "select * from employment where num = '".$param_num."'";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $content = $row['content'];
        $category = $row['category'];
        $name = $row['id'];
        if($_SESSION['userid'] != $name ){ 
            echo "접근자가 올바르지 않습니다.";
            exit;
        }   
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>&num=<?=$param_num?>&category=<?=$param_category?>&page=<?=$page?>" method ="post">
<input type="hidden" value ="employment" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>취업후기</h3></li>
                <li>
                    <span>구분:</span>
                    <select name="category" id="">
                        <option value="유통, 무역" <?php if($category == "유통, 무역"){ ?>  selected <?php }?> >유통, 무역</option>
                        <option value="금융, 보험" <?php if($category == "금융, 보험"){ ?>  selected <?php }?> >금융, 보험</option>
                        <option value="의료, 보건" <?php if($category == "의료, 보건"){ ?>  selected <?php }?> >의료, 보건</option>
                        <option value="서비스" <?php if($category == "서비스"){ ?>  selected <?php }?> >서비스</option>
                        <option value="미디어, 문화" <?php if($category == "미디어, 문화"){ ?>  selected <?php }?> >미디어, 문화</option>
                        <option value="정보통신, IT" <?php if($category == "정보통신, IT"){ ?>  selected <?php }?> >정보통신, IT</option>
                        <option value="제조" <?php if($category == "제조"){ ?>  selected <?php }?> >제조</option>
                        <option value="건설" <?php if($category == "건설"){ ?>  selected <?php }?> >건설</option>
                        <option value="교육기관" <?php if($category == "교육기관"){ ?>  selected <?php }?> >교육기관</option>
                        <option value="공공기관, 공기업, 협회" <?php if($category == "공공기관, 공기업, 협회"){ ?>  selected <?php }?> >공공기관, 공기업, 협회</option>
                    </select>
                </li>
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
                <button type="button" class=""><a href="./employment_view.php?num=<?=$param_num?>&page=<?=$page?>">취소</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>