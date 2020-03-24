<?php
include "./inc/left.php";
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<div class="content">
    <div class="section1">
        <ul>
            <li><h3>채용공고</h3></li>
            <li>
                <span>구분</span> 
                <select name="" id="">
                    <option value="전체">전체</option>
                    <option value="대기업">대기업</option>
                    <option value="금융권">금융권</option>
                    <option value="중견기업">중견기업</option>
                    <option value="중소기업">중소기업</option>
                    <option value="해외기업">해외기업</option>
                    <option value="스타트업">스타트업</option>
                    <option value="인턴">인턴</option>
                </select>
            </li>
            <li>
                <span>제목</span>
                <input type="text">
            </li>
            <li>
                <p>내용</p>
                <textarea></textarea>
            </li>
        </ul>
        <div class="active">
            <button class=""><a href="">작성</a></button>
            <button class=""><a href="./incruit.php">목록</a></button>
        </div>

    </div>
</div> <!-- content -->