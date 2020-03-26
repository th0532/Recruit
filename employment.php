<?php
include "./inc/dbconnect.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/paging.php";
include "./inc/function.php";

    // 전체 카테고리는 db 에 따로 없기때문에 where 문 없이 쿼리
    if($category_gubun == "전체"){
        // search 기능 위해서 쿼리구분
        if($search_type == 1){
            $query = "SELECT * FROM employment where title LIKE '%".$search_text."%' ORDER BY num DESC LIMIT $s_point,$list";
        }else if($search_type == 2){
            $query = "SELECT * FROM employment where id='".$search_text."' ORDER BY num DESC LIMIT $s_point,$list";

        }else{
            $query = "SELECT * FROM employment ORDER BY num DESC LIMIT $s_point, $list";
            $search_type ='1';
        }
    }
    // 카테고리 구분
    else{
         // search 기능 위해서 쿼리구분
         if($search_type == 1){
            $query = "SELECT * FROM employment where category ='".$category_gubun."' AND title LIKE '%".$search_text."%' ORDER BY num DESC LIMIT $s_point,$list";
        }else if($search_type == 2){
            $query = "SELECT * FROM employment where category ='".$category_gubun."' AND id='".$search_text."' ORDER BY num DESC LIMIT $s_point,$list";
        }else{
            $query = "SELECT * from employment where category ='".$category_gubun."' order by num DESC limit $s_point, $list";
            $search_type ='1';
        }
    }
    
    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);

    $i=0;
    while($row = mysqli_fetch_array($result)){
        $num[$i] = $row['num'];
        $category[$i] = $row['category'];
        $name[$i] = $row['id'];
        $click[$i] = $row['click'];
        $date = $row['date'];
        $title[$i] = $row['title'];
        $content[$i] = $row['content'];
        
        // 시간형식 변경 
        $date_val[$i] = substr($date, 2, 14);

        $i++;
    }

?>  
<link rel="stylesheet" href="./assets/css/style.css">
<form action="./exec/search_exec.php?category=<?=$param_category?>" method ="POST">
    <input type="hidden" value="employment" name="db_gubun">
    <input type="hidden" value=<?=$param_category?> name="param_category">
    <div class="content">
        <div class="section1">
            <div class="title">
                <a href="./employment.php"><h1>취업후기</h1></a>
            </div>
            <div class="category">
                <select name="" id="">
                    <option value="1" <?php if($param_category=='1'){ ?> selected <?php }?> >전체</option>
                    <option value="2" <?php if($param_category=='2'){ ?> selected <?php }?> >유통, 무역</option>
                    <option value="3" <?php if($param_category=='3'){ ?> selected <?php }?> >금융, 보험</option>
                    <option value="4" <?php if($param_category=='4'){ ?> selected <?php }?> >의료, 보건</option>
                    <option value="5" <?php if($param_category=='5'){ ?> selected <?php }?> >서비스</option>
                    <option value="6" <?php if($param_category=='6'){ ?> selected <?php }?> >미디어, 문화</option>
                    <option value="7" <?php if($param_category=='7'){ ?> selected <?php }?> >정보통신, IT</option>
                    <option value="8" <?php if($param_category=='8'){ ?> selected <?php }?> >제조</option>
                    <option value="9" <?php if($param_category=='9'){ ?> selected <?php }?> >건설</option>
                    <option value="10" <?php if($param_category=='10'){ ?> selected <?php }?>>교육기관</option>
                    <option value="11" <?php if($param_category=='11'){ ?> selected <?php }?>>공공기관, 공기업</option>
                </select>
            </div>
            <div class="search">
                <select name="search_type"id="" >
                    <option value="1">제목</option>
                    <option value="2">작성자</option>
                </select>
                <input value='' name="search_text" type="text">

                <button>검색</button>
            </div>
        </div>
        
        <div class="section2">
            <div class="table_pc">
                <table>
                    <tr>
                        <th>번호</th>
                        <th>구분</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>날짜</th>
                        <th>조회수</th>
                        <!-- <th>댓글</th> -->
                    </tr>
                    <?php 
                        $result = mysqli_query($connect,$query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>"><?=$num[$i]?></a></td>
                        <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>"><?=$category[$i]?></a></td>
                        <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>"><?=$title[$i]?></a></td>
                        <td><?=$name[$i]?></td>
                        <td><?=$date_val[$i]?></td>
                        <td><?=$click[$i]?></td>
                    </tr>
                    <?php  $i++; } ?>
                </table>

                <button class="insert"><a href="./employment_write.php?mode=insert&category=<?=$param_category?>">글쓰기</a></button>
            </div> <!--table_pc-->

    <!-- 모바일 버전을 위하여 -->
            <div class="table_mb">
                <ul>
                    <?php 
                        $result = mysqli_query($connect,$query);
                        $i=0;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <li>
                        <a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">
                            <p><?=$title[$i]?></p>
                            <div class="sub_text">
                                    <span><?=$category[$i]?></span>
                                <div>
                                    <span><?=$date_val[$i]?></span>
                                    <span><?=$name[$i]?></span>
                                    <span>조회: <?=$click[$i]?></span>
                                </div>
                                <!-- <span>댓글 <?=$num[$i]?></span> -->
                            </div>
                        </a>
                    </li>

                    <?php  $i++; } ?>
                </ul>
                <button class="insert"><a href="./employment_write.php?mode=insert&category=<?=$param_category?>">글쓰기</a></button>
            </div> <!-- table_mb -->

                <!-- paging -->
                <?php 
                    include "./inc/paging_content.php";
                ?>
                <!-- paging -->

        </div> <!-- section2 -->
        
    </div> <!-- content -->
</form>
<?php
    include "./inc/footer.php";
?>

<script>
    $('.category select').on('change',function(){
        var category_value = $('.category select').val();
        location.href = "./employment.php?category="+category_value;
    })
</script>