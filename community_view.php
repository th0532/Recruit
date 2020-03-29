<?php
include "./inc/login_session.php";
include "./inc/dbconnect.php";
include "./inc/left.php";
include "./inc/top.php";

    if(isset($_GET['num'])){
        $param_num = $_GET['num'];
    }
    else{
        echo "<script>location.href='./community.php'</script>";
    }
    
// 페이지 내용 데이터
    $query = "select * from community where num = '".$param_num."'";
   
    mysqli_query($connect, $query);
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
       
        $name = $row['id'];
        $click = $row['click'];
        $date = $row['date'];
        $title = $row['title'];
        $content = $row['content'];

    //댓글 데이터
    $query_comment  = "select content, id, date from comment where page = 'community' AND  postnum = '$param_num'";
    $result_comment = mysqli_query($connect, $query_comment);
    $row_count      = mysqli_num_rows($result_comment);
?>  

<link rel="stylesheet" href="./assets/css/view.css">

<form action="./exec/delete_exec.php?num=<?=$param_num?>" method ="post">
    <input type="hidden" value ="community" name="db_gubun" id="">
        <div class="content">
            <div class="section1">
                <ul>
                    <li><h3>자유게시판</h3></li>
                    <li>
                        <span class="bold">작성자 :</span> 
                        <span style="margin-right:3%;"><?=$name?></span>
                        <span class="bold">조회수 :</span> 
                        <span ><?=$click?></span>
                        <div style="margin-top:2%;">
                            <span class="bold">시간 : </span>
                            <span><?=$date?></span> 
                        </div>
                    </li>
                    <li>
                        <span class="bold"><?=$title?></span>
                    </li>
                    <li style="border-bottom:none; display: inline-block;">
                        <p ><?=$content?></p>
                    </li>
                </ul>
                <div class="active">
                    <button type="button" class=""><a href="./community.php?page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">목록</a></button>
                    <?php //로그인 한 회원과 글 작성자 와 동일할때 삭제 가능
                        if($_SESSION['userid'] == $name ){ ?>
                            <button type="button" class=""><a href="./community_modify.php?num=<?=$param_num?>&page=<?=$page?>&mode=update">수정</a></button>
                            <input type="submit" value="삭제">
                    <?php } ?>
                    
                </div>
            </div>
        </div> <!-- content -->
</form>
<!-- 댓글 -->
<form action="./exec/comment_exec.php?num=<?=$param_num?>&page=<?=$page?>&type=<?=$page?>&search=<?=$search?>" method ="post">
    <input type="hidden" value ="community" name="db_gubun" id="">
        <div class="content">
            <div class="section1">
                <ul >
                    <li><span class="bold">comment</span> <span><?=$row_count?></span> </li>
                    <div class="comment">
                        <!-- <li>
                            <span class="bold">TH LEE</span><br>
                            <span class="bold">댓글 테스트입니다.</span>
                        </li> -->
                    </div>
                    <li>
                        <textarea name="comment_text" style="width:100%; height:10%;" placeholder="댓글을 입력하세요"></textarea>
                    </li>
                </ul>
                <div class="active">
                            <input type="submit" value="등록">
                            <button type="button" class=""><a href="./community.php?page=<?=$page?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">목록</a></button>
                </div>
            </div>
        </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>
<script>
    $( document ).ready(function() {
        $.ajax({
            url: "./inc/comment_ajax.php?num=<?=$param_num?>",
            datatype : 'json',
            type : "POST",
            data:{
                db_gubun:"community",
            },
            success:function(args){
                console.log(args);
                //배열 위치
                array_location = 0;
                $.each(args, function(a, b){
                    $.each(b.col, function(c,d){
                        console.log(d)
                        var text = "";
                        text  = "<li>"+  
                                "    <span class='bold'>작성자: "+d.id+"</span></span><br>"+
                                "    <p>"+d.content+"</p>"+
                                "</li>";
                        $(".comment").append(text);
                        array_location++;
                    })
                })
            },
                // beforeSend:showRequest,
                error:function(x, o, e){
                    alert(x.status + " : "+ o +" : "+e);
                    return false;
                }
        })
    });
</script>