<?php
include "./inc/left.php";
include "./inc/top.php";
?>  
<link rel="stylesheet" href="./assets/css/write.css">

<div class="content">
    <div class="section1">
        <ul>
            <li><h3>취업후기</h3></li>
            <li>
                <span>구분</span> 
                <select name="" id="">
                    <option value="">유통, 무역</option>`
                    <option value="">금융, 보험</option>
                    <option value="">의료, 보건</option>
                    <option value="">서비스</option>
                    <option value="">미디어, 문화</option>
                    <option value="">정보통신, IT</option>
                    <option value="">제조</option>
                    <option value="">건설</option>
                    <option value="">교육기관</option>
                    <option value="">공공기관, 공기업, 협회</option>
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
            <button class=""><a href="./employment.php">목록</a></button>
        </div>

    </div>
</div> <!-- content -->