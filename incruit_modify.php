<?php
include "./inc/login_session.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/dbconnect.php";

    $mode = $_GET['mode'];
    
    $query = "select * from incruit where num = '".$param_num."'";
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $img_name = $row['img'];
        $content = $row['content'];
        $category = $row['category'];
        $name = $row['id'];
        if($_SESSION['userid'] != $name ){ 
            echo "접근자가 올바르지 않습니다.";
            exit;
        }   
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>&num=<?=$param_num?>&category=<?=$param_category?>&page=<?=$page?>" method ="post"  enctype="multipart/form-data">
<input type="hidden" value ="incruit" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>채용공고</h3></li>
                <li>
                    <span>구분:</span>
                    <select name="category" id="">
                        <option value="대기업" <?php if($category == "대기업"){ ?>  selected <?php }?> >대기업</option>
                        <option value="금융권" <?php if($category == "금융권"){ ?>  selected <?php }?> >금융권</option>
                        <option value="IT기업" <?php if($category == "IT기업"){ ?>  selected <?php }?> >IT기업</option>
                        <option value="중견기업" <?php if($category == "중견기업"){ ?>  selected <?php }?> >중견기업</option>
                        <option value="중소기업" <?php if($category == "중소기업"){ ?>  selected <?php }?> >중소기업</option>
                        <option value="해외기업" <?php if($category == "해외기업"){ ?>  selected <?php }?> >해외기업</option>
                        <option value="스타트업" <?php if($category == "스타트업"){ ?>  selected <?php }?> >스타트업</option>
                        <option value="인턴" <?php if($category == "인턴"){ ?>  selected <?php }?> >인턴</option>
                    </select>
                </li>
                <li>
                    <span>제목</span>
                    <input type="text" value="<?=$title?>" maxlength=45 name="title" >
                </li>
                <li>
                    <span>첨부파일</span>
                    <input id ="img" type="file" size=100 name="upload">
                </li>
                <li>
                        <?php
                            if(strlen($img_name) !== 13){
                        ?>
                        <img style="width:100%;" src="./uploads/<?=$img_name?>"  alt="">
                        <?php
                        }
                        ?>
                    <p>내용</p>
                    <textarea name="content" ><?=$content?></textarea>
                </li>
            </ul>
            <div class="active">
                <input type="submit" value="수정">
                <button type="button" class=""><a href="./incruit_view.php?num=<?=$param_num?>&page=<?=$page?>">취소</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>
<script>

</script>