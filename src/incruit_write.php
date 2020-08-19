<?php
include "./inc/login_session.php";
include "./inc/top.php";
include "./inc/left.php";

    $mode = $_GET['mode'];
    if(isset($_GET['category'])){
        $param_category = $_GET['category'];
    }
    else{
        $param_category = 1;
    }
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<form action="./exec/write_exec.php?mode=<?=$mode?>" method ="post"  enctype="multipart/form-data">
<input type="hidden" value ="incruit" name="db_gubun" id="">
<input type="hidden" value ="<?=$mode?>" name="mode" id="">
    <div class="content">
        <div class="section1">
            <ul>
                <li><h3>채용공고</h3></li>
                <li>
                    <span>구분</span>
                    <select name="category" id="">
                    <option value="금융권">금융권</option>
                    <option value="IT기업">IT기업</option>
                        <option value="대기업">대기업</option>
                        <option value="중견기업">중견기업</option>
                        <option value="중소기업">중소기업</option>
                        <option value="해외기업">해외기업</option>
                        <option value="스타트업">스타트업</option>
                        <option value="공공기관, 공기업">공공기관, 공기업</option>
                        <option value="인턴">인턴</option>
                    </select>
                </li>
                <li>
                    <span>제목</span>
                    <input type="text" maxlength=70 name="title" >
                </li>
                <li>
                    <span>첨부파일</span>
                    <input type="file" size=100 name="upload">
                </li>
                <li>
                    <p>내용</p>
                    <textarea  name="content" ></textarea>
                </li>
            </ul>
            <div class="active">
                <input type="submit" value="작성">
                <button type="button" class=""><a href="./incruit.php?category=<?=$param_category?>">목록</a></button>
            </div>

        </div>
    </div> <!-- content -->
</form>

<?php
    include "./inc/footer.php";
?>