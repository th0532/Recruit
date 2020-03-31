<?php
include "./inc/top.php";

?>  
<link rel="stylesheet" href="./assets/css/login.css">
<!-- 로그인 -->
<form action="./exec/login_exec.php" method ="post">
    <div class="content">
        <input value="login" type="hidden" name="db_gubun">
        <div class="login">
            <ul>
                <li><h2>아이디</h2></li>
                <li><input type="text" name="id" placeholder="ID 를 입력해 주세요"> </li>
                <li><h2>비밀번호</h2></li>
                <li><input type="password" name="pass" placeholder="PassWord 를 입력해 주세요"> </li>
                <li style="margin:10% 0%;" class="find"><a href="./find.php">ID/PW 찾기</a> </li>
                <li style="margin:5% 0%;"class="login_btn"><input type="submit" value="로그인"></li>
                <li class="signup_btn"><button type="button"><a href="./signup.php">회원가입</a></button></li>
            </ul>
        </div>
    </div>
</form>
