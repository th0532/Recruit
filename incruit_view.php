<?php
include "./inc/login_session.php";
include "./inc/dbconnect.php";
include "./inc/top.php";
include "./inc/left.php";
    



    if(isset($_GET['num'])){
        $param_num = $_GET['num'];
    }
    else{
        echo "<script>location.href='./incruit.php'</script>";
    }
    //로그인 된 ID
    $now_id = $_SESSION['userid'];
    
// 조회수 업데이트
    $query_update =  "update incruit set click = click + 1 where num='$param_num'";
    $result = mysqli_query($connect, $query_update);


    $query = "select * from incruit where num = '".$param_num."'";

    mysqli_query($connect, $query);
    $result = mysqli_query($connect,$query);
    $row = mysqli_fetch_array($result);
       
        $name = $row['id'];
        $img_name = $row['img'];
        $click = $row['click'];
        $date = $row['date'];
        $title = $row['title'];
        $content = $row['content'];
        $category = $row['category'];
    
    //댓글 데이터
    $query_comment  = "select content, id, date from comment where page = 'incruit' AND  postnum = '$param_num'";
    $result_comment = mysqli_query($connect, $query_comment);
    $row_count      = mysqli_num_rows($result_comment);

?>  
<link rel="stylesheet" href="./assets/css/view.css">
<script src=https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js></script>

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
                    <?php
                        if(strlen($img_name) !== 13){
                        ?>
                        <img style="width:100%;" src="./uploads/<?=$img_name?>"  alt="">
                        <textarea readonly style="width:100%; height:60px; border: none; margin-top: 5%; padding: 0% 2%;"><?=$content?></textarea>
                        <?php
                        }else{
                        ?>
                        <textarea class='cotent_text'  readonly style="width:100%;  border: none; margin-top: 5%; padding: 0% 2%;"><?=$content?></textarea>
                        <?php
                        }
                        ?>
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
<!-- 댓글 -->
<form action="./exec/comment_exec.php?num=<?=$param_num?>&category=<?=$param_category?>&page=<?=$page?>&type=<?=$page?>&search=<?=$search?>" method ="post">
    <input type="hidden" value ="incruit" name="db_gubun" id="">
    <input type="hidden" value ="<?=$now_id?>" name="" id="login">

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
                            <button type="button" class=""><a href="./incruit.php?page=<?=$page?>&category=<?=$param_category?>&mode=search&type=<?=$search_type?>&search=<?=$search_text?>">목록</a></button>
                </div>
            </div>
        </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>

<script>

    $( document ).ready(function() {
    //댓글
        $.ajax({
            url: "./inc/comment_ajax.php?num=<?=$param_num?>",
            datatype : 'json',
            type : "POST",
            data:{
                db_gubun:"incruit",
            },
            success:function(args){
                //배열 위치
                array_location = 0;
                $.each(args, function(a, b){
                    $.each(b.col, function(c,d){
                        if(d.id == $('#login').val()){
                        var text = "";
                        text  = "<li style='padding: 2% 0%;' id='comment_list'>"+  
                                "    <span style='margin-right:3%;' class='bold'>작성자: "+d.id+"</span>"+
                                "    <span id='comment_date"+array_location+"' class='bold'>시간: "+d.date+"</span><br>"+
                                "    <span  style='float:left;margin-top:1%;'>"+d.content+"</span><br>"+
                                "    <button class='delete_comment' type=button id = '"+array_location+"' style='float:right;bottom: 15px;position: relative;' class='bold'>X</button>"+
                                "</li>";
                        }else{
                            text  = "<li style='padding: 2% 0%;' id='comment_list'>"+  
                                "    <span class='bold'>작성자: "+d.id+"</span><br>"+
                                "    <span class=''>시간: "+d.date+"</span><br>"+
                                "    <span style='float:left;margin-top:1%;'>"+d.content+"</span><br>"+
                                "</li>";
                        }
                        $(".comment").append(text);
                        array_location++;
                    })
                })
                $('.delete_comment').on('click', function(){
                    var val = $(this).attr('id');
                    var comment_date = $('#comment_date'+val).html();
                    var c = comment_date.substring(4,23)
                    
                    $.ajax({
                        url: "./inc/comment_delete_ajax.php?num=<?=$param_num?>",
                        dataType : 'text',
                        type : "POST",
                        data:{
                            db_gubun:"incruit",
                            comment_date: c
                        },
                            success:function(args){
                                console.log(args);
                                alert('삭제되었습니다.');
                                location.reload();
                            }
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