<?php
include "./inc/dbconnect.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/paging.php";
include "./inc/function.php";

    // 전체 카테고리는 db 에 따로 없기때문에 where 문 없이 쿼리
    if($category_gubun == "전체"){
        $query = "SELECT * FROM employment ORDER BY num DESC limit $s_point, $list";
    }
    // 카테고리 구분
    else{
        $query = "select * from employment where category ='".$category_gubun."' order by num DESC limit $s_point, $list";
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
<div class="content">
    <div class="section1">
        <div class="title">
            <h1>취업후기</h1>
        </div>
        <div class="search">
            <input type="text"><button>검색</button>
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
                    <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>"><?=$num[$i]?></a></td>
                    <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>"><?=$category[$i]?></a></td>
                    <td><a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>"><?=$title[$i]?></a></td>
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
                    <a href="./employment_view.php?num=<?=$num[$i]?>&category=<?=$param_category?>&page=<?=$page?>">
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