<?php
include "./inc/login_session.php";
include "./inc/left.php";
include "./inc/top.php";

    $mode = $_GET['mode'];
    
    if(isset($_GET['category'])){
        $param_category = $_GET['category'];
    }
    else{
        $param_category = 1;
    }
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>" method ="post">
<input type="hidden" value ="employment" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>취업후기</h3></li>
                <li>
                    <span>구분</span>
                    <select name="category" id="">
                        <option value="유통, 무역">유통, 무역</option>
                        <option value="금융, 보험">금융, 보험</option>
                        <option value="의료, 보건">의료, 보건</option>
                        <option value="서비스">서비스</option>
                        <option value="미디어, 문화">미디어, 문화</option>
                        <option value="정보통신, IT">정보통신, IT</option>
                        <option value="제조">제조</option>
                        <option value="건설">건설</option>
                        <option value="교육기관">교육기관</option>
                        <option value="공공기관, 공기업, 협회">공공기관, 공기업, 협회</option>
                    </select>
                </li>
                <li>
                    <span>제목</span>
                    <input type="text" maxlength=45 name="title" >
                </li>
                <li>
                    <p>내용</p>
                    <textarea  name="content" ></textarea>
                </li>
            </ul>
            <div class="active">
                <input type="submit" value="작성">
                <button type="button" class=""><a href="./employment.php?category=<?=$param_category?>">목록</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>