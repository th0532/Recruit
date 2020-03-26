<?php
include "./inc/dbconnect.php";
include "./inc/left.php";
include "./inc/top.php";
include "./inc/paging.php";

// search 기능 위해서 쿼리구분
    if($search_type == 1){
        $query = "SELECT * FROM community where title LIKE '%".$search_text."%' ORDER BY num DESC LIMIT $s_point,$list";
    }else if($search_type == 2){
        $query = "SELECT * FROM community where id='".$search_text."' ORDER BY num DESC LIMIT $s_point,$list";
    }
    else{
        $query = "SELECT * FROM community ORDER BY num DESC LIMIT $s_point,$list";
        $search_type ='1';
    }

    $result = mysqli_query($connect, $query);
    
    $i=0;
    while($row = mysqli_fetch_array($result)){
        $num[$i] = $row['num'];
        $name[$i] = $row['id'];
        $click[$i] = $row['click'];
        $date = $row['date'];
        $title[$i] = $row['title'];
        $content[$i] = $row['content'];

        // date 형식 변경
        $date_val[$i] = substr($date, 2, 14);

        $i++;
    }
?>  
<link rel="stylesheet" href="./assets/css/style.css">
<form action="./exec/search_exec.php" method ="POST">
<input type="hidden" value="community" name="db_gubun">
    <div class="content">
        <div class="section1">
            <div class="title">
                <a href="./community.php"><h1>자유게시판</h1></a>
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
                        <td><a href="./community_view.php?num=<?=$num[$i]?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>"><?=$num[$i]?></a></td>
                        <td><a href="./community_view.php?num=<?=$num[$i]?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>"><?=$title[$i]?></a></td>
                        <td><?=$name[$i]?></td>
                        <td><?=$date_val[$i]?></td>
                        <td><?=$click[$i]?></td>
                    </tr>
                    <?php  $i++; } ?>
                </table>

                <button class="insert"><a href="./community_write.php?mode=insert">글쓰기</a></button>

                
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
                        <a href="./community_view.php?num=<?=$num[$i]?>&page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">
                            <p><?=$title[$i]?></p>
                            <div class="sub_text">
                                <span><?=$name[$i]?></span>
                                <span><?=$date_val[$i]?></span>
                                <span>조회 <?=$click[$i]?></span>
                                <!-- <span>댓글 <?=$num[$i]?></span> -->
                            </div>
                        </a>
                    </li>

                    <?php  $i++; } ?>
                </ul>
                <button class="insert"><a href="./community_write.php?mode=insert">글쓰기</a></button>
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

</script>